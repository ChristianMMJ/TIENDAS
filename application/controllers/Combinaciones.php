<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Combinaciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('Combinaciones_model','cbnm')->model('Estilos_model','etm');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuCatalogos')->view('vCombinaciones')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getUltimaClave() {
        try {
            $Datos = $this->cbnm->getUltimaClave($this->input->post('Estilo'));
            $Clave = $Datos[0]->Clave;
            if (empty($Clave)) {
                $Clave = 1;
            } else {
                $Clave = $Clave + 1;
            }

            print $Clave;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            //$data = $this->cbnm->getRecords();
            print $_GET['callback'] . '(' . json_encode($this->cbnm->getRecords()) . ');'; /* JSONP */
            //print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionByID() {
        try {
            extract($this->input->post());
            $data = $this->cbnm->getCombinacionByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            extract($this->input->post());
            $data = $this->etm->getEstilos();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL
            );
            $ID = $this->cbnm->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->cbnm->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->cbnm->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
