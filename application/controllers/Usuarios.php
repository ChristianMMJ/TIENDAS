<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_model');
        $this->load->model('Tiendas_model');
        $this->load->model('Empresas_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vUsuarios');
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
            //var_dump($this->input->post('Tienda'));
            $data = $this->usuario_model->getRecords(($this->input->post('Tienda') !== NULL && $this->input->post('Tienda') !== '' ) ? $this->input->post('Tienda') : $this->session->userdata('TIENDA'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEmpresas() {
        try {
            extract($this->input->post());
            $data = $this->empresas_model->getEmpresas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            $data = $this->tiendas_model->getTiendas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendasByEmpresa() {
        try {
            $data = $this->tiendas_model->getTiendasByEmpresa($this->input->post('Empresa'));
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUsuarioByID() {
        try {
            extract($this->input->post());
            $data = $this->usuario_model->getUsuarioByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'Usuario' => ($this->input->post('Usuario') !== NULL) ? $this->input->post('Usuario') : NULL,
                'Contrasena' => ($this->input->post('Contrasena') !== NULL) ? $this->input->post('Contrasena') : NULL,
                'Tipo' => ($this->input->post('Tipo') !== NULL) ? $this->input->post('Tipo') : NULL,
                'Correo' => ($this->input->post('Correo') !== NULL) ? $this->input->post('Correo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL,
                'Registro' => Date('d/m/Y h:i:s a'),
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'Empresa' => ($this->input->post('Empresa') !== NULL) ? $this->input->post('Empresa') : NULL
            );
            $ID = $this->usuario_model->onAgregar($data);
            /* SUBIR FOTO */
            $URL_DOC = 'uploads/Usuarios/';
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
                    $this->usuario_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->usuario_model->onModificar($ID, $DATA);
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
                'Usuario' => ($Usuario !== NULL) ? $Usuario : NULL,
                'Contrasena' => ($Contrasena !== NULL) ? $Contrasena : NULL,
                'Correo' => ($Correo !== NULL) ? $Correo : NULL,
                'Tipo' => ($Tipo !== NULL) ? $Tipo : NULL,
                'Estatus' => ($Estatus !== NULL) ? $Estatus : NULL,
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'Empresa' => ($this->input->post('Empresa') !== NULL) ? $this->input->post('Empresa') : NULL
            );
            $this->usuario_model->onModificar($ID, $DATA);

            /* MODIFICAR FOTO */
            $Foto = $this->input->post('Foto');
            if (empty($Foto)) {
                if ($_FILES["Foto"]["tmp_name"] !== "") {
                    $URL_DOC = 'uploads/Usuarios';
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
                            $this->usuario_model->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->usuario_model->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->usuario_model->onModificar($ID, $DATA);
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->usuario_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
