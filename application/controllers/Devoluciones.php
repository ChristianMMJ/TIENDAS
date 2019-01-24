<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Devoluciones extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->model('devoluciones_model','dvm')->model('ventas_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if ($this->session->userdata['Ventas'] === 0) {
                $this->session->set_userdata("Ventas", 1);
            }
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "VENDEDOR", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuVentas')->view('vDevoluciones')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getVentas() {
        try {
            print json_encode($this->dvm->getVentas()); /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDevoluciones() {
        try {
            print json_encode($this->dvm->getDevoluciones());  /* JSONP */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->dvm->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            print json_encode($this->dvm->getCombinacionesXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            print json_encode($this->dvm->getSerieXEstiloConClave($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMetodosPago() {
        try {
            print json_encode($this->dvm->getCatalogosByFielID('CONDICIONES DE PAGO'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaXID() {
        try {
            print json_encode($this->dvm->getVentaXID($this->input->get('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion() {
        try {
            print json_encode($this->dvm->getExistenciasXEstiloXCombinacionT($this->input->post('Estilo'), $this->input->post('Combinacion')));
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
                $vta = $this->dvm->getVentabyID($this->input->post('Venta'));
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
                $ID = $this->dvm->onAgregar($data);
                print '{ "ID":' . $ID . '}'; /* ID REQUERIDO PARA EL TICKET */
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
                $IDD = $this->dvm->onAgregarDevolucion($data);

                /* DETALLE DE LA VENTA DEVUELTO */
                $DetalleDevuelto = json_decode($this->input->post("DetalleDevuelto"));
                foreach ($DetalleDevuelto as $key => $v) {
                    /* AGREGAR LOS PRODUCTOS DEVUELTOS (SUMAR) */

                    /* OBTENER SERIE X ESTILO */
                    $serie = $this->dvm->getSerieXEstilo($v->Estilo);

                    /* ACTUALIZA LAS EXISTENCIAS DE LA TIENDA DESTINO */
                    $existencia = 0;
                    for ($index = 1; $index <= 22; $index++) {
                        /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                        $existencias = $this->dvm->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);
                        /* COMPROBAR EXISTENCIAS EN LA TIENDA ORIGEN TENGA DISPONIBLES DE LA TALLA SOLICITADA */
                        $existencias_disponibles = $this->dvm->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);
                        // print "Talla : " . $v->Talla . "-" . $v->Cantidad . ", EXDES: " . $existencias_disponibles[0]->{"Ex$index"} . "\n";
                        if ($serie[0]->{"T$index"} == $v->Talla) {
                            /* SUMAR LA CANTIDAD EN LA TALLA DE LA TIENDA DESTINO */
                            $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                            /* AGREGAR EXISTENCIAS DE LA TIENDA DESTINO */
                            $this->dvm->onModificarExistencias($this->session->userdata('TIENDA'), $v->Estilo, $v->Color, $existencia, $index);
                            $data = array(
                                'Devolucion' => $IDD,
                                'Estilo' => $v->Estilo,
                                'Color' => $v->Color,
                                'Talla' => $v->Talla,
                                'Cantidad' => $v->Cantidad,
                                'Subtotal' => $v->SubTotal,
                                'Descuento' => 0,
                                'Precio' => $v->Precio,
                                'PorcentajeDesc' => 0,
                                'Registro' => Date('d/m/Y h:i:s a')
                            );
                            $this->dvm->onAgregarDevolucionDetalle($data);
                        }
                    }/* FIN AGREGAR LOS PRODUCTOS DEVUELTOS */
                }

                /* DETALLE DE LA VENTA (DEVOLUCION) */
                $Detalle = json_decode($this->input->post("Detalle"));
                foreach ($Detalle as $key => $v) {
                    /* ENTREGAR LOS PRODUCTOS SELECCIONADOS (RESTAR) */
                    /* OBTENER SERIE X ESTILO */
                    $serie = $this->dvm->getSerieXEstilo($v->Estilo);

                    /* ACTUALIZA LAS EXISTENCIAS DE LA TIENDA DESTINO */
                    $existencia = 0;
                    for ($index = 1; $index <= 22; $index++) {
                        /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                        $existencias = $this->dvm->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);
                        /* COMPROBAR EXISTENCIAS EN LA TIENDA ORIGEN TENGA DISPONIBLES DE LA TALLA SOLICITADA */
                        $existencias_disponibles = $this->dvm->getExistenciasXTiendaXEstiloXColor($this->session->userdata('TIENDA'), $v->Estilo, $v->Color);

                        if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_disponibles[0]->{"Ex$index"} > 0) {
                            /* RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                            $existencia = ($existencias_disponibles[0]->{"Ex$index"} - $v->Cantidad);
                            /* REMOVER EXISTENCIAS DE LA TIENDA ACTUAL/ORIGEN */
                            $this->dvm->onModificarExistencias($this->session->userdata('TIENDA'), $v->Estilo, $v->Color, $existencia, $index);
                            /* FIN RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                            /* AGREGAR UN REGISTRO EN EL DETALLE DE LA DEVOLUCIÓN */
                            $data = array(
                                'Venta' => $ID,
                                'Estilo' => $v->Estilo,
                                'Color' => $v->Color,
                                'Talla' => $v->Talla,
                                'Cantidad' => $v->Cantidad,
                                'Subtotal' => $v->SubTotal,
                                'Descuento' => 0,
                                'Precio' => $v->Precio,
                                'PorcentajeDesc' => 0
                            );
                            $this->dvm->onAgregarDetalle($data);
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

    function getTicketXVenta() {
        try {
            $e = $this->dvm->getVentaXTicket($this->input->post('ID'))[0];
            $pdf = new FPDF('P', 'mm', array(75/* ANCHO */, 80/* ALTURA */));
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(false);
            /* ENCABEZADO */
            $url = "./" . $e->FOTO_TIENDA;
            $pdf->Image($url, 27.5, 2, /* ANCHO */ 21, /* ALTO */ 21);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetY(23);
            $pdf->SetX(1/* X */);
            $pdf->Cell(75, 4, $e->TIENDA, 0/* BORDE */, 1, 'C');
            $pdf->SetFont('Arial', '', 6);
            $pdf->SetXY(1/* X */, 27.5/* Y */);
            $pdf->MultiCell(75, 2, "No Venta: " . $e->FOLIO, 0/* BORDE */, 'C');
            $pdf->SetXY(1/* X */, 30/* Y */);
            $pdf->Cell(25, 4, $e->DIRECCION, 0/* BORDE */, 1, 'L');

            $pdf->SetXY(0/* X */, 33/* Y */);

            $pdf->Line(/* Izq-X */2, /* Top-Y */ $pdf->GetY() + 1.5, /* Largo */ 72, $pdf->GetY() + 1.5); /* FIN ENCABEZADO */

            /* DETALLE */
            $detalle = $this->ventas_model->getVentaDetalleByID($this->input->post('ID'));
            $pdf->SetFont('Arial', '', 5);
            $Y = $pdf->GetY() + 2;
            $af = 2.5;
            $total_articulos = 0;
            $total = 0.0;
            $pares = 0;
            foreach ($detalle as $key => $v) {
//                for ($index = 0; $index < 100; $index++) {
                if ($pdf->getY() > 75) {
                    $pdf->AddPage();
                    $Y = 2;
                }
                $subtotal = $v->PRECIO * $v->CANTIDAD;
                $pdf->SetY($Y);
                $pdf->SetX(1/* X */);
                $pdf->Cell(40, $af, $v->ESCOTA, 0/* BORDE */, 0/* SALTO */, 'L');
                $pdf->SetX(41/* X */);
                $pdf->Cell(9, $af, $v->CANTIDAD, 0/* BORDE */, 0/* SALTO */, 'C');
                $pdf->SetX(50/* X */);
                $pdf->Cell(12, $af, "$" . number_format($v->PRECIO, 2, '.', ', '), 0/* BORDE */, 0/* SALTO */, 'C');
                $pdf->SetX(62/* X */);
                $pdf->Cell(12, $af, "$" . number_format($subtotal, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'C');
                $Y = $pdf->GetY();
                /* SUMAR */
                $total += $subtotal;
                $total_articulos += 1;
                $pares += $v->CANTIDAD;
//                }
            }
            /* FIN DETALLE */
            $pdf->Line(/* Izq-X */2, /* Top-Y */ $pdf->GetY(), /* Largo */ 72, $pdf->GetY());
            $pdf->SetY($pdf->GetY() + 1.5);
            /* PIE */
            $pdf->SetX(1/* X */);
            $pdf->Cell(27, $af, "Articulos vendidos " . $total_articulos, 0/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(20/* X */);
            //$pdf->Cell(27, $af, "Pares " . $pares, 0/* BORDE */, 0/* SALTO */, 'R');
            $af -= .5;
            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "I.V.A: ", 0/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$" . number_format(($e->TIPODOC === 1 ? $total * .16 : 0), 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');

            $YY = $pdf->GetY();
            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "Desc: ", 0/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$" . number_format($e->DESCUENTO_TOTAL, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');

            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "Total: ", 0/* BORDE */, 0/* SALTO */, 'R');

            if ($e->TIPO_VD === 'V') {
                $total = ($e->TIPODOC === 1 ? $total * 1.16 : $total);
                $total = $total - $e->DESCUENTO_TOTAL;
                $pdf->SetX(58/* X */);
                $pdf->Cell(14, $af, "$" . number_format($total, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');
            } else {
                $total = ($e->TIPODOC === 1 ? $total * 1.16 : $total);
                $total = $total - $e->DESCUENTO_TOTAL;
                $pdf->SetX(58/* X */);
                $pdf->Cell(14, $af, "$" . number_format($e->IMPORTE_VENTA, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');
            }
            $pdf->SetX(50/* X */);
            $supago = ($e->SUPAGO > 0) ? str_replace(",", "", $e->SUPAGO) : 0;
            $pdf->Cell(8, $af, "Su Pago: ", 0/* BORDE */, 0/* SALTO */, 'R');
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$ " . number_format($supago, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');

            $cambio = $supago - $total;
            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "Cambio: ", 0/* BORDE */, 0/* SALTO */, 'R');
            /* ES VENTA ? */
            if ($e->TIPO_VD === 'V') {
                $pdf->SetX(58/* X */);
                $pdf->Cell(14, $af, "$ " . number_format(($cambio > 0) ? $cambio : 0, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');
                $pdf->Line(/* Izq-X */50, /* Top-Y */ $pdf->GetY(), /* Largo */ 72, $pdf->GetY());
            } else {
                $pdf->SetX(58/* X */);
                $pdf->Cell(14, $af, "$ " . number_format(($cambio > 0) ? $cambio : 0, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');
                $pdf->Line(/* Izq-X */50, /* Top-Y */ $pdf->GetY(), /* Largo */ 72, $pdf->GetY());
            }

            $pdf->SetFont('Arial', '', 4);
            $pdf->SetY($YY);
            $pdf->SetX(1/* X */);
            $pdf->MultiCell(50, $af - .2, strtoupper(utf8_decode($e->TOTAL_EN_LETRA)), 0/* BORDE */, 'L');
            $pdf->SetFont('Arial', '', 5);
            $pdf->SetX(1/* X */);
            $pdf->Cell(29, $af, "Condiciones de pago: " . $e->METODO_PAGO, 0/* BORDE */, 1/* SALTO */, 'L');

            $pdf->SetX(1/* X */);
            $pdf->Cell(50, $af, utf8_decode("Lugar de expedición: " . $e->LUGAR_EXPEDICION), 0/* BORDE */, 1/* SALTO */, 'L');
            $pdf->SetX(1/* X */);
            $pdf->Cell(50, $af, utf8_decode("Gracias por su compra, le atendió: " . $e->VENDEDOR), 0/* BORDE */, 1/* SALTO */, 'L');

            /* PIE */
            /* SALIDA DEL TICKET */
            $path = 'uploads/Reportes/Ventas';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "TICKET_" . $this->input->post('ID');
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Ventas/')) {
                
            }
            $pdf->Output($url);
            print base_url() . $url;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
