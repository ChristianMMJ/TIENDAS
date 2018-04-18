<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('tiendas_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
        $this->load->model('clientes_model');
        $this->load->model('generales_model');
        $this->load->model('empleados_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vVentas');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getVendedores() {
        try {
            extract($this->input->post());
            $data = $this->empleados_model->getEmpleados();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMetodosPago() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('CONDICIONES DE PAGO');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDescuentos() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('DESCUENTOS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            extract($this->input->post());
            $data = $this->clientes_model->getClientes();
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

    public function getSerieXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->estilos_model->getSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            extract($this->input->post());
            print json_encode($this->estilos_model->getEstiloByID($Estilo));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciasXEstiloXCombinacion($Estilo, $Combinacion);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            extract($this->input->post());
            $data = $this->tiendas_model->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
