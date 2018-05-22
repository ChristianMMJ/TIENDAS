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
                $this->load->view('vDevoluciones');
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
            print json_encode($this->devoluciones_model->getVentas()); /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDevoluciones() {
        try {
            print json_encode($this->devoluciones_model->getDevoluciones());  /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->devoluciones_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            print json_encode($this->devoluciones_model->getCombinacionesXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            print json_encode($this->devoluciones_model->getSerieXEstiloConClave($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
 
    public function getMetodosPago() {
        try {
            print json_encode($this->devoluciones_model->getCatalogosByFielID('CONDICIONES DE PAGO'));
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

    public function getExistenciasXEstiloXCombinacion() {
        try {
            print json_encode($this->devoluciones_model->getExistenciasXEstiloXCombinacionT($this->input->post('Estilo'), $this->input->post('Combinacion')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onDevolucion() {
        /*
         *   ALTER TABLE [ZAP].[dbo].[sz_Ventas] ADD Tipo VARCHAR(5) NOT NULL DEFAULT 'V';
         */
        try {
            if ($this->input->post('Venta') !== '' && $this->input->post('Venta') > 0) {
                $Datos = $this->ventas_model->onCrearFolio($this->input->post('TP'));
                $vta = $this->devoluciones_model->getVentabyID($this->input->post('Venta'));
                /* GENERAR VENTA */
                $Folio = $Datos[0]->FolioTienda;
                if (empty($Folio)) {
                    $Folio = 1;
                } else {
                    $Folio = $Folio + 1;
                }
                $diff = $this->input->post('DiferenciaACobrar');
                $supago = str_replace(",", "", $this->input->post('SuPago'));
                $data = array(
                    'TipoDoc' => $vta[0]->TipoDoc,
                    'Tienda' => $this->session->userdata('TIENDA'),
                    'FolioTienda' => $Folio,
                    'Cliente' => $vta[0]->Cliente,
                    'Vendedor' => $this->session->userdata('ID'),
                    'FechaCreacion' => Date('d/m/Y h:i:s a'),
                    'FechaMov' => Date('d/m/Y h:i:s a'),
                    'MetodoPago' => $this->input->post('MetodoDePago'),
                    'Estatus' => 'CERRADA',
                    'Importe' => ($diff > 0) ? $diff : 0,
                    'Usuario' => $this->session->userdata('ID'),
                    'SuPago' => $supago,
                    'ImporteEnLetra' => $this->input->post('ImporteEnLetra'),
                    'Tipo' => 'D'
                );
                $ID = $this->devoluciones_model->onAgregar($data);
                $data = array(
                    'Venta' => $this->input->post('Venta'),
                    'TipoDoc' => $vta[0]->TipoDoc,
                    'Tienda' => $this->session->userdata('TIENDA'),
                    'FolioTienda' => $Folio,
                    'Cliente' => $vta[0]->Cliente,
                    'Vendedor' => $this->session->userdata('ID'),
                    'FechaCreacion' => Date('d/m/Y h:i:s a'),
                    'FechaMov' => Date('d/m/Y h:i:s a'),
                    'MetodoPago' => $this->input->post('MetodoDePago'),
                    'Estatus' => 'CERRADA',
                    'Importe' => ($diff > 0) ? $diff : 0,
                    'Usuario' => $this->session->userdata('ID'),
                    'SuPago' => $this->input->post('SuPago'),
                    'ImporteEnLetra' => $this->input->post('ImporteEnLetra'),
                    'Tipo' => 'D'
                );
                $IDD = $this->devoluciones_model->onAgregarDevolucion($data);

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
                        print "Talla : " . $v->Talla . "-" . $v->Cantidad . ", EXDES: " . $existencias_disponibles[0]->{"Ex$index"} . "\n";
                        if ($serie[0]->{"T$index"} == $v->Talla) {
                            /* SUMAR LA CANTIDAD EN LA TALLA DE LA TIENDA DESTINO */
                            $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                            /* AGREGAR EXISTENCIAS DE LA TIENDA DESTINO */
                            $this->devoluciones_model->onModificarExistencias($this->session->userdata('TIENDA'), $v->Estilo, $v->Color, $existencia, $index);
                            $data = array(
                                'Devolucion' => $IDD,
                                'Estilo' => $v->Estilo,
                                'Color' => $v->Color,
                                'Talla' => $v->Talla,
                                'Cantidad' => $v->Cantidad,
                                'Subtotal' => $v->Subtotal,
                                'Descuento' => 0,
                                'Precio' => $v->Precio,
                                'PorcentajeDesc' => 0,
                                'Registro' => Date('d/m/Y h:i:s a')
                            );
                            $this->devoluciones_model->onAgregarDevolucionDetalle($data);
                        }
                    }/* FIN AGREGAR LOS PRODUCTOS DEVUELTOS */
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
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCancelarDevolucion() {
        try {
            /* CANCELAR LA VENTA POR DEVOLUCION */
            $ID = $this->input->post('ID');
            PRINT $ID;
            /* CANCELAR LA DEVOLUCION */

            /**/
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
