<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CortesCaja extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('cortesCaja_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vCortesCaja');
                $this->load->view('vFooter');
            } else {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());


            $data = $this->cortesCaja_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCorteCajaByID() {
        try {
            extract($this->input->post());
            $data = $this->cortesCaja_model->getCorteCajaByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleNuevo() {
        try {
            print json_encode($this->cortesCaja_model->getDetalleNuevo());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            print json_encode($this->cortesCaja_model->getDetalleByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Tienda' => $this->session->userdata('TIENDA'),
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'Estatus' => 'ACTIVO',
                'Usuario' => $this->session->userdata('ID'),
                'Saldo' => ($this->input->post('Saldo') !== NULL) ? $this->input->post('Saldo') : NULL
            );
            $ID = $this->cortesCaja_model->onAgregar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'CorteCaja' => $ID
                );

                if ($v->Tipo === 'GASTO') {
                    $this->cortesCaja_model->onModificarGastos($v->ID, $data);
                }

                if (strpos($v->Tipo, 'ENTRADA') !== false) {
                    $this->cortesCaja_model->onModificarDiversos($v->ID, $data);
                }
                if (strpos($v->Tipo, 'RETIRO') !== false) {
                    $this->cortesCaja_model->onModificarDiversos($v->ID, $data);
                } else {
                    $this->cortesCaja_model->onModificarVentas($v->ID, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->cortesCaja_model->onEliminar($ID);
            $this->cortesCaja_model->onEliminarCorteCajaVentas($ID);
            $this->cortesCaja_model->onEliminarCorteCajaGastos($ID);
            $this->cortesCaja_model->onEliminarCorteCajaDiversos($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
