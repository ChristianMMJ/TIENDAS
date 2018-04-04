<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tiendas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tiendas_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vNavegacion');
            $this->load->view('vTiendas');
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


            $data = $this->tiendas_model->getRecords();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendaByID() {
        try {
            extract($this->input->post());
            $data = $this->tiendas_model->getTiendaByID($ID);
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
                'NoInt' => ($this->input->post('NoInt') !== NULL) ? $this->input->post('NoInt') : NULL,
                'NoExt' => ($this->input->post('NoExt') !== NULL) ? $this->input->post('NoExt') : NULL,
                'Colonia' => ($this->input->post('Colonia') !== NULL) ? $this->input->post('Colonia') : NULL,
                'Ciudad' => ($this->input->post('Ciudad') !== NULL) ? $this->input->post('Ciudad') : NULL,
                'Estado' => ($this->input->post('Estado') !== NULL) ? $this->input->post('Estado') : NULL,
                'CP' => ($this->input->post('CP') !== NULL) ? $this->input->post('CP') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->tiendas_model->onAgregar($data);
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
                'NoInt' => ($this->input->post('NoInt') !== NULL) ? $this->input->post('NoInt') : NULL,
                'NoExt' => ($this->input->post('NoExt') !== NULL) ? $this->input->post('NoExt') : NULL,
                'Colonia' => ($this->input->post('Colonia') !== NULL) ? $this->input->post('Colonia') : NULL,
                'Ciudad' => ($this->input->post('Ciudad') !== NULL) ? $this->input->post('Ciudad') : NULL,
                'Estado' => ($this->input->post('Estado') !== NULL) ? $this->input->post('Estado') : NULL,
                'CP' => ($this->input->post('CP') !== NULL) ? $this->input->post('CP') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->tiendas_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->tiendas_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
