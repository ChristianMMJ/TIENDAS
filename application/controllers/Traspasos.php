<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traspasos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
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
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vTraspasos');
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

    public function getRecords() {
        try {
            print json_encode($this->traspasos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTraspasoByID() {
        try {
            print json_encode($this->traspasos_model->getTraspasoByID($this->input->get('ID')));
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

    public function getTiendasConExistencias() {
        try {
            print json_encode($this->traspasos_model->getTiendasConExistencias());
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
                'Usuario' => $this->session->userdata('ID'),
                'Registro' => Date('d/m/Y h:i:s a'),
                'AfectaInventario' => ($this->input->post('AfecInv') > 0) ? 1 : 0
            );
            $ID = $this->traspasos_model->onAgregar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $k => $v) {

                /* SI AFECTA INVENTARIO */
                if ($this->input->post('AfecInv') > 0) {
                    /* COMPROBAR SI TIENE DE ESE ESTILO/COLOR/TALLA EN LA TIENDA DESTINO */
                    $existe = $this->traspasos_model->onComprobarExistenciaFisica($this->input->post('Tienda'), $v->Estilo, $v->Color);
                    /* INICIO EXISTE */
                    if ($existe[0]->EXISTE > 0) {
                        /* MODIFICAR EXISTENCIA */

                        /* OBTENER SERIE X ESTILO */
                        $serie = $this->traspasos_model->getSerieXEstilo($v->Estilo);

                        /* ACTUALIZA LAS EXISTENCIAS DE LA TIENDA DESTINO */
                        $existencia = 0;
                        for ($index = 1; $index <= 22; $index++) {

                            /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                            $existencias = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('Tienda'), $v->Estilo, $v->Color);
                            /* COMPROBAR EXISTENCIAS EN LA TIENDA ORIGEN TENGA DISPONIBLES DE LA TALLA SOLICITADA */
                            $existencias_disponibles = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('dTienda'), $v->Estilo, $v->Color);

                            if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_disponibles[0]->{"Ex$index"} > 0) {
                                /* SUMAR LA CANTIDAD EN LA TALLA DE LA TIENDA DESTINO */
                                $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                                /* AGREGAR EXISTENCIAS DE LA TIENDA DESTINO */
                                $this->traspasos_model->onModificarExistencias($this->input->post('Tienda'), $v->Estilo, $v->Color, $existencia, $index);

                                /* RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                                $existencia = ($existencias_disponibles[0]->{"Ex$index"} - $v->Cantidad);
                                /* REMOVER EXISTENCIAS DE LA TIENDA ACTUAL/ORIGEN */
                                $this->traspasos_model->onModificarExistencias($this->input->post('dTienda'), $v->Estilo, $v->Color, $existencia, $index);
                                /* FIN RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */

                                /* MODIFICAR PRECIOS */
                                /* CONSULTAR PRECIOS EN LA TIENDA ACTUAL/ORIGEN POR ESTILO Y COLOR/COMBINACION */
                                $precios = $this->traspasos_model->getPreciosXTiendaXEstiloXColor($this->input->post('Tienda'), $v->Estilo, $v->Color);
                                $data = array(
                                    "Precio" => ($existencias[0]->Precio > $precios[0]->Precio) ? $existencias[0]->Precio : $precios[0]->Precio,
                                    "PrecioMenudeo" => ($existencias[0]->PrecioMenudeo > $precios[0]->PrecioMenudeo) ? $existencias[0]->PrecioMenudeo : $precios[0]->PrecioMenudeo,
                                    "PrecioMayoreo" => ($existencias[0]->PrecioMayoreo > $precios[0]->PrecioMayoreo) ? $existencias[0]->PrecioMayoreo : $precios[0]->PrecioMayoreo,
                                );
                                $update = $this->db;
                                $update->where('Tienda', $this->input->post('Tienda'));
                                $update->where('Estilo', $v->Estilo);
                                $update->where('Color', $v->Color);
                                $update->update("sz_Existencias", $data);
                                /* AGREGAR UN REGISTRO EN EL DETALLE DEL TRASPASO */
                                $data = array(
                                    'Traspaso' => $ID,
                                    'Estilo' => $v->Estilo,
                                    'Color' => $v->Color,
                                    'Talla' => $v->Talla,
                                    'Cantidad' => $v->Cantidad,
                                    'EsCoTa' => '',
                                    'Registro' => Date('d/m/Y h:i:s a')
                                );
                                $this->traspasos_model->onAgregarDetalle($data);
                                break;
                            }
                        }
                    } else {/* FIN EXISTE */

                        /* OBTENER SERIE X ESTILO */
                        $serie = $this->traspasos_model->getSerieXEstilo($v->Estilo);

                        /* AGREGAR REGISTRO DE EXISTENCIA */
                        /* AGREGAR LAS NUEVAS EXISTENCIAS A LA TIENDA DESTINO */
                        $data = array(
                            "Tienda" => $this->input->post('Tienda'),
                            "Documento" => $this->input->post('DocMov'),
                            "Estilo" => $v->Estilo,
                            "Color" => $v->Color,
                            "Estilo" => $v->Estilo,
                        );

                        for ($index = 1; $index <= 22; $index++) {

                            /* CONSULTAR EXISTENCIAS DE LA TIENDA ORGIGEN */
                            $existencias_origen = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('dTienda'), $v->Estilo, $v->Color);

                            /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                            $existencias = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('Tienda'), $v->Estilo, $v->Color);

                            if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_origen[0]->{"Ex$index"} > 0) {
                                $data["Ex$index"] = $v->Cantidad;
                                /* RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                                $existencia = ($existencias_origen[0]->{"Ex$index"} - $v->Cantidad);
                                /* REMOVER EXISTENCIAS DE LA TIENDA ACTUAL/ORIGEN */
                                $this->traspasos_model->onModificarExistencias($this->input->post('dTienda'), $v->Estilo, $v->Color, $existencia, $index);
                                /* FIN RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                            } else {
                                $data["Ex$index"] = 0;
                            }
                        }
                        $data["Precio"] = 0;
                        $data["PrecioMenudeo"] = 0;
                        $data["PrecioMayoreo"] = 0;
                        $data["DTienda"] = $this->input->post('dTienda');
                        $data["Estatus"] = 1;
                        $this->traspasos_model->onAgregarExistencias($data);

                        /* CONSULTAR PRECIOS EN LA TIENDA ACTUAL/ORIGEN POR ESTILO Y COLOR/COMBINACION */
                        $precios = $this->traspasos_model->getPreciosXTiendaXEstiloXColor($this->input->post('dTienda'), $v->Estilo, $v->Color);
                        $data = array(
                            "Precio" => $precios[0]->Precio,
                            "PrecioMenudeo" => $precios[0]->PrecioMenudeo,
                            "PrecioMayoreo" => $precios[0]->PrecioMayoreo,
                        );

                        $this->db->where('Tienda', $this->input->post('Tienda'));
                        $this->db->where('Estilo', $v->Estilo);
                        $this->db->where('Color', $v->Color);
                        $this->db->update("sz_Existencias", $data);
                        /* AGREGAR UN REGISTRO EN EL DETALLE DEL TRASPASO */
                        $data = array(
                            'Traspaso' => $ID,
                            'Estilo' => $v->Estilo,
                            'Color' => $v->Color,
                            'Talla' => $v->Talla,
                            'Cantidad' => $v->Cantidad,
                            'EsCoTa' => '',
                            'Registro' => Date('d/m/Y h:i:s a')
                        );
                        $this->traspasos_model->onAgregarDetalle($data);
                    }
                } else {
                    /* AGREGAR UN REGISTRO EN EL DETALLE DEL TRASPASO */
                    $data = array(
                        'Traspaso' => $ID,
                        'Estilo' => $v->Estilo,
                        'Color' => $v->Color,
                        'Talla' => $v->Talla,
                        'Cantidad' => $v->Cantidad,
                        'EsCoTa' => '',
                        'Registro' => Date('d/m/Y h:i:s a')
                    );
                    $this->traspasos_model->onAgregarDetalle($data);
                }
                /* FIN AFECTA INVENTARIO */
            }
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'DocMov' => ($this->input->post('DocMov') !== NULL) ? $this->input->post('DocMov') : NULL,
                'AfectaInventario' => ($this->input->post('AfecInv') > 0) ? 1 : 0
            );
            $ID = $this->traspasos_model->onModificar($data);
            /* DETALLE */
            $Detalle = json_decode($this->input->post("Detalle"));
            foreach ($Detalle as $k => $v) {
                /* SI AFECTA INVENTARIO */
                if ($this->input->post('AfecInv') > 0) {
                     /* COMPROBAR SI TIENE DE ESE ESTILO/COLOR/TALLA EN LA TIENDA DESTINO */
                    $existe = $this->traspasos_model->onComprobarExistenciaFisica($this->input->post('Tienda'), $v->Estilo, $v->Color);
                    /* INICIO EXISTE */
                    if ($existe[0]->EXISTE > 0) {
                        /* MODIFICAR EXISTENCIA */

                        /* OBTENER SERIE X ESTILO */
                        $serie = $this->traspasos_model->getSerieXEstilo($v->Estilo);

                        /* ACTUALIZA LAS EXISTENCIAS DE LA TIENDA DESTINO */
                        $existencia = 0;
                        for ($index = 1; $index <= 22; $index++) {

                            /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                            $existencias = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('Tienda'), $v->Estilo, $v->Color);
                            /* COMPROBAR EXISTENCIAS EN LA TIENDA ORIGEN TENGA DISPONIBLES DE LA TALLA SOLICITADA */
                            $existencias_disponibles = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('dTienda'), $v->Estilo, $v->Color);

                            if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_disponibles[0]->{"Ex$index"} > 0) {
                                /* SUMAR LA CANTIDAD EN LA TALLA DE LA TIENDA DESTINO */
                                $existencia = ($existencias[0]->{"Ex$index"} + $v->Cantidad);
                                /* AGREGAR EXISTENCIAS DE LA TIENDA DESTINO */
                                $this->traspasos_model->onModificarExistencias($this->input->post('Tienda'), $v->Estilo, $v->Color, $existencia, $index);

                                /* RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                                $existencia = ($existencias_disponibles[0]->{"Ex$index"} - $v->Cantidad);
                                /* REMOVER EXISTENCIAS DE LA TIENDA ACTUAL/ORIGEN */
                                $this->traspasos_model->onModificarExistencias($this->input->post('dTienda'), $v->Estilo, $v->Color, $existencia, $index);
                                /* FIN RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */

                                /* MODIFICAR PRECIOS */
                                /* CONSULTAR PRECIOS EN LA TIENDA ACTUAL/ORIGEN POR ESTILO Y COLOR/COMBINACION */
                                $precios = $this->traspasos_model->getPreciosXTiendaXEstiloXColor($this->input->post('Tienda'), $v->Estilo, $v->Color);
                                $data = array(
                                    "Precio" => ($existencias[0]->Precio > $precios[0]->Precio) ? $existencias[0]->Precio : $precios[0]->Precio,
                                    "PrecioMenudeo" => ($existencias[0]->PrecioMenudeo > $precios[0]->PrecioMenudeo) ? $existencias[0]->PrecioMenudeo : $precios[0]->PrecioMenudeo,
                                    "PrecioMayoreo" => ($existencias[0]->PrecioMayoreo > $precios[0]->PrecioMayoreo) ? $existencias[0]->PrecioMayoreo : $precios[0]->PrecioMayoreo,
                                );
                                $update = $this->db;
                                $update->where('Tienda', $this->input->post('Tienda'));
                                $update->where('Estilo', $v->Estilo);
                                $update->where('Color', $v->Color);
                                $update->update("sz_Existencias", $data);
                                break;
                            }
                        }
                    }else {/* FIN EXISTE */

                        /* OBTENER SERIE X ESTILO */
                        $serie = $this->traspasos_model->getSerieXEstilo($v->Estilo);

                        /* AGREGAR REGISTRO DE EXISTENCIA */
                        /* AGREGAR LAS NUEVAS EXISTENCIAS A LA TIENDA DESTINO */
                        $data = array(
                            "Tienda" => $this->input->post('Tienda'),
                            "Documento" => $this->input->post('DocMov'),
                            "Estilo" => $v->Estilo,
                            "Color" => $v->Color,
                            "Estilo" => $v->Estilo,
                        );

                        for ($index = 1; $index <= 22; $index++) {

                            /* CONSULTAR EXISTENCIAS DE LA TIENDA ORGIGEN */
                            $existencias_origen = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('dTienda'), $v->Estilo, $v->Color);

                            /* CONSULTAR EXISTENCIAS DE LA TIENDA DESTINO */
                            $existencias = $this->traspasos_model->getExistenciasXTiendaXEstiloXColor($this->input->post('Tienda'), $v->Estilo, $v->Color);

                            if ($serie[0]->{"T$index"} > 0 && $serie[0]->{"T$index"} == $v->Talla && $existencias_origen[0]->{"Ex$index"} > 0) {
                                $data["Ex$index"] = $v->Cantidad;
                                /* RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                                $existencia = ($existencias_origen[0]->{"Ex$index"} - $v->Cantidad);
                                /* REMOVER EXISTENCIAS DE LA TIENDA ACTUAL/ORIGEN */
                                $this->traspasos_model->onModificarExistencias($this->input->post('dTienda'), $v->Estilo, $v->Color, $existencia, $index);
                                /* FIN RESTAR LA CANTIDAD EN LA TALLA DE LA TIENDA ORIGEN */
                            } else {
                                $data["Ex$index"] = 0;
                            }
                        }
                        $data["Precio"] = 0;
                        $data["PrecioMenudeo"] = 0;
                        $data["PrecioMayoreo"] = 0;
                        $data["DTienda"] = $this->input->post('dTienda');
                        $data["Estatus"] = 1;
                        $this->traspasos_model->onAgregarExistencias($data);

                        /* CONSULTAR PRECIOS EN LA TIENDA ACTUAL/ORIGEN POR ESTILO Y COLOR/COMBINACION */
                        $precios = $this->traspasos_model->getPreciosXTiendaXEstiloXColor($this->input->post('dTienda'), $v->Estilo, $v->Color);
                        $data = array(
                            "Precio" => $precios[0]->Precio,
                            "PrecioMenudeo" => $precios[0]->PrecioMenudeo,
                            "PrecioMayoreo" => $precios[0]->PrecioMayoreo,
                        );

                        $this->db->where('Tienda', $this->input->post('Tienda'));
                        $this->db->where('Estilo', $v->Estilo);
                        $this->db->where('Color', $v->Color);
                        $this->db->update("sz_Existencias", $data);
                    }
                }
            }
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
            print json_encode($this->traspasos_model->getExistenciasByIDs($this->input->get('Tienda'), $this->input->get('Estilo'), $this->input->get('Color')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}