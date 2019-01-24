<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Existencias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('estilos_model')->model('existencias_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuInventarios')->view('vExistencias')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getEncabezadoSerieXEstilo() {
        try { 
            print json_encode($this->estilos_model->getEncabezadoSerieXEstilo($this->input->post('Estilo')));
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
            print json_encode($this->existencias_model->getTiendasConExistencias());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getSerieXEstilo($this->input->post('Estilo')));
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
            print json_encode($this->existencias_model->getExistenciaByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}