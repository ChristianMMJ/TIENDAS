<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diversos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('diversos_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vDiversos');
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


            $data = $this->diversos_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDiversoByID() {
        try {
            extract($this->input->post());
            $data = $this->diversos_model->getDiversoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Tienda' => $this->session->userdata('TIENDA'),
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'Concepto' => ($this->input->post('Concepto') !== NULL) ? $this->input->post('Concepto') : NULL,
                'Motivo' => ($this->input->post('Motivo') !== NULL) ? $this->input->post('Motivo') : NULL,
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL,
                'Estatus' => 'ACTIVO',
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->diversos_model->onAgregar($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->diversos_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
