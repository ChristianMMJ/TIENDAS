<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class ReportesVentas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('reportesVentas_model')->model('generales_model')->model('tiendas_model')->model('estilos_model')->helper('reportes_helper')->helper('file');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuVentas')->view('vReportesVentas')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getTiendas() {
        try {
            print json_encode($this->tiendas_model->getTiendas());
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

    public function onImprimirReporteVentasGenerales() {
        extract($this->input->post());
        $Tiendas = $this->reportesVentas_model->getTiendas($TipoDoc, $Tienda, $MetodoPago, $FechaIni, $FechaFin);

        $Ventas = $this->reportesVentas_model->getVentasGenerales($TipoDoc, $Tienda, $MetodoPago, $FechaIni, $FechaFin);


        if (!empty($Ventas)) {
            $Encabezado = $Ventas[0];
            $pdf = new PDFVTASG('L', 'mm', array(215.9, 279.4));
            $pdf->AliasNbPages();

            $pdf->LogoEmpresa = utf8_decode($this->session->userdata('EMPRESA_LOGO'));
            $pdf->Fechas = 'DEL: ' . $FechaIni . ' AL: ' . $FechaFin;
            $pdf->FP = $FormaPago;
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 20);

            /* ENCABEZADO DETALLE TITULOS */
            $anchos = array(45/* 0 */, 15/* 1 */, 35/* 2 */, 110/* 3 */, 40/* 4 */, 20/* 5 */);
            $aligns = array('C', 'C', 'C', 'C', 'C', 'C');
            $pdf->SetFont('Arial', 'B', 7);


            $Y = 25;

            /* TIENDAS */
            $Total = 0;
            foreach ($Tiendas as $key => $T) {
                $pdf->SetY($Y);
                $pdf->SetX(5);
                $pdf->SetFont('Arial', 'B', 8);
                $pdf->Cell(50, 4, utf8_decode($T->Tienda), 0/* BORDE */, 1, 'L');
                $pdf->SetX(5);
                $pdf->SetWidths($anchos);
                $pdf->SetAligns($aligns);
                $pdf->RowHeadFoot(array('Forma de Pago', 'Nota', 'Fecha', 'Cliente', 'Usuario', 'Importe'));
                /* DETALLE */
                $SubTotal = 0;
                foreach ($Ventas as $key => $value) {
                    if ($value->IdTienda == $T->IdTienda) {
                        $pdf->SetTextColor(0, 0, 0);
                        $pdf->SetFont('Arial', '', 6.5);
                        $pdf->SetWidths($anchos);
                        $pdf->SetAligns($aligns);
                        $pdf->Row(array(utf8_decode($value->MetodoPago), utf8_decode($value->Folio), utf8_decode($value->FechaMov), utf8_decode($value->Cliente), utf8_decode($value->Usuario), "$ " . number_format($value->Importe, 2)));

                        $SubTotal += $value->Importe;
                    }
                }

                /* SUBTOTALES */
                $pdf->SetX(5);
                $pdf->SetWidths($anchos);
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->Row(array('', '', '', '', 'SUB', '$' . number_format($SubTotal, 2)));
                $Total += $SubTotal;

                $Y = $pdf->GetY() + 2;
            }
            $pdf->SetY($pdf->GetY() + 3);
            $pdf->SetX(242);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(25, 4, 'TOTAL: $' . number_format($Total, 2), 0/* BORDE */, 1, 'L');

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Ventas';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE DE VENTAS GENERALES " . date("Y-m-d His");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Ventas/')) {

            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
