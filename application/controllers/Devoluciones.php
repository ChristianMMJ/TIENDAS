<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Devoluciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('devoluciones_model');
        $this->load->model('ventas_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if ($this->session->userdata['Ventas'] === 0) {
                $this->session->set_userdata("Ventas", 1);
            }
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "VENDEDOR", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vVentas');
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

    public function getVentas() {
        try {
            print json_encode($this->devoluciones_model->getVentas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaXID() {
        try {
            print json_encode($this->devoluciones_model->getVentaXID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onDevolucion() {
        try {
            $Datos = $this->ventas_model->onCrearFolio($this->input->post('TipoDoc'));
            $vta = $this->devoluciones_model->getVentabyID($this->input->post('Venta'));
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }
            $data = array(
                'TipoDoc' => $vta[0]->TipoDoc,
                'Tienda' => $this->session->userdata('TIENDA'),
                'FolioTienda' => $Folio,
                'Cliente' => $vta[0]->Cliente,
                'Vendedor' => $this->session->session->userdata('ID'),
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => Date('d/m/Y h:i:s a'),
                'MetodoPago' => 0,
                'Estatus' => 'DEVOLUCION',
                'Importe' => 0,
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->ventas_model->onAgregar($data);

            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Venta' => $ID,
                    'Estilo' => $v->Estilo,
                    'Color' => $v->Color,
                    'Talla' => $v->Talla,
                    'Cantidad' => $v->Cantidad,
                    'Subtotal' => $v->Subtotal,
                    'Descuento' => 0,
                    'Precio' =>  $v->Precio,
                    'PorcentajeDesc' =>  0
                );
                $this->ventas_model->onAgregarDetalle($data);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
