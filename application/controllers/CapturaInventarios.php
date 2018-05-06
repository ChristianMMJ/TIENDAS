<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CapturaInventarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('existenciasCaptura_Model');
        $this->load->model('estilos_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vCapturaInventarios');
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

    public function onAgregarExistenciasCaptura() {
        try {
            $data = array(
                'Mes' => ($this->input->post('Mes') !== NULL) ? $this->input->post('Mes') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Usuario' => $this->session->userdata('ID'),
                'Estatus' => 'ACTIVO',
                'Tienda' => $this->session->userdata('TIENDA'),
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Color' => ($this->input->post('Color') !== NULL) ? $this->input->post('Color') : NULL,
                $this->input->post('Posicion') => ($this->input->post('Existencia') !== NULL) ? $this->input->post('Existencia') : 0
            );
            $this->existenciasCaptura_Model->onAgregarExistenciasCaptura($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciasCaptura() {
        try {

            $this->existenciasCaptura_Model->onModifcarExistenciasCaptura($this->input->post('Mes'), $this->input->post('Ano'), $this->input->post('Estilo'), $this->input->post('Color'), $this->input->post('Posicion'), $this->input->post('ExistenciaNueva'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());
            $data = $this->existenciasCaptura_Model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion() {
        try {
            extract($this->input->post());
            $data = $this->existenciasCaptura_Model->getExistenciasXEstiloXCombinacion($Estilo, $Combinacion);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasCapturaByMesByAno() {
        try {
            extract($this->input->post());
            $data = $this->existenciasCaptura_Model->getExistenciasCapturaByMesByAno($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getEstilos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->combinaciones_model->getCombinacionesXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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

}
