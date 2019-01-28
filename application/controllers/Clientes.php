<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('Clientes_model','clm')->model('Generales_model','grm');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuCatalogos')->view('vClientes')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {  
            print json_encode($this->clm->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRegimenesFiscales() {
        try {  
            print json_encode($this->grm->getCatalogosDescripcionByFielID('REGIMENES FISCALES'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClienteByID() {
        try { 
            print json_encode($this->clm->getClienteByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $x = $this->input;
            $data = array(
                'Clave' => ($x->post('Clave') !== NULL) ? $x->post('Clave') : NULL,
                'RazonSocial' => ($x->post('RazonSocial') !== NULL) ? $x->post('RazonSocial') : NULL,
                'RFC' => ($x->post('RFC') !== NULL) ? $x->post('RFC') : NULL,
                'Direccion' => ($x->post('Direccion') !== NULL) ? $x->post('Direccion') : NULL,
                'NoExt' => ($x->post('NoExt') !== NULL) ? $x->post('NoExt') : NULL,
                'NoInt' => ($x->post('NoInt') !== NULL) ? $x->post('NoInt') : NULL,
                'Colonia' => ($x->post('Colonia') !== NULL) ? $x->post('Colonia') : NULL,
                'Ciudad' => ($x->post('Ciudad') !== NULL) ? $x->post('Ciudad') : NULL,
                'Estado' => ($x->post('Estado') !== NULL) ? $x->post('Estado') : NULL,
                'Pais' => ($x->post('Pais') !== NULL) ? $x->post('Pais') : NULL,
                'CP' => ($x->post('CP') !== NULL) ? $x->post('CP') : NULL,
                'RegimenFiscal' => ($x->post('RegimenFiscal') !== NULL) ? $x->post('RegimenFiscal') : NULL,
                'Telefono' => ($x->post('Telefono') !== NULL) ? $x->post('Telefono') : NULL,
                'Correo' => ($x->post('Correo') !== NULL) ? $x->post('Correo') : NULL,
                'LimiteCredito' => ($x->post('LimiteCredito') !== NULL && $x->post('LimiteCredito') !== "") ? $x->post('LimiteCredito') : 0,
                'PlazoPagos' => ($x->post('PlazoPagos') !== NULL && $x->post('PlazoPagos') !== "") ? $x->post('PlazoPagos') : 0,
                'Estatus' => ($x->post('Estatus') !== NULL) ? $x->post('Estatus') : NULL
            );
            $ID = $this->clm->onAgregar($data);

            /* SUBIR FOTO */
            $URL_DOC = 'uploads/Clientes/';
            $master_url = $URL_DOC . '/';
            if (isset($_FILES["Foto"]["name"])) {
                if (!file_exists($URL_DOC)) {
                    mkdir($URL_DOC, 0777, true);
                }
                if (!file_exists(utf8_decode($URL_DOC . '/' . $ID))) {
                    mkdir(utf8_decode($URL_DOC . '/' . $ID), 0777, true);
                }
                if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $URL_DOC . '/' . $ID . '/' . utf8_decode($_FILES["Foto"]["name"]))) {
                    $img = $master_url . $ID . '/' . $_FILES["Foto"]["name"];
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $img;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 250;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $DATA = array(
                        'Foto' => ($img),
                    );
                    $this->clm->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->clm->onModificar($ID, $DATA);
                }
            }
            print $ID;
            /* FIN SUBIR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'RazonSocial' => ($this->input->post('RazonSocial') !== NULL) ? $this->input->post('RazonSocial') : NULL,
                'RFC' => ($this->input->post('RFC') !== NULL) ? $this->input->post('RFC') : NULL,
                'Direccion' => ($this->input->post('Direccion') !== NULL) ? $this->input->post('Direccion') : NULL,
                'NoExt' => ($this->input->post('NoExt') !== NULL) ? $this->input->post('NoExt') : NULL,
                'NoInt' => ($this->input->post('NoInt') !== NULL) ? $this->input->post('NoInt') : NULL,
                'Colonia' => ($this->input->post('Colonia') !== NULL) ? $this->input->post('Colonia') : NULL,
                'Ciudad' => ($this->input->post('Ciudad') !== NULL) ? $this->input->post('Ciudad') : NULL,
                'Estado' => ($this->input->post('Estado') !== NULL) ? $this->input->post('Estado') : NULL,
                'Pais' => ($this->input->post('Pais') !== NULL) ? $this->input->post('Pais') : NULL,
                'CP' => ($this->input->post('CP') !== NULL) ? $this->input->post('CP') : NULL,
                'RegimenFiscal' => ($this->input->post('RegimenFiscal') !== NULL) ? $this->input->post('RegimenFiscal') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Correo' => ($this->input->post('Correo') !== NULL) ? $this->input->post('Correo') : NULL,
                'LimiteCredito' => ($this->input->post('LimiteCredito') !== NULL) ? $this->input->post('LimiteCredito') : 0,
                'PlazoPagos' => ($this->input->post('PlazoPagos') !== NULL) ? $this->input->post('PlazoPagos') : 0,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->clm->onModificar($ID, $DATA);
            /* MODIFICAR FOTO */

            $Foto = $this->input->post('Foto');
            if (empty($Foto)) {

                if ($_FILES["Foto"]["tmp_name"] !== "") {
                    $URL_DOC = 'uploads/Clientes';
                    $master_url = $URL_DOC . '/';
                    if (isset($_FILES["Foto"]["name"])) {
                        if (!file_exists($URL_DOC)) {
                            mkdir($URL_DOC, 0777, true);
                        }
                        if (!file_exists(utf8_decode($URL_DOC . '/' . $ID))) {
                            mkdir(utf8_decode($URL_DOC . '/' . $ID), 0777, true);
                        }
                        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $URL_DOC . '/' . $ID . '/' . utf8_decode($_FILES["Foto"]["name"]))) {
                            $img = $master_url . $ID . '/' . $_FILES["Foto"]["name"];
                            $DATA = array(
                                'Foto' => ($img),
                            );
                            $this->clm->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->clm->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->clm->onModificar($ID, $DATA);
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->clm->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
