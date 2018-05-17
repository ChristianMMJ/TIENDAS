<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('tiendas_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
        $this->load->model('clientes_model');
        $this->load->model('generales_model');
        $this->load->model('empleados_model');
        $this->load->model('descuentos_model');
        $this->load->model('ventas_model');
        $this->load->helper('ticket_helper');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if ($this->session->userdata['Ventas'] === 0) {
                $this->session->set_userdata("Ventas", 1);
            }
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "VENDEDOR", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vDevoluciones');
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

    public function onCambiarSesion() {
        try {
            $this->session->set_userdata("Ventas", 3);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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
            extract($this->input->post());
            $data = $this->estilos_model->getEncabezadoSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle() {
        try {
            extract($this->input->post());
            $this->ventas_model->onEliminarDetalle($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getNuevoFolio() {
        try {
            $Datos = $this->ventas_model->onCrearFolio($this->input->post('TipoDoc'));
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
            $Datos = $this->ventas_model->onCrearFolio($this->input->post('TipoDoc'));
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }
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
                'SuPago' => $this->input->post('SuPago')
            );
            $ID = $this->ventas_model->onAgregar($data);
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
            $data = array(
                'Venta' => ($this->input->post('Venta') !== NULL) ? $this->input->post('Venta') : NULL,
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Color' => ($this->input->post('Color') !== NULL) ? $this->input->post('Color') : NULL,
                'Talla' => ($this->input->post('Talla') !== NULL) ? $this->input->post('Talla') : NULL,
                'Cantidad' => ($this->input->post('Cantidad') !== NULL) ? $this->input->post('Cantidad') : NULL,
                'Precio' => ($this->input->post('Precio') !== NULL) ? $this->input->post('Precio') : NULL,
                'Descuento' => ($this->input->post('Descuento') !== NULL) ? $this->input->post('Descuento') : NULL,
                'Subtotal' => ($this->input->post('Subtotal') !== NULL) ? $this->input->post('Subtotal') : NULL,
                'PorcentajeDesc' => ($this->input->post('PorcentajeDesc') !== NULL) ? $this->input->post('PorcentajeDesc') : NULL
            );
            $this->ventas_model->onAgregarDetalle($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'Cliente' => ($this->input->post('Cliente') !== NULL) ? $this->input->post('Cliente') : NULL,
                'Vendedor' => ($this->input->post('Vendedor') !== NULL) ? $this->input->post('Vendedor') : NULL,
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'MetodoPago' => ($this->input->post('MetodoPago') !== NULL) ? $this->input->post('MetodoPago') : NULL,
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL
            );
            $this->ventas_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarImporte() {
        try {
            $data = array(
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL
            );
            $this->ventas_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarEstatus() {
        try {
            $data = array(
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'SuPago' => ($this->input->post('SuPago') !== NULL) ? $this->input->post('SuPago') : NULL,
                'ImporteEnLetra' => ($this->input->post('ImporteEnLetra') !== NULL) ? $this->input->post('ImporteEnLetra') : NULL
            );
            $this->ventas_model->onModificar($this->input->post('ID'), $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {

            extract($this->input->post());
            unset($_POST['ID']);
            $this->ventas_model->onModificarDetalle($ID, $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciaXEstiloXColorXTienda() {
        try {
            $this->existencias_model->onModifcarExistenciaXEstiloXColorXTienda($this->input->post('Estilo'), $this->input->post('Color'), $this->input->post('Posicion'), $this->input->post('ExistenciaNueva'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaByFolioTiendaByTipoDocByTienda() {
        try {
            extract($this->input->post());
            $data = $this->ventas_model->getVentaByFolioTiendaByTipoDocByTienda($FolioTienda, $TipoDoc);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            extract($this->input->post());
            $data = $this->ventas_model->getDetalleByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasByEstiloByColor() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciasByEstiloByColor($Estilo, $Color);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciaByID() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciaByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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

    public function getEstilosExistentesXTienda() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getEstilosExistentesXTienda();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilosExt() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getEstilosExt();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDescuentos() {
        try {
            extract($this->input->post());
            $data = $this->descuentos_model->getDescuentos();
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
                $existe = $this->ventas_model->onComprobarExistenciaFisica($Tienda, $v->Estilo, $v->Color);
                PRINT "\nEXISTE EN LA TIENDA $Tienda EL ESTILO " . $v->Estilo . ", COLOR " . $v->Color . ": " . $existe[0]->EXISTE . "\n";
                if ($existe[0]->EXISTE > 0) {

                    /* OBTENER SERIE X ESTILO */
                    $serie = $this->ventas_model->getSerieXEstilo($v->Estilo);

                    for ($index = 1; $index <= 22; $index++) {
                        /* OBTENER LAS EXISTENCIAS POR TIENDA, ESTILO Y COLOR/COMBINACION */
                        $existencias = $this->ventas_model->getExistenciasXTiendaXEstiloXColor($Tienda, $v->Estilo, $v->Color);

                        if ($serie[0]->{"T$index"} > 0 &&
                                $serie[0]->{"T$index"} == $v->Talla) {
                            /* SUMAR LA CANTIDAD EN LA TALLA A LA TIENDA */
                            $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                            /* AGREGAR EXISTENCIAS A LA TIENDA */
                            $this->ventas_model->onModificarExistencias($Tienda, $v->Estilo, $v->Color, $existencia, $index);
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
            $e = $this->ventas_model->getVentaByID($this->input->post('ID'))[0];
            $pdf = new FPDF('P', 'mm', array(75/* ANCHO */, 80/* ALTURA */));
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(false);
            /* ENCABEZADO */
            $url = "./uploads/Tiendas/$e->TIENDA_ID/" . $e->FOTO_TIENDA;
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
            $pdf->Cell(27, $af, "Pares " . $pares, 0/* BORDE */, 0/* SALTO */, 'R');
            $af -= .5;
            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "I.V.A: ", 0/* BORDE */, 0/* SALTO */, 'C');
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$" . number_format(($e->TIPODOC === 1 ? $total * .16 : 0), 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');
            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "Total: ", 0/* BORDE */, 0/* SALTO */, 'R');

            $YY = $pdf->GetY();
            $total = ($e->TIPODOC === 1 ? $total * 1.16 : $total);
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$" . number_format($total, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');

            $pdf->SetX(50/* X */);
            $supago = ($e->SUPAGO > 0) ? $e->SUPAGO : 0;
            $pdf->Cell(8, $af, "Su Pago: ", 0/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$ " . number_format($supago, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');

            $cambio = $supago - $total;
            $pdf->SetX(50/* X */);
            $pdf->Cell(8, $af, "Cambio: ", 0/* BORDE */, 0/* SALTO */, 'L');
            $pdf->SetX(58/* X */);
            $pdf->Cell(14, $af, "$ " . number_format(($cambio > 0) ? $cambio : 0, 2, '.', ', '), 0/* BORDE */, 1/* SALTO */, 'R');
            $pdf->Line(/* Izq-X */50, /* Top-Y */ $pdf->GetY(), /* Largo */ 72, $pdf->GetY());

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
