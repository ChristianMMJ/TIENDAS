<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Series extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('series_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuCatalogos')->view('vSeries')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->series_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieByID() {
        try {
            print json_encode($this->series_model->getSerieByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'PuntoInicial' => ($x->post('PuntoInicial') !== NULL) ? $x->post('PuntoInicial') : NULL,
                'PuntoFinal' => ($x->post('PuntoFinal') !== NULL) ? $x->post('PuntoFinal') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL,
                'T1' => ($x->post('T1') !== NULL) ? $x->post('T1') : 0,
                'T2' => ($x->post('T2') !== NULL) ? $x->post('T2') : 0,
                'T3' => ($x->post('T3') !== NULL) ? $x->post('T3') : 0,
                'T4' => ($x->post('T4') !== NULL) ? $x->post('T4') : 0,
                'T5' => ($x->post('T5') !== NULL) ? $x->post('T5') : 0,
                'T6' => ($x->post('T6') !== NULL) ? $x->post('T6') : 0,
                'T7' => ($x->post('T7') !== NULL) ? $x->post('T7') : 0,
                'T8' => ($x->post('T8') !== NULL) ? $x->post('T8') : 0,
                'T9' => ($x->post('T9') !== NULL) ? $x->post('T9') : 0,
                'T10' => ($x->post('T10') !== NULL) ? $x->post('T10') : 0,
                'T11' => ($x->post('T11') !== NULL) ? $x->post('T11') : 0,
                'T12' => ($x->post('T12') !== NULL) ? $x->post('T12') : 0,
                'T13' => ($x->post('T13') !== NULL) ? $x->post('T13') : 0,
                'T14' => ($x->post('T14') !== NULL) ? $x->post('T14') : 0,
                'T15' => ($x->post('T15') !== NULL) ? $x->post('T15') : 0,
                'T16' => ($x->post('T16') !== NULL) ? $x->post('T16') : 0,
                'T17' => ($x->post('T17') !== NULL) ? $x->post('T17') : 0,
                'T18' => ($x->post('T18') !== NULL) ? $x->post('T18') : 0,
                'T19' => ($x->post('T19') !== NULL) ? $x->post('T19') : 0,
                'T20' => ($x->post('T20') !== NULL) ? $x->post('T20') : 0,
                'T21' => ($x->post('T21') !== NULL) ? $x->post('T21') : 0,
                'T22' => ($x->post('T22') !== NULL) ? $x->post('T22') : 0
            );
            $ID = $this->series_model->onAgregar($data);
            echo $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'PuntoInicial' => ($this->input->post('PuntoInicial') !== NULL) ? $this->input->post('PuntoInicial') : NULL,
                'PuntoFinal' => ($this->input->post('PuntoFinal') !== NULL) ? $this->input->post('PuntoFinal') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->series_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->series_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
