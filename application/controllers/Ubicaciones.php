<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicaciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('tiendas_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vUbicaciones');
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

    public function onModificar() {
        try {
            extract($this->input->post());
            $data = array(
                'Loc1' => ($this->input->post('Loc1') !== NULL) ? $this->input->post('Loc1') : NULL,
                'Loc2' => ($this->input->post('Loc2') !== NULL) ? $this->input->post('Loc2') : NULL,
                'Loc3' => ($this->input->post('Loc3') !== NULL) ? $this->input->post('Loc3') : NULL
            );
            $this->existencias_model->onModificar($ID, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUbicacionesByTienda() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getUbicacionesByTienda();
            print json_encode($data);
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
