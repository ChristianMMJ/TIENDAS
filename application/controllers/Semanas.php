<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semanas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('semanas_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vSemanas');
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
            $data = $this->semanas_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSemanaNominaByID() {
        try {
            extract($this->input->post());
            $data = $this->semanas_model->getSemanaNominaByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Sem' => ($this->input->post('Sem') !== NULL) ? $this->input->post('Sem') : NULL,
                'FechaIni' => ($this->input->post('FechaIni') !== NULL) ? $this->input->post('FechaIni') : NULL,
                'FechaFin' => ($this->input->post('FechaFin') !== NULL) ? $this->input->post('FechaFin') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $ID = $this->semanas_model->onAgregar($data);
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $data = array(
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Sem' => ($this->input->post('Sem') !== NULL) ? $this->input->post('Sem') : NULL,
                'FechaIni' => ($this->input->post('FechaIni') !== NULL) ? $this->input->post('FechaIni') : NULL,
                'FechaFin' => ($this->input->post('FechaFin') !== NULL) ? $this->input->post('FechaFin') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->semanas_model->onModificar($ID, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->semanas_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
