<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('gastos_model');
        $this->load->model('generales_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vGastos');
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

    public function getCategoriasGastos() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('CATEGORIAS GASTOS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());


            $data = $this->gastos_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGastoByID() {
        try {
            extract($this->input->post());
            $data = $this->gastos_model->getGastoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGastoDetalleByID() {
        try {
            print json_encode($this->gastos_model->getGastoDetalleByID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {


            $data = array(
                'Tienda' => $this->session->userdata('TIENDA'),
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'DocMov' => ($this->input->post('DocMov') !== NULL) ? $this->input->post('DocMov') : NULL,
                'TipoDoc' => ($this->input->post('TipoDoc') !== NULL) ? $this->input->post('TipoDoc') : NULL,
                'Estatus' => 'ACTIVO',
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL,
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->gastos_model->onAgregar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Gasto' => $ID,
                    'Concepto' => $v->Concepto,
                    'Cantidad' => $v->Cantidad,
                    'Precio' => $v->Precio,
                    'Subtotal' => $v->Subtotal,
                    'Categoria' => $v->Categoria
                );
                $this->gastos_model->onAgregarDetalle($data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->gastos_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
