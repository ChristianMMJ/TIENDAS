<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Existencias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('existencias_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vExistencias');
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

    public function getEncabezadoSerieXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getEncabezadoSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasByTienda() {
        try {
            print json_encode($this->existencias_model->getExistenciasByTienda($this->input->get('Tienda')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendasConExistencias() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getTiendasConExistencias();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstiloTR() {
        try {
            print json_encode($this->existencias_model->getSerieXEstiloTR($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function getSerieXEstiloTRG() {
        try {
            print json_encode($this->existencias_model->getSerieXEstiloTRG($this->input->get('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciaByID() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciaByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
