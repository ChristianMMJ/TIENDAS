<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('prestamos_model');
        $this->load->model('empleados_model');
        $this->load->model('tiendas_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vPrestamos');
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

            $data = $this->prestamos_model->getRecords(($this->input->post('Tienda') !== NULL && $this->input->post('Tienda') !== '' ) ? $this->input->post('Tienda') : $this->session->userdata('TIENDA'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            $data = $this->tiendas_model->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPrestamoByID() {
        try {
            extract($this->input->post());
            $data = $this->prestamos_model->getPrestamoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetallePrestamo() {
        try {
            print json_encode($this->prestamos_model->getDetallePrestamo($this->input->get('ID')));
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
            $ID = $this->prestamos_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->prestamos_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
