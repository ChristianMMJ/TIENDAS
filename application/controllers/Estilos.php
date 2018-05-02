<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estilos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('generales_model');
        $this->load->model('lineas_model');
        $this->load->model('series_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vEstilos');
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
            print json_encode($this->estilos_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMarcas() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('MARCAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTemporadas() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('TEMPORADAS');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiposEstilo() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('TIPOS ESTILO');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSeries() {
        try {
            extract($this->input->post());
            $data = $this->series_model->getSeries();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getLineas() {
        try {
            extract($this->input->post());
            $data = $this->lineas_model->getLineas();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID() {
        try {
            print json_encode($this->estilos_model->getEstiloByID($this->input->post('ID')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            var_dump($this->input->post());
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL && $this->input->post('Genero') !== 'null') ? $this->input->post('Genero') : NULL,
                'Min' => ($this->input->post('Min') !== NULL && $this->input->post('Min') !== 'null') ? $this->input->post('Min') : 0,
                'Max' => ($this->input->post('Max') !== NULL && $this->input->post('Max') !== 'null') ? $this->input->post('Max') : 0,
                'Serie' => ($this->input->post('Serie') !== NULL && $this->input->post('Serie') !== 'null') ? $this->input->post('Serie') : NULL,
                'Marca' => ($this->input->post('Marca') !== NULL && $this->input->post('Marca') !== 'null') ? $this->input->post('Marca') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Temporada' => ($this->input->post('Temporada') !== NULL && $this->input->post('Temporada') !== 'null') ? $this->input->post('Temporada') : NULL,
                'Linea' => ($this->input->post('Linea') !== NULL && $this->input->post('Linea') !== 'null') ? $this->input->post('Linea') : NULL,
                'TipoEstilo' => ($this->input->post('TipoEstilo') !== NULL && $this->input->post('TipoEstilo') !== 'null') ? $this->input->post('TipoEstilo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );

            $ID = $this->estilos_model->onAgregar($data);


            $URL_DOC = 'uploads/Estilos/';
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
                    $this->estilos_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->estilos_model->onModificar($ID, $DATA);
                }
            }
            print $ID;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {

        $ID = $this->input->post('ID');
        extract($this->input->post());

        try {
            $data = array(
                'Clave' => ($this->input->post('Clave') !== NULL) ? $this->input->post('Clave') : NULL,
                'Descripcion' => ($this->input->post('Descripcion') !== NULL) ? $this->input->post('Descripcion') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL && $this->input->post('Genero') !== 'null') ? $this->input->post('Genero') : NULL,
                'Min' => ($this->input->post('Min') !== NULL && $this->input->post('Min') !== 'null') ? $this->input->post('Min') : 0,
                'Max' => ($this->input->post('Max') !== NULL && $this->input->post('Max') !== 'null') ? $this->input->post('Max') : 0,
                'Serie' => ($this->input->post('Serie') !== NULL && $this->input->post('Serie') !== 'null') ? $this->input->post('Serie') : NULL,
                'Marca' => ($this->input->post('Marca') !== NULL && $this->input->post('Marca') !== 'null') ? $this->input->post('Marca') : NULL,
                'Ano' => ($this->input->post('Ano') !== NULL) ? $this->input->post('Ano') : NULL,
                'Temporada' => ($this->input->post('Temporada') !== NULL && $this->input->post('Temporada') !== 'null') ? $this->input->post('Temporada') : NULL,
                'Linea' => ($this->input->post('Linea') !== NULL && $this->input->post('Linea') !== 'null') ? $this->input->post('Linea') : NULL,
                'TipoEstilo' => ($this->input->post('TipoEstilo') !== NULL && $this->input->post('TipoEstilo') !== 'null') ? $this->input->post('TipoEstilo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->estilos_model->onModificar($this->input->post('ID'), $data);

            $Foto = $this->input->post('Foto');
            if (empty($Foto)) {
                if ($_FILES["Foto"]["tmp_name"] !== "") {
                    $URL_DOC = 'uploads/Estilos';
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
                            $this->estilos_model->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->estilos_model->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->estilos_model->onModificar($ID, $DATA);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            $this->estilos_model->onEliminar($this->input->post('ID'));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
