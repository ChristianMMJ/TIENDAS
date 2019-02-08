<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')
                ->model('estilos_model')
                ->model('tiendas_model')
                ->model('combinaciones_model')
                ->model('existencias_model','exm')
                ->model('clientes_model')
                ->model('generales_model')
                ->model('empleados_model')
                ->model('descuentos_model')
                ->model('ventas_model', 'vtm')
                ->model('devoluciones_model')
                ->helper('ticket_helper');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if ($this->session->userdata['Ventas'] === 0) {
                $this->session->set_userdata("Ventas", 1);
            }
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "VENDEDOR", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vVentas')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onConsultarAcceso() {
        try {
            if ($this->session->userdata['Tipo'] === 'VENDEDOR') {
                $array_items = array('USERNAME', 'PASSWORD', 'LOGGED', 'TIENDA', 'TIENDA_NOMBRE', 'ID', 'Tipo', 'Ventas');
                $this->session->unset_userdata($array_items);
                $this->session->sess_destroy();
                header('Location: ' . base_url());
            } else {
                header('Location: ' . base_url());
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEncabezadoSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getEncabezadoSerieXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle() {
        try {
            $this->vtm->onEliminarDetalle($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getNuevoFolio() {
        try {
            $Datos = $this->vtm->onCrearFolio($this->input->post('TipoDoc'));
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }

            print $Folio;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $Datos = $this->vtm->onCrearFolio($this->input->post('TipoDoc'));
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }
            $supago = str_replace(",", "", $this->input->post('SuPago'));
            $data = array(
                'TipoDoc' => ($this->input->post('TipoDoc') !== NULL) ? $this->input->post('TipoDoc') : NULL,
                'Tienda' => $this->session->userdata('TIENDA'),
                'FolioTienda' => $Folio,
                'Cliente' => ($this->input->post('Cliente') !== NULL) ? $this->input->post('Cliente') : NULL,
                'Vendedor' => ($this->input->post('Vendedor') !== NULL) ? $this->input->post('Vendedor') : NULL,
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'MetodoPago' => ($this->input->post('MetodoPago') !== NULL) ? $this->input->post('MetodoPago') : NULL,
                'Estatus' => 'BORRADOR',
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL,
                'Usuario' => $this->session->userdata('ID'),
                'SuPago' => $supago,
                'Tipo' => 'V',
                'ImporteEnLetra' => ''
            );
            $ID = $this->vtm->onAgregar($data);
            $dataCliente = array(
                'ID' => $ID,
                'FolioTienda' => $Folio
            );
//print $ID;
            echo json_encode($dataCliente);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
        $x = $this->input;
            $data = array(
                'Venta' => $this->isValidField('Venta', 1),
                'Estilo' => $this->isValidField('Estilo', 1),
                'Color' => $this->isValidField('Color', 1),
                'Talla' => $this->isValidField('Talla', 1),
                'Cantidad' => $this->isValidField('Cantidad', 1),
                'Precio' => $this->isValidField('Precio', 1),
                'Descuento' => $this->isValidField('Descuento', 1),
                'Subtotal' => $this->isValidField('Subtotal', 1),
                'PorcentajeDesc' => ($x->post('PorcentajeDesc') !== '' && $x->post('PorcentajeDesc') !== NULL) ? $x->post('PorcentajeDesc') : 0.0,
                'Registro' => Date('d/m/Y h:i:s a')
            );
            $this->vtm->onAgregarDetalle($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function isValidField($field, $type) {
        $x = $this->input;
        switch ($type) {
            case 1:
                return ($x->post($field) !== NULL) ? $x->post($field) : NULL;
                break;
            case 2:
                return ($x->post($field) !== NULL) ? $x->post($field) : 0.0;
                break;
        }
    }

    public function onModificar() {
        try {
            $x = $this->input;
            $data = array(
                'Cliente' => ($x->post('Cliente') !== NULL) ? $x->post('Cliente') : NULL,
                'Vendedor' => ($x->post('Vendedor') !== NULL) ? $x->post('Vendedor') : NULL,
                'FechaMov' => ($x->post('FechaMov') !== NULL) ? $x->post('FechaMov') : NULL,
                'MetodoPago' => ($x->post('MetodoPago') !== NULL) ? $x->post('MetodoPago') : NULL,
                'Importe' => ($x->post('Importe') !== NULL) ? $x->post('Importe') : NULL
            );
            $this->vtm->onModificar($x->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarImporte() {
        try {
            $data = array(
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL
            );
            $this->vtm->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarEstatus() {
        try {
            $x = $this->input;
            $data = array(
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL,
                'SuPago' => ($x->post('SuPago') !== NULL) ? $x->post('SuPago') : NULL,
                'ImporteEnLetra' => ($x->post('ImporteEnLetra') !== NULL) ? $x->post('ImporteEnLetra') : NULL
            );
            $this->vtm->onModificar($x->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {
            extract($this->input->post());
            unset($_POST['ID']);
            $this->vtm->onModificarDetalle($ID, $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciaXEstiloXColorXTienda() {
        try {
            $this->exm->onModifcarExistenciaXEstiloXColorXTienda($this->input->post('Estilo'), $this->input->post('Color'), $this->input->post('Posicion'), $this->input->post('ExistenciaNueva'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaByFolioTiendaByTipoDocByTienda() {
        try {
            print json_encode($this->vtm->getVentaByFolioTiendaByTipoDocByTienda($this->input->post('FolioTienda'), $this->input->post('TipoDoc')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            print json_encode($this->vtm->getDetalleByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasByEstiloByColor() {
        try {
            print json_encode($this->exm->getExistenciasByEstiloByColor($this->input->post('Estilo'), $this->input->post('Color')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciaByID() {
        try {
            print json_encode($this->exm->getExistenciaByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVendedores() {
        try {
            print json_encode($this->vtm->getEmpleados($this->session->userdata('TIENDA')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMetodosPago() {
        try {
            print json_encode($this->generales_model->getCatalogosByFielID('CONDICIONES DE PAGO'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            print json_encode($this->clientes_model->getClientes());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            print json_encode($this->estilos_model->getEstilos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilosExistentesXTienda() {
        try {
            print json_encode($this->exm->getEstilosExistentesXTienda());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilosExt() {
        try {
            print json_encode($this->exm->getEstilosExt());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDescuentos() {
        try {
            print json_encode($this->descuentos_model->getDescuentos());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCombinacionesXEstilo() {
        try {
            print json_encode($this->combinaciones_model->getCombinacionesXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo() {
        try {
            print json_encode($this->estilos_model->getSerieXEstilo($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->estilos_model->getEstiloByID($this->input->post('Estilo')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion() {
        try {
            extract($this->input->post());
            $data = $this->exm->getExistenciasXEstiloXCombinacion($Estilo, $Combinacion);
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

    public function onCancelarVenta() {
        try {
            /* OBTENER LA TIENDA DEL USUARIO ACTUAL */
            $Tienda = $this->session->userdata('TIENDA');

            /* CANCELAR VENTA */
            $update = $this->db;
            $update->where('ID', $this->input->post("ID"));
            $update->update("sz_Ventas", array('Estatus' => 'CANCELADO'));
            /* FIN CANCELAR VENTA */

            /* OBTENER EL DETALLE DE LAS EXISTENCIAS */
            $Detalle = json_decode($this->input->post("Detalle"));

            /* DEVOLVER LAS EXISTENCIAS A SU REGISTRO CORRESPONDIENTE */
            foreach ($Detalle as $key => $v) {
                /* COMPROBAR SI TIENE DE ESE ESTILO/COLOR/TALLA EN LA TIENDA */
                $existe = $this->vtm->onComprobarExistenciaFisica($Tienda, $v->Estilo, $v->Color);
                PRINT "\nEXISTE EN LA TIENDA $Tienda EL ESTILO " . $v->Estilo . ", COLOR " . $v->Color . ": " . $existe[0]->EXISTE . "\n";
                if ($existe[0]->EXISTE > 0) {

                    /* OBTENER SERIE X ESTILO */
                    $serie = $this->vtm->getSerieXEstilo($v->Estilo);

                    for ($index = 1; $index <= 22; $index++) {
                        /* OBTENER LAS EXISTENCIAS POR TIENDA, ESTILO Y COLOR/COMBINACION */
                        $existencias = $this->vtm->getExistenciasXTiendaXEstiloXColor($Tienda, $v->Estilo, $v->Color);

                        if ($serie[0]->{"T$index"} > 0 &&
                                $serie[0]->{"T$index"} == $v->Talla) {
                            /* SUMAR LA CANTIDAD EN LA TALLA A LA TIENDA */
                            $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                            /* AGREGAR EXISTENCIAS A LA TIENDA */
                            $this->vtm->onModificarExistencias($Tienda, $v->Estilo, $v->Color, $existencia, $index);
                        }
                    }
                }
                /* FIN DEVOLVER LAS EXISTENCIAS A SU REGISTRO CORRESPONDIENTE */
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getTicketXVenta() {
        try {
            $e = $this->devoluciones_model->getVentaXTicket($this->input->post('ID'))[0];
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
            $detalle = $this->vtm->getVentaDetalleByID($this->input->post('ID'));
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
