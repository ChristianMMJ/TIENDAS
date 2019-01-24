<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicaciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('estilos_model')->model('tiendas_model')->model('combinaciones_model')->model('existencias_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuInventarios')->view('vUbicaciones')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
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

    public function getTiendas() {
        try {
            $data = $this->tiendas_model->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUbicacionesByTienda() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getUbicacionesByTienda(($this->input->post('Tienda') !== NULL && $this->input->post('Tienda') !== '' ) ? $this->input->post('Tienda') : $this->session->userdata('TIENDA'));
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
