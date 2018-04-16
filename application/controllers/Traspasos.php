<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traspasos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('traspasos_model');
        $this->load->model('estilos_model');
        $this->load->model('tiendas_model');
        $this->load->model('proveedores_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vTraspasos');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function getRecords() {
        try {
            extract($this->input->post());


            $data = $this->traspasos_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
     public function getTraspasoByID() {
        try {
            extract($this->input->post());
            $data = $this->traspasos_model->getTraspasoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTraspasoDetalleByID() {
        try {
            print json_encode($this->traspasos_model->getTraspasoDetalleByID($this->input->get('ID')));
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
    public function getCombinacionesXEstiloConExistencias() {
        try { 
            print json_encode($this->combinaciones_model->getCombinacionesXEstiloConExistencias($this->input->get('Estilo')));
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

    public function onAgregar() {
        try {
            $data = array(
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'dTienda' => ($this->input->post('dTienda') !== NULL) ? $this->input->post('dTienda') : NULL,
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'DocMov' => ($this->input->post('DocMov') !== NULL) ? $this->input->post('DocMov') : NULL,
                'Estatus' => 'ACTIVO',
                'Usuario' => $this->session->userdata('USERNAME')
            );
            $ID = $this->traspasos_model->onAgregar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Traspaso' => $ID,
                    'Estilo' => $v->Estilo,
                    'Color' => $v->Color,
                    'Talla' => $v->Talla,
                    'Cantidad' => $v->Cantidad,
                    'EsCoTa' => ''
                );
                $this->traspasos_model->onAgregarDetalle($data);
            }
            /* INSERTA EXISTENCIAS */
//            if ($this->input->post('AfecInv') === "1") {
//                $EstatusExistencias = 1;
//            } else {
//                $EstatusExistencias = 0;
//            }
//
//            $Existencias = json_decode($this->input->post("Existencias"));
//            foreach ($Existencias as $key => $v) {
//                $data = array(
//                    'Tienda' => $v->Tienda,
//                    'Documento' => $v->Documento,
//                    'Estilo' => $v->Estilo,
//                    'Color' => $v->Color,
//                    'Ex1' => $v->Ex1,
//                    'Ex2' => $v->Ex2,
//                    'Ex3' => $v->Ex3,
//                    'Ex4' => $v->Ex4,
//                    'Ex5' => $v->Ex5,
//                    'Ex6' => $v->Ex6,
//                    'Ex7' => $v->Ex7,
//                    'Ex8' => $v->Ex8,
//                    'Ex9' => $v->Ex9,
//                    'Ex10' => $v->Ex10,
//                    'Ex11' => $v->Ex11,
//                    'Ex12' => $v->Ex12,
//                    'Ex13' => $v->Ex13,
//                    'Ex14' => $v->Ex14,
//                    'Ex15' => $v->Ex15,
//                    'Ex16' => $v->Ex16,
//                    'Ex17' => $v->Ex17,
//                    'Ex18' => $v->Ex18,
//                    'Ex19' => $v->Ex19,
//                    'Ex20' => $v->Ex20,
//                    'Ex21' => $v->Ex21,
//                    'Ex22' => $v->Ex22,
//                    'Precio' => $v->Precio,
//                    'PrecioMenudeo' => $v->PrecioMenudeo,
//                    'PrecioMayoreo' => $v->PrecioMayoreo,
//                    'Estatus' => $EstatusExistencias
//                );
//
//                $existe = $this->existencias_model->onComprobarExistencias($v->Tienda, $v->Estilo, $v->Color);
//                if (!empty($existe[0])) {
//
//                    $dataM = array(
//                        'Ex1' => $v->Ex1 + $existe[0]->Ex1,
//                        'Ex2' => $v->Ex2 + $existe[0]->Ex2,
//                        'Ex3' => $v->Ex3 + $existe[0]->Ex3,
//                        'Ex4' => $v->Ex4 + $existe[0]->Ex4,
//                        'Ex5' => $v->Ex5 + $existe[0]->Ex5,
//                        'Ex6' => $v->Ex6 + $existe[0]->Ex6,
//                        'Ex7' => $v->Ex7 + $existe[0]->Ex7,
//                        'Ex8' => $v->Ex8 + $existe[0]->Ex8,
//                        'Ex9' => $v->Ex9 + $existe[0]->Ex9,
//                        'Ex10' => $v->Ex10 + $existe[0]->Ex10,
//                        'Ex11' => $v->Ex11 + $existe[0]->Ex11,
//                        'Ex12' => $v->Ex12 + $existe[0]->Ex12,
//                        'Ex13' => $v->Ex13 + $existe[0]->Ex13,
//                        'Ex14' => $v->Ex14 + $existe[0]->Ex14,
//                        'Ex15' => $v->Ex15 + $existe[0]->Ex15,
//                        'Ex16' => $v->Ex16 + $existe[0]->Ex16,
//                        'Ex17' => $v->Ex17 + $existe[0]->Ex17,
//                        'Ex18' => $v->Ex18 + $existe[0]->Ex18,
//                        'Ex19' => $v->Ex19 + $existe[0]->Ex19,
//                        'Ex20' => $v->Ex20 + $existe[0]->Ex20,
//                        'Ex21' => $v->Ex21 + $existe[0]->Ex21,
//                        'Ex22' => $v->Ex22 + $existe[0]->Ex22,
//                        'Precio' => $v->Precio,
//                        'PrecioMenudeo' => $v->PrecioMenudeo,
//                        'PrecioMayoreo' => $v->PrecioMayoreo,
//                    );
//                    $this->existencias_model->onModificar($existe[0]->ID, $dataM);
//                } else {
//                    $this->existencias_model->onAgregar($data);
//                }
//            }
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $data = array(
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'DocMov' => ($this->input->post('DocMov') !== NULL) ? $this->input->post('DocMov') : NULL,
                'Proveedor' => ($this->input->post('Proveedor') !== NULL) ? $this->input->post('Proveedor') : NULL,
                'TipoDoc' => ($this->input->post('TipoDoc') !== NULL) ? $this->input->post('TipoDoc') : NULL,
                'Estatus' => 'ACTIVO'
            );
            $this->compras_model->onModificar($ID, $data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $key => $v) {
                $data = array(
                    'Cantidad' => $v->Cantidad,
                    'Subtotal' => $v->Subtotal
                );
                $this->compras_model->onModificarDetalle($v->ID/* ID DETALLE */, $ID/* ID COMPRA */, $data);
            }
            /* FIN DETALLE */
            /* DETALLE ELIMINADO */
            $DetalleEliminado = json_decode($this->input->post("DetalleEliminado"));
            foreach ($DetalleEliminado as $key => $v) {
                $this->compras_model->onEliminarDetalle($v->ID);
            }
            /* FIN DETALLE ELIMINADO */



            /* MODIFICA EXISTENCIAS */
            if ($this->input->post('AfecInv') === "1") {
                $EstatusExistencias = 1;
            } else {
                $EstatusExistencias = 0;
            }
            $this->existencias_model->onModificarEstatusExistencias($ID, $EstatusExistencias);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->compras_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasByIDs() {
        try { 
            print json_encode($this->estilos_model->getExistenciasByIDs($this->input->get('Tienda'),$this->input->get('Estilo'),$this->input->get('Color')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
