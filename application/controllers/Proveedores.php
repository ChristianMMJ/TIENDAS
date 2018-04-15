<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('proveedores_model');
        $this->load->model('generales_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vProveedores');
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
            $data = $this->proveedores_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRegimenesFiscales() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosDescripcionByFielID('REGIMENES FISCALES');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getProveedorByID() {
        try {
            extract($this->input->post());
            $data = $this->proveedores_model->getProveedorByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
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
            $ID=$this->proveedores_model->onAgregar($data);
            print $ID;
            /*SUBIR FOTO*/ 
            $URL_DOC = 'uploads/Proveedores/';
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
                    $this->proveedores_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->proveedores_model->onModificar($ID, $DATA);
                }
            }
            /*FIN SUBIR FOTO*/
            
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
            $this->proveedores_model->onModificar($ID, $DATA);
            
            /* MODIFICAR FOTO */
            if ($_FILES["Foto"]["tmp_name"] !== "") {
                $URL_DOC = 'uploads/Proveedores';
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
                        $this->proveedores_model->onModificar($ID, $DATA);
                    } else {
                        $DATA = array(
                            'Foto' => (null),
                        );
                        $this->proveedores_model->onModificar($ID, $DATA);
                    }
                }
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->proveedores_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
