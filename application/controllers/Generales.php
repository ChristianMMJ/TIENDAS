<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('usuario_model')->model('generales_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view("vMenuCatalogos")->view('vGenerales')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->generales_model->getRecords($this->input->post('fieldId')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogoByID() {
        try {
            print json_encode($this->generales_model->getCatalogoByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $X = $this->input;
            $data = array(
                'FieldId' => ($X->post('FieldId') !== NULL) ? $X->post('FieldId') : NULL,
                'IValue' => ($X->post('IValue') !== NULL) ? $X->post('IValue') : NULL,
                'SValue' => ($X->post('SValue') !== NULL) ? $X->post('SValue') : NULL,
                'Special' => ($X->post('Special') !== NULL) ? $X->post('Special') : NULL,
                'Valor_Num' => ($X->post('Valor_Num') !== NULL) ? $X->post('Valor_Num') : NULL,
                'Valor_Text' => ($X->post('Valor_Text') !== NULL) ? $X->post('Valor_Text') : NULL,
                'NumeroProducto' => ($X->post('NumeroProducto') !== NULL) ? $X->post('NumeroProducto') : NULL,
                'Estatus' => 'ACTIVO'
            );
            $ID = $this->generales_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $X = $this->input;
            $DATA = array(
                'IValue' => ($X->post('IValue') !== NULL) ? $X->post('IValue') : NULL,
                'SValue' => ($X->post('SValue') !== NULL) ? $X->post('SValue') : NULL,
                'Special' => ($X->post('Special') !== NULL) ? $X->post('Special') : NULL,
                'Valor_Num' => ($X->post('Valor_Num') !== NULL) ? $X->post('Valor_Num') : NULL,
                'Valor_Text' => ($X->post('Valor_Text') !== NULL) ? $X->post('Valor_Text') : NULL,
                'Estatus' => ($X->post('Estatus') !== NULL) ? $X->post('Estatus') : NULL,
                'NumeroProducto' => ($X->post('NumeroProducto') !== NULL) ? $X->post('NumeroProducto') : NULL
            );
            $this->generales_model->onModificar($X->post('ID'), $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->generales_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
