<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CortesCaja extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('CortesCaja_model','ccm')->model('Tiendas_model','tsm');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuCaja')->view('vCortesCaja')->view('vFooter');
            } else if (in_array($this->session->userdata["Tipo"], array("VENDEDOR"))) {
                $this->load->view('vEncabezado')->view('vCortesCaja')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            $data = $this->ccm->getRecords(($this->input->post('Tienda') !== NULL && $this->input->post('Tienda') !== '' ) ? $this->input->post('Tienda') : $this->session->userdata('TIENDA'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            $data = $this->tsm->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCorteCajaByID() {
        try {
            extract($this->input->post());
            $data = $this->ccm->getCorteCajaByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleNuevo() {
        try {
            $ID = $this->input->get('ID');
            if ($ID === 'N') {
                print json_encode($this->ccm->getDetalleNuevo());
            } else {
                print json_encode($this->ccm->getDetalleByID($ID));
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            print json_encode($this->ccm->getDetalleByID($this->input->get('ID')));
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
            $ID = $this->ccm->onAgregar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'CorteCaja' => $ID
                );

                if ($v->Tipo === 'GASTO') {
                    $this->ccm->onModificarGastos($v->ID, $data);
                }

                if (strpos($v->Tipo, 'ENTRADA') !== false) {
                    $this->ccm->onModificarDiversos($v->ID, $data);
                }
                if (strpos($v->Tipo, 'RETIRO') !== false) {
                    $this->ccm->onModificarDiversos($v->ID, $data);
                } else {
                    $this->ccm->onModificarVentas($v->ID, $data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->ccm->onEliminar($ID);
            $this->ccm->onEliminarCorteCajaVentas($ID);
            $this->ccm->onEliminarCorteCajaGastos($ID);
            $this->ccm->onEliminarCorteCajaDiversos($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
