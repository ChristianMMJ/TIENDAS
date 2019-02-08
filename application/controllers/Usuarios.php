<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session')->model('Usuario_model','usm')->model('Tiendas_model','tim')->model('Empresas_model','emm');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado')->view('vMenuCatalogos')->view('vUsuarios')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vNavegacion')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function getRecords() {
        try {  
            print json_encode($this->usm->getRecords(($this->input->get('Tienda') !== NULL && $this->input->get('Tienda') !== '' ) ? $this->input->get('Tienda') : $this->session->userdata('TIENDA')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEmpresas() {
        try {
            print json_encode($this->emm->getEmpresas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendas() {
        try {
            print json_encode($this->tim->getTiendas());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendasByEmpresa() {
        try {
            print json_encode($this->tim->getTiendasByEmpresa($this->input->post('Empresa')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUsuarioByID() {
        try {
            print json_encode($this->usm->getUsuarioByID($this->input->post('ID')));
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
            $ID = $this->usm->onAgregar($data);
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
                    $this->usm->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->usm->onModificar($ID, $DATA);
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
            $this->usm->onModificar($ID, $DATA);

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
                            $this->usm->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->usm->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->usm->onModificar($ID, $DATA);
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->usm->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onChangeTheme() {
        try {
            $this->db->set('Theme', $this->input->post('THEME'))->where('ID', $this->session->ID)->update('sz_usuarios');
            $this->session->THEME = $this->input->post('THEME');
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
