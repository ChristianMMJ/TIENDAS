<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Compras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('compras_model');
        $this->load->model('estilos_model');
        $this->load->model('tiendas_model');
        $this->load->model('proveedores_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
        $this->load->helper('reportes_helper');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vCompras');
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

    public function onImprimirEtiquetas() {
        try {
            $pdf = new PDF_Code128('L', 'mm', array(75/* ANCHO */, 50/* ALTURA */));
            $pdf->SetFont('Arial', '', 10);
            $pdf->SetAutoPageBreak(false, 2);

            $Detalle = $this->compras_model->getDetalleEtiquetas($this->input->post('ID'));
            if (!empty($Detalle)) {
                foreach ($Detalle as $i => $data) {
                    $cont = 1;
                    while ($cont <= $data->Cantidad) {
                        $pdf->AddPage();
                        //Code128(float x, float y, string code, float w, float h)
                        $pdf->Code128(10, 35, $data->EsCoTa, 55, 10);
                        $pdf->SetY(45);
                        $pdf->SetX(25);
                        $pdf->SetFont('Arial', '', 9);
                        $pdf->Write(5, $data->EsCoTa);

                        /* Estilo */
                        $pdf->SetFont('Arial', '', 9);
                        $pdf->SetXY(40, 15);
                        $pdf->Cell(4, 5, 'Estilo: ', 0, 0, 'L');

                        $pdf->SetFont('Arial', 'B', 17);
                        $pdf->SetXY(51, 15);
                        $pdf->Cell(4, 5, $data->Estilo, 0, 0, 'L');

                        /* Talla */
                        $pdf->SetFont('Arial', '', 9);
                        $pdf->SetXY(40, 22);
                        $pdf->Cell(4, 5, 'Talla: ', 0, 0, 'L');

                        $pdf->SetFont('Arial', 'B', 19);
                        $pdf->SetXY(51, 22);
                        $pdf->Cell(4, 5, $data->Talla, 0, 0, 'L');

                        /* Color */
                        $pdf->SetFont('Arial', 'BI', 8);
                        $pdf->SetXY(3, 29.5);
                        $pdf->Cell(4, 5, $data->Color, 0, 0, 'L');

                        /* Fecha */
                        $pdf->SetFont('Arial', '', 7);
                        $pdf->SetXY(59, 2);
                        $pdf->Cell(4, 3, $data->Fecha, 0, 0, 'L');

                        /* Tienda */
                        $pdf->SetFont('Arial', 'BI', 7);
                        $pdf->SetXY(2, 2);
                        $pdf->Cell(4, 3, $data->Tienda, 0, 0, 'L');

                        /* Logo Empresa */

                        $pdf->Image(base_url() . utf8_decode($data->LogoEmpresa), 4, 8, 30);

                        $cont++;
                    }
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

    public function getRecords() {
        try {
            extract($this->input->post());


            $data = $this->compras_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompraByID() {
        try {
            extract($this->input->post());
            $data = $this->compras_model->getCompraByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompraDetalleByID() {
        try {
            print json_encode($this->compras_model->getCompraDetalleByID($this->input->get('ID')));
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

    public function getTiendas() {
        try {
            extract($this->input->post());
            $data = $this->tiendas_model->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getPorcentajesByTienda() {
        try {
            extract($this->input->post());
            $data = $this->tiendas_model->getPorcentajesByTienda($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            extract($this->input->post());
            $data = $this->proveedores_model->getProveedores();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            //Verifica si se afecta o no
            if ($this->input->post('AfecInv') === "1") {
                $EstatusExistencias = 1;
                $Estatus = 'AFECTADO';
            } else {
                $EstatusExistencias = 0;
                $Estatus = 'ACTIVO';
            }

            $data = array(
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'DocMov' => ($this->input->post('DocMov') !== NULL) ? $this->input->post('DocMov') : NULL,
                'Proveedor' => ($this->input->post('Proveedor') !== NULL) ? $this->input->post('Proveedor') : NULL,
                'TipoDoc' => ($this->input->post('TipoDoc') !== NULL) ? $this->input->post('TipoDoc') : NULL,
                'Estatus' => $Estatus,
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->compras_model->onAgregar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Compra' => $ID,
                    'Estilo' => $v->Estilo,
                    'Color' => $v->Color,
                    'Precio' => $v->Precio,
                    'Talla' => $v->Talla,
                    'Cantidad' => $v->Cantidad,
                    'Subtotal' => $v->Subtotal,
                    'EsCoTa' => $v->EsCoTa
                );
                $this->compras_model->onAgregarDetalle($data);
            }
            /* INSERTA EXISTENCIAS */
            $Existencias = json_decode($this->input->post("Existencias"));
            foreach ($Existencias as $key => $v) {
                $data = array(
                    'Tienda' => $v->Tienda,
                    'Documento' => $ID,
                    'Estilo' => $v->Estilo,
                    'Color' => $v->Color,
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
                    'Ex22' => $v->Ex22,
                    'Precio' => $v->Precio,
                    'PrecioMenudeo' => $v->PrecioMenudeo,
                    'PrecioMayoreo' => $v->PrecioMayoreo,
                    'Estatus' => $EstatusExistencias
                );

                $existe = $this->existencias_model->onComprobarExistencias($v->Tienda, $v->Estilo, $v->Color);
                if (!empty($existe[0])) {

                    $dataM = array(
                        'Ex1' => $v->Ex1 + $existe[0]->Ex1,
                        'Ex2' => $v->Ex2 + $existe[0]->Ex2,
                        'Ex3' => $v->Ex3 + $existe[0]->Ex3,
                        'Ex4' => $v->Ex4 + $existe[0]->Ex4,
                        'Ex5' => $v->Ex5 + $existe[0]->Ex5,
                        'Ex6' => $v->Ex6 + $existe[0]->Ex6,
                        'Ex7' => $v->Ex7 + $existe[0]->Ex7,
                        'Ex8' => $v->Ex8 + $existe[0]->Ex8,
                        'Ex9' => $v->Ex9 + $existe[0]->Ex9,
                        'Ex10' => $v->Ex10 + $existe[0]->Ex10,
                        'Ex11' => $v->Ex11 + $existe[0]->Ex11,
                        'Ex12' => $v->Ex12 + $existe[0]->Ex12,
                        'Ex13' => $v->Ex13 + $existe[0]->Ex13,
                        'Ex14' => $v->Ex14 + $existe[0]->Ex14,
                        'Ex15' => $v->Ex15 + $existe[0]->Ex15,
                        'Ex16' => $v->Ex16 + $existe[0]->Ex16,
                        'Ex17' => $v->Ex17 + $existe[0]->Ex17,
                        'Ex18' => $v->Ex18 + $existe[0]->Ex18,
                        'Ex19' => $v->Ex19 + $existe[0]->Ex19,
                        'Ex20' => $v->Ex20 + $existe[0]->Ex20,
                        'Ex21' => $v->Ex21 + $existe[0]->Ex21,
                        'Ex22' => $v->Ex22 + $existe[0]->Ex22,
                        'Precio' => ($v->Precio > $existe[0]->Precio) ? $v->Precio : $existe[0]->Precio,
                        'PrecioMenudeo' => ($v->PrecioMenudeo > $existe[0]->PrecioMenudeo) ? $v->PrecioMenudeo : $existe[0]->PrecioMenudeo,
                        'PrecioMayoreo' => ($v->PrecioMayoreo > $existe[0]->PrecioMayoreo) ? $v->PrecioMayoreo : $existe[0]->PrecioMayoreo
                    );
                    $this->existencias_model->onModificar($existe[0]->ID, $dataM);
                } else {
                    $this->existencias_model->onAgregar($data);
                }
            }
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            //Verifica si se afecta o no
            if ($this->input->post('AfecInv') === "1") {

                //BUSCAR EXISTENCIAS QUE YA EXISTAN PERO AUN ESTEN EN ESTATUS 0 PARA MODIFICAR EXISTENCIAS
                $ExistenciasVerifica = $this->existencias_model->getExistenciaByDocumento($ID);
                $v = $ExistenciasVerifica[0];
                if (!empty($v)) {
                    $existeTemp = $this->existencias_model->onComprobarExistenciasTempXDoc($ID, $v->Tienda, $v->Estilo, $v->Color);
                    $existeFinal = $this->existencias_model->onComprobarExistencias($v->Tienda, $v->Estilo, $v->Color);
                    if (!empty($existeTemp[0]) && !empty($existeFinal[0])) {
                        $dataEM = array(
                            'Ex1' => $existeFinal[0]->Ex1 + $existeTemp[0]->Ex1,
                            'Ex2' => $existeFinal[0]->Ex2 + $existeTemp[0]->Ex2,
                            'Ex3' => $existeFinal[0]->Ex3 + $existeTemp[0]->Ex3,
                            'Ex4' => $existeFinal[0]->Ex4 + $existeTemp[0]->Ex4,
                            'Ex5' => $existeFinal[0]->Ex5 + $existeTemp[0]->Ex5,
                            'Ex6' => $existeFinal[0]->Ex6 + $existeTemp[0]->Ex6,
                            'Ex7' => $existeFinal[0]->Ex7 + $existeTemp[0]->Ex7,
                            'Ex8' => $existeFinal[0]->Ex8 + $existeTemp[0]->Ex8,
                            'Ex9' => $existeFinal[0]->Ex9 + $existeTemp[0]->Ex9,
                            'Ex10' => $existeFinal[0]->Ex10 + $existeTemp[0]->Ex10,
                            'Ex11' => $existeFinal[0]->Ex11 + $existeTemp[0]->Ex11,
                            'Ex12' => $existeFinal[0]->Ex12 + $existeTemp[0]->Ex12,
                            'Ex13' => $existeFinal[0]->Ex13 + $existeTemp[0]->Ex13,
                            'Ex14' => $existeFinal[0]->Ex14 + $existeTemp[0]->Ex14,
                            'Ex15' => $existeFinal[0]->Ex15 + $existeTemp[0]->Ex15,
                            'Ex16' => $existeFinal[0]->Ex16 + $existeTemp[0]->Ex16,
                            'Ex17' => $existeFinal[0]->Ex17 + $existeTemp[0]->Ex17,
                            'Ex18' => $existeFinal[0]->Ex18 + $existeTemp[0]->Ex18,
                            'Ex19' => $existeFinal[0]->Ex19 + $existeTemp[0]->Ex19,
                            'Ex20' => $existeFinal[0]->Ex20 + $existeTemp[0]->Ex20,
                            'Ex21' => $existeFinal[0]->Ex21 + $existeTemp[0]->Ex21,
                            'Ex22' => $existeFinal[0]->Ex22 + $existeTemp[0]->Ex22,
                            'Precio' => ($existeTemp[0]->Precio > $existeFinal[0]->Precio) ? $existeTemp[0]->Precio : $existeFinal[0]->Precio,
                            'PrecioMenudeo' => ($existeTemp[0]->PrecioMenudeo > $existeFinal[0]->PrecioMenudeo) ? $existeTemp[0]->PrecioMenudeo : $existeFinal[0]->PrecioMenudeo,
                            'PrecioMayoreo' => ($existeTemp[0]->PrecioMayoreo > $existeFinal[0]->PrecioMayoreo) ? $existeTemp[0]->PrecioMayoreo : $existeFinal[0]->PrecioMayoreo
                        );
                        $this->existencias_model->onModificar($existeFinal[0]->ID, $dataEM);
                        $this->existencias_model->onEliminarExistenciaTemp($existeTemp[0]->ID, $v->Tienda, $v->Estilo, $v->Color);

                        /* MODIFICA ESTATUS EXISTENCIAS */
                        $this->existencias_model->onModificarEstatusExistencias($ID, $EstatusExistencias);
                    }
                }


                $Estatus = 'AFECTADO';
                $this->existencias_model->onModificarEstatusExistencias($ID, 1);
            } else {
                $Estatus = 'ACTIVO';
            }

            $data = array(
                'Estatus' => $Estatus
            );
            $this->compras_model->onModificar($ID, $data);
            /* FIN DETALLE */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $Compra = $this->compras_model->getCompraByID($ID);
            if (!empty($Compra[0])) {
                if ($Compra[0]->Estatus === 'ACTIVO') {
                    $this->compras_model->onEliminar($ID);
                    $this->existencias_model->onEliminar($ID);
                    print 1;
                } else {
                    print 2;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
