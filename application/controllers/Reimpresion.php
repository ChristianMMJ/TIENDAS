<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Reimpresion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('estilos_model')->model('tiendas_model')->model('combinaciones_model');
        $this->load->model('compras_model')->helper('reportes_helper');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuInventarios')->view('vReimpresion')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onImprimirEtiquetas() {
        try {
            $pdf = new PDF_Code128('L', 'mm', array(75/* ANCHO */, 50/* ALTURA */));
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetAutoPageBreak(false, 2);


            $Detalle = json_decode($this->input->post("Etiquetas"));


            foreach ($Detalle as $key => $v) {
                $cont = 1;

                while ($cont <= $v->Cantidad) {
                    $pdf->AddPage();
                    //Code128(float x, float y, string code, float w, float h)
                    $pdf->Code128(10, 35, $v->EsCoTa, 55, 10);
                    $pdf->SetY(45);
                    $pdf->SetX(25);
                    $pdf->SetFont('Arial', '', 9);
                    $pdf->Write(5, $v->EsCoTa);

                    /* Estilo */
                    $pdf->SetFont('Arial', '', 9);
                    $pdf->SetXY(40, 15);
                    $pdf->Cell(4, 5, 'Estilo: ', 0, 0, 'L');

                    $pdf->SetFont('Arial', 'B', 17);
                    $pdf->SetXY(51, 15);
                    $pdf->Cell(4, 5, $v->Estilo, 0, 0, 'L');

                    /* Talla */
                    $pdf->SetFont('Arial', '', 9);
                    $pdf->SetXY(40, 22);
                    $pdf->Cell(4, 5, 'Talla: ', 0, 0, 'L');

                    $pdf->SetFont('Arial', 'B', 19);
                    $pdf->SetXY(51, 22);
                    $pdf->Cell(4, 5, $v->Talla, 0, 0, 'L');

                    /* Color */
                    $pdf->SetFont('Arial', 'BI', 8);
                    $pdf->SetXY(3, 29.5);
                    $pdf->Cell(4, 5, $v->Color, 0, 0, 'L');

                    /* Fecha */
                    $date = date('m/d/Y h:i:s a', time());

                    $pdf->SetFont('Arial', '', 7);
                    $pdf->SetXY(59, 2);
                    $pdf->Cell(4, 3, date("d/m/Y", strtotime($date)), 0, 0, 'L');

                    /* Tienda */
                    $pdf->SetFont('Arial', 'BI', 7);
                    $pdf->SetXY(2, 2);
                    $pdf->Cell(4, 3, utf8_decode($this->session->userdata('TIENDA_NOMBRE')), 0, 0, 'L');

                    /* Logo Empresa */
                    $pdf->Image(base_url() . utf8_decode($this->session->userdata('EMPRESA_LOGO')), 4, 8, 30);

                    $cont++;
                }
            }

            $path = 'uploads/Reportes/CodigosBarras';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE ETIQUETAS " . date("Y-m-d His");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/CodigosBarras/')) {

            }
            $pdf->Output($url);
            print base_url() . $url;
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

}
