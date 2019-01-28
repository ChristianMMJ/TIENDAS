<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Descuentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('Descuentos_model','dsm')->model('Tiendas_model','tsm');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuCatalogos')->view('vDescuentos')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->tsm->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDescuentos() {
        try {
            print json_encode($this->tsm->getDescuentos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            print json_encode($this->tiendas_model->getTiendas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDescuentoByID() {
        try {
            print json_encode($this->tsm->getDescuentoByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Porcentaje' => ($x->post('Porcentaje') !== NULL) ? $x->post('Porcentaje') : NULL,
                'Tienda' => ($x->post('Tienda') !== NULL) ? $x->post('Tienda') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $ID = $this->tsm->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try { 
            $x = $this->input;
            $data = array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'Descripcion' => ($x->post('Descripcion') !== NULL) ? $x->post('Descripcion') : NULL,
                'Porcentaje' => ($x->post('Porcentaje') !== NULL) ? $x->post('Porcentaje') : NULL,
                'Tienda' => ($x->post('Tienda') !== NULL) ? $x->post('Tienda') : NULL,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $this->tsm->onModificar($x->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->tsm->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
