<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class CapturaInventarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')
                ->model('ExistenciasCaptura_Model')
                ->model('Estilos_model')
                ->model('Tiendas_model')
                ->model('Combinaciones_model')
                ->model('Existencias_model')
                ->helper('reportes_helper')
                ->helper('file');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuInventarios')->view('vCapturaInventarios')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onAgregarExistenciasCaptura() {
        try {
            $data = array(
                'Mes' => ($this->input->post('Mes') !== NULL) ? $this->input->post('Mes') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Usuario' => $this->session->userdata('ID'),
                'Estatus' => 'ACTIVO',
                'Tienda' => $this->session->userdata('TIENDA'),
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Color' => ($this->input->post('Color') !== NULL) ? $this->input->post('Color') : NULL,
                $this->input->post('Posicion') => ($this->input->post('Existencia') !== NULL) ? $this->input->post('Existencia') : 0
            );
            $this->ExistenciasCaptura_Model->onAgregarExistenciasCaptura($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciasCaptura() {
        try {

            $this->ExistenciasCaptura_Model->onModifcarExistenciasCaptura($this->input->post('Mes'), $this->input->post('Ano'), $this->input->post('Estilo'), $this->input->post('Color'), $this->input->post('Posicion'), $this->input->post('ExistenciaNueva'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarEstatus() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Estatus' => 'FINALIZADO'
            );
            $this->ExistenciasCaptura_Model->onModificarEstatus($Mes, $Ano, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getRecords(($this->input->post('Tienda') !== NULL && $this->input->post('Tienda') !== '' ) ? $this->input->post('Tienda') : $this->session->userdata('TIENDA'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            $data = $this->Tiendas_model->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getExistenciasXEstiloXCombinacion($Estilo, $Combinacion, $Mes, $Ano);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstatusInicial() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getEstatusInicial($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasCapturaByMesByAno() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getExistenciasCapturaByMesByAno($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasCapturaFinalizadaByMesByAno() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getExistenciasCapturaFinalizadaByMesByAno($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTotalDama() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getTotalDama($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTotalCaballero() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getTotalCaballero($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTotalInfantil() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getTotalInfantil($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTotalUnisex() {
        try {
            extract($this->input->post());
            $data = $this->ExistenciasCaptura_Model->getTotalUnisex($Ano, $Mes);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            extract($this->input->post());
            $data = $this->Estilos_model->getEstilos();
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

    public function getEncabezadoSerieXEstilo() {
        try {
            extract($this->input->post());
            $data = $this->Estilos_model->getEncabezadoSerieXEstilo($Estilo);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->ExistenciasCaptura_Model->onEliminar($Mes, $Ano);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRegistro() {
        try {
            extract($this->input->post());
            $this->ExistenciasCaptura_Model->onEliminarRegistro($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onActualizarInvFisAct() {
        /* ACTUALIZA INV EXISTENCIAS */
        extract($this->input->post());
        $ExistenciasCaptura = $this->ExistenciasCaptura_Model->onActualizarInvFisAct($Mes, $Ano);

        foreach ($ExistenciasCaptura as $key => $v) {
            $data = array(
                'Ex1' => $v->Ex1,
                'Ex2' => $v->Ex2,
                'Ex3' => $v->Ex3,
                'Ex4' => $v->Ex4,
                'Ex5' => $v->Ex5,
                'Ex6' => $v->Ex6,
                'Ex7' => $v->Ex7,
                'Ex8' => $v->Ex8,
                'Ex9' => $v->Ex9,
                'Ex10' => $v->Ex10,
                'Ex11' => $v->Ex11,
                'Ex12' => $v->Ex12,
                'Ex13' => $v->Ex13,
                'Ex14' => $v->Ex14,
                'Ex15' => $v->Ex15,
                'Ex16' => $v->Ex16,
                'Ex17' => $v->Ex17,
                'Ex18' => $v->Ex18,
                'Ex19' => $v->Ex19,
                'Ex20' => $v->Ex20,
                'Ex21' => $v->Ex21,
                'Ex22' => $v->Ex22
            );
            $this->Existencias_model->onActualizarExistenciasActualesVsFisico($v->Tienda, $v->Estilo, $v->Color, $data);
        }
    }

    public function onImprimirInv() {
        extract($this->input->post());

        $Series = $this->ExistenciasCaptura_Model->getSerieReporteExistencias($Mes, $Ano);
        if (!empty($Series)) {
            $Encabezado = $Series[0];
            $pdf = new PDFIF('L', 'mm', array(215.9, 279.4));
            $pdf->AliasNbPages();
            $pdf->SetAutoPageBreak(false, 10);
            $pdf->LogoEmpresa = utf8_decode($this->session->userdata('EMPRESA_LOGO'));
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetY(10);
            $pdf->SetX(110);
            $pdf->Cell(110, 4, utf8_decode($this->session->userdata('TIENDA_NOMBRE')), 0/* BORDE */, 1, 'L');
            $Y = 25;
            foreach ($Series as $i => $v) {
                $Datos = $this->ExistenciasCaptura_Model->getReporteCapturaInvByMesByAno($Mes, $Ano, $v->Serie);
                $pdf->SetY($Y);
                $pdf->SetX(70);
                $pdf->SetFont('Arial', 'B', 7);
                $pdf->SetFillColor(225, 225, 234);

                $Cont = 1;
                while ($Cont <= 22) {
                    if ($Cont === 22) {
                        $pdf->Cell(8, 3, ($v->{"T$Cont"} > 0) ? $v->{"T$Cont"} : '', 1, 0, 'C', true);
                    } else {
                        $pdf->Cell(8, 3, ($v->{"T$Cont"} > 0) ? $v->{"T$Cont"} : '', 1, 0, 'C', true);
                    }
                    $Cont++;
                }
                $pdf->SetFont('Arial', 'B', 6.5);
                $pdf->Cell(15, 3, utf8_decode('Total'), 0, 1, 'L');

                //Estilos por serie
                foreach ($Datos as $i => $ev) {
                    $pdf->SetX(5);
                    $pdf->SetFont('Arial', 'B', 6.5);
                    $pdf->Cell(11, 4, $ev->Estilo, 0, 0, 'L');

                    //Existencias físicas
                    $contT = 1;
                    $Total = 0;
                    $pdf->SetX(70);
                    while ($contT <= 22) {
                        $pdf->SetFont('Arial', '', 6);
                        $pdf->SetTextColor(0, 0, 0);
                        $pdf->Cell(8, 3, ($ev->{"Ex$contT"} > 0) ? $ev->{"Ex$contT"} : '', 1, 0, 'C');
                        $Total += $ev->{"Ex$contT"};
                        $contT++;
                    }
                    $pdf->SetFont('Arial', 'BI', 6.5);
                    $pdf->Cell(15, 3, utf8_decode($Total . ' Pares'), 0, 1, 'L');
                }
                $Y = $pdf->GetY() + 3;
            }
            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Inventarios';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE DE INVENTARIO" . date("Y-m-d His");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Inventarios/')) {

            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

    public function onImprimirDiferencias() {

        $Series = $this->ExistenciasCaptura_Model->getSerieReporteExistencias($this->input->post('Mes'), $this->input->post('Ano'));
        if (!empty($Series)) {
            $pdf = new PDFDI('L', 'mm', array(215.9, 279.4));
            $pdf->AliasNbPages();
            $pdf->SetAutoPageBreak(false, 10);
            $pdf->LogoEmpresa = utf8_decode($this->session->userdata('EMPRESA_LOGO'));


            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetY(10);
            $pdf->SetX(110);
            $pdf->Cell(110, 4, utf8_decode($this->session->userdata('TIENDA_NOMBRE')), 0/* BORDE */, 1, 'L');

            $Y = 25;

            foreach ($Series as $i => $v) {
                $Datos = $this->ExistenciasCaptura_Model->getReporteDiferenciasInvByMesByAno($this->input->post('Mes'), $this->input->post('Ano'), $v->Serie);
                $pdf->SetY($Y);
                $pdf->SetX(70);
                $pdf->SetFont('Arial', 'B', 6.5);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFillColor(225, 225, 234);
                $contTa = 1;
                while ($contTa <= 22) {
                    if ($contTa === 22) {
                        $pdf->Cell(8, 3, ($v->{"T$contTa"} > 0) ? $v->{"T$contTa"} : '', 1, 0, 'C', true);
                    } else {
                        $pdf->Cell(8, 3, ($v->{"T$contTa"} > 0) ? $v->{"T$contTa"} : '', 1, 0, 'C', true);
                    }
                    $contTa++;
                }
                $pdf->SetFont('Arial', 'B', 6.5);
                $pdf->Cell(15, 3, utf8_decode('Total'), 0, 1, 'L');

                //Estilos por serie
                foreach ($Datos as $i => $ev) {
                    $pdf->SetX(5);
                    $pdf->SetFont('Arial', 'B', 7);
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->Cell(11, 3, $ev->Estilo, 0, 0, 'L');

                    //Existencias físicas
                    $contT = 1;
                    $pdf->SetX(70);
                    $TotalT = 0;
                    while ($contT <= 22) {
                        $pdf->SetFont('Arial', '', 6);
                        $pdf->SetTextColor(0, 0, 0);
                        $pdf->Cell(8, 3, ($ev->{"Ex$contT"} > 0) ? $ev->{"Ex$contT"} : '', 1, 0, 'C');
                        $TotalT += $ev->{"Ex$contT"};
                        $contT++;
                    }
                    $pdf->SetFont('Arial', 'I', 6);
                    $pdf->Cell(15, 3, utf8_decode($TotalT . ' En Físico'), 0, 1, 'L');

                    //Existencias en sistemas
                    $contE = 1;
                    $pdf->SetX(70);
                    $TotalE = 0;
                    while ($contE <= 22) {
                        $pdf->SetFont('Arial', '', 6);
                        $pdf->SetTextColor(0, 0, 0);
                        $pdf->Cell(8, 3, ($ev->{"Exi$contE"} > 0) ? $ev->{"Exi$contE"} : '', 1, 0, 'C');
                        $TotalE += $ev->{"Ex$contE"};
                        $contE++;
                    }
                    $pdf->SetFont('Arial', 'I', 6);
                    $pdf->Cell(15, 3, utf8_decode($TotalE . ' En Sistema'), 0, 1, 'L');

                    //Diferencias
                    $pdf->SetX(70);
                    $cont = 1;
                    $TotalD = 0;
                    while ($cont <= 22) {
                        if (($ev->{"Exi$cont"} - $ev->{"Ex$cont"}) > 0) {
                            $pdf->SetFont('Arial', 'B', 6);
                            $pdf->SetTextColor(255, 0, 0);
                            $pdf->Cell(8, 3, $ev->{"Exi$cont"} - $ev->{"Ex$cont"}, 1, 0, 'C');
                        } else {
                            $pdf->Cell(8, 3, '', 1, 0, 'C');
                        }
                        $TotalD += $ev->{"Exi$cont"} - $ev->{"Ex$cont"};
                        $cont++;
                    }
                    $pdf->SetFont('Arial', 'BI', 6);
                    $pdf->SetTextColor(255, 0, 0);
                    $pdf->Cell(15, 3, utf8_decode($TotalD . ' Diferencia(s)'), 0, 1, 'L');

                    $Y = $pdf->GetY() + 3;
                    $pdf->SetY($Y);
                }
                $Y = $pdf->GetY() + 4;
            }

            $pdf->SetTextColor(0, 0, 0);

            /* FIN RESUMEN */
            $path = 'uploads/Reportes/Inventarios';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = "REPORTE DIFERENCIAS" . date("Y-m-d His");
            $url = $path . '/' . $file_name . '.pdf';
            /* Borramos el archivo anterior */
            if (delete_files('uploads/Reportes/Inventarios/')) {

            }
            $pdf->Output($url);
            print base_url() . $url;
        }
    }

}
