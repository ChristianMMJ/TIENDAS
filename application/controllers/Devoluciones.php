<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Devoluciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
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
        /*
         *   ALTER TABLE [ZAP].[dbo].[sz_Ventas] ADD Tipo VARCHAR(15) NOT NULL DEFAULT 'VENTA';
         */
        try {
            $Datos = $this->ventas_model->onCrearFolio($this->input->post('TP'));
            $vta = $this->devoluciones_model->getVentabyID($this->input->post('Venta'));
            /* GENERAR VENTA */
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }
            var_dump($this->input->post());
            $diff = $this->input->post('DiferenciaACobrar');
            $data = array(
                'TipoDoc' => $vta[0]->TipoDoc,
                'Tienda' => $this->session->userdata('TIENDA'),
                'FolioTienda' => $Folio,
                'Cliente' => $vta[0]->Cliente,
                'Vendedor' => $this->session->userdata('ID'),
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => Date('d/m/Y h:i:s a'),
                'MetodoPago' => 0,
                'Estatus' => 'DEVOLUCION',
                'Importe' => ($diff > 0) ? $diff : 0,
                'Usuario' => $this->session->userdata('ID'),
                'Tipo' => 'DEVOLUCION'
            );
            $ID = $this->devoluciones_model->onAgregar($data);

            /* DETALLE DE LA VENTA DEVUELTO */
            $DetalleDevuelto = json_decode($this->input->post("DetalleDevuelto"));
            foreach ($DetalleDevuelto as $key => $v) {

                /* AGREGAR LOS PRODUCTOS DEVUELTOS (SUMAR) */

                /* OBTENER SERIE X ESTILO */
                $serie = $this->devoluciones_model->getSerieXEstilo($v->Estilo);

                /* ACTUALIZA LAS EXISTENCIAS DE LA TIENDA DESTINO */
                $existencia = 0;
                for ($index = 1; $index <= 22; $index++) {
                    /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                    $existencias = $this->devoluciones_model->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);
                    /* COMPROBAR EXISTENCIAS EN LA TIENDA ORIGEN TENGA DISPONIBLES DE LA TALLA SOLICITADA */
                    $existencias_disponibles = $this->devoluciones_model->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);
                    if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_disponibles[0]->{"Ex$index"} > 0) {
                        /* SUMAR LA CANTIDAD EN LA TALLA DE LA TIENDA DESTINO */
                        $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                        /* AGREGAR EXISTENCIAS DE LA TIENDA DESTINO */
                        $this->devoluciones_model->onModificarExistencias($this->session->userdata('TIENDA'), $v->Estilo, $v->Color, $existencia, $index);
                        break;
                    }
                }
                /* FIN AGREGAR LOS PRODUCTOS DEVUELTOS */
            }

            /* DETALLE DE LA VENTA (DEVOLUCION) */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                /* ENTREGAR LOS PRODUCTOS SELECCIONADOS (RESTAR) */
                /* OBTENER SERIE X ESTILO */
                $serie = $this->devoluciones_model->getSerieXEstilo($v->Estilo);

                /* ACTUALIZA LAS EXISTENCIAS DE LA TIENDA DESTINO */
                $existencia = 0;
                for ($index = 1; $index <= 22; $index++) {

                    /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                    $existencias = $this->devoluciones_model->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);
                    /* COMPROBAR EXISTENCIAS EN LA TIENDA ORIGEN TENGA DISPONIBLES DE LA TALLA SOLICITADA */
                    $existencias_disponibles = $this->devoluciones_model->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);

                    if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_disponibles[0]->{"Ex$index"} > 0) {
                        /* RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                        $existencia = ($existencias_disponibles[0]->{"Ex$index"} - $v->Cantidad);
                        /* REMOVER EXISTENCIAS DE LA TIENDA ACTUAL/ORIGEN */
                        $this->devoluciones_model->onModificarExistencias($this->session->userdata('TIENDA'), $v->Estilo, $v->Color, $existencia, $index);
                        /* FIN RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */

                        /* AGREGAR UN REGISTRO EN EL DETALLE DE LA DEVOLUCIÓN */
                        $data = array(
                            'Venta' => $ID,
                            'Estilo' => $v->Estilo,
                            'Color' => $v->Color,
                            'Talla' => $v->Talla,
                            'Cantidad' => $v->Cantidad,
                            'Subtotal' => $v->Subtotal,
                            'Descuento' => 0,
                            'Precio' => $v->Precio,
                            'PorcentajeDesc' => 0
                        );
                        $this->devoluciones_model->onAgregarDetalle($data);
                        break;
                    }
                }
                /* FIN ENTREGAR LOS PRODUCTOS SELECCIONADOS */
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
