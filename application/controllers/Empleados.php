<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('empleados_model');
        $this->load->model('tiendas_model');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if (in_array($this->session->userdata["Tipo"], array("ADMINISTRADOR", "GERENTE", "SISTEMAS"))) {
                $this->load->view('vEncabezado');
                $this->load->view('vNavegacion');
                $this->load->view('vEmpleados');
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
            extract($this->input->post());
            $data = $this->empleados_model->getRecords();
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

    public function getEmpleadoByID() {
        try {
            extract($this->input->post());
            $data = $this->empleados_model->getEmpleadoByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $data = array(
                'ApellidoP' => ($this->input->post('ApellidoP') !== NULL) ? $this->input->post('ApellidoP') : NULL,
                'ApellidoM' => ($this->input->post('ApellidoM') !== NULL) ? $this->input->post('ApellidoM') : NULL,
                'PrimerNombre' => ($this->input->post('PrimerNombre') !== NULL) ? $this->input->post('PrimerNombre') : NULL,
                'SegundoNombre' => ($this->input->post('SegundoNombre') !== NULL) ? $this->input->post('SegundoNombre') : NULL,
                'Direccion' => ($this->input->post('Direccion') !== NULL) ? $this->input->post('Direccion') : NULL,
                'NoExt' => ($this->input->post('NoExt') !== NULL) ? $this->input->post('NoExt') : NULL,
                'NoInt' => ($this->input->post('NoInt') !== NULL) ? $this->input->post('NoInt') : NULL,
                'Colonia' => ($this->input->post('Colonia') !== NULL) ? $this->input->post('Colonia') : NULL,
                'Ciudad' => ($this->input->post('Ciudad') !== NULL) ? $this->input->post('Ciudad') : NULL,
                'Estado' => ($this->input->post('Estado') !== NULL) ? $this->input->post('Estado') : NULL,
                'CP' => ($this->input->post('CP') !== NULL) ? $this->input->post('CP') : NULL,
                'EstadoCivil' => ($this->input->post('EstadoCivil') !== NULL) ? $this->input->post('EstadoCivil') : NULL,
                'RFC' => ($this->input->post('RFC') !== NULL) ? $this->input->post('RFC') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Celular' => ($this->input->post('Celular') !== NULL) ? $this->input->post('Celular') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL) ? $this->input->post('Genero') : NULL,
                'NoIMSS' => ($this->input->post('NoIMSS') !== NULL) ? $this->input->post('NoIMSS') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Celular' => ($this->input->post('Celular') !== NULL) ? $this->input->post('Celular') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL) ? $this->input->post('Genero') : NULL,
                'NoIMSS' => ($this->input->post('NoIMSS') !== NULL) ? $this->input->post('NoIMSS') : NULL,
                'FechaNacimiento' => ($this->input->post('FechaNacimiento') !== NULL) ? $this->input->post('FechaNacimiento') : NULL,
                'FechaIngreso' => ($this->input->post('FechaIngreso') !== NULL) ? $this->input->post('FechaIngreso') : NULL,
                'FechaEgreso' => ($this->input->post('FechaEgreso') !== NULL) ? $this->input->post('FechaEgreso') : NULL,
                'TipoSalario' => ($this->input->post('TipoSalario') !== NULL) ? $this->input->post('TipoSalario') : NULL,
                'SalarioDiario' => ($this->input->post('SalarioDiario') !== NULL) ? $this->input->post('SalarioDiario') : NULL,
                'Ahorro' => ($this->input->post('Ahorro') !== NULL) ? $this->input->post('Ahorro') : NULL,
                'Prestamo' => ($this->input->post('Prestamo') !== NULL) ? $this->input->post('Prestamo') : NULL,
                'AbonoPrestamo' => ($this->input->post('AbonoPrestamo') !== NULL) ? $this->input->post('AbonoPrestamo') : NULL,
                'SaldoPrestamo' => ($this->input->post('SaldoPrestamo') !== NULL) ? $this->input->post('SaldoPrestamo') : NULL,
                'DescInfonavit' => ($this->input->post('DescInfonavit') !== NULL) ? $this->input->post('DescInfonavit') : NULL,
                'DescImpuesto' => ($this->input->post('DescImpuesto') !== NULL) ? $this->input->post('DescImpuesto') : NULL,
                'DescIMSS' => ($this->input->post('DescIMSS') !== NULL) ? $this->input->post('DescIMSS') : NULL,
                'PrimaDominical' => ($this->input->post('PrimaDominical') !== NULL) ? $this->input->post('PrimaDominical') : NULL,
                'Fonacot' => ($this->input->post('Fonacot') !== NULL) ? $this->input->post('Fonacot') : NULL,
                'PorcentajeVtaSem' => ($this->input->post('PorcentajeVtaSem') !== NULL) ? $this->input->post('PorcentajeVtaSem') : NULL,
                'PorcentajeVtaMens' => ($this->input->post('PorcentajeVtaMens') !== NULL) ? $this->input->post('PorcentajeVtaMens') : NULL,
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'FormaPagoNomina' => ($this->input->post('FormaPagoNomina') !== NULL) ? $this->input->post('FormaPagoNomina') : NULL,
                'PorcentajeVtaSemGlobal' => ($this->input->post('PorcentajeVtaSemGlobal') !== NULL) ? $this->input->post('PorcentajeVtaSemGlobal') : NULL,
                'PorcentajeVtaMensGlobal' => ($this->input->post('PorcentajeVtaMensGlobal') !== NULL) ? $this->input->post('PorcentajeVtaMensGlobal') : NULL,
                'SalarioNeto' => ($this->input->post('SalarioNeto') !== NULL) ? $this->input->post('SalarioNeto') : NULL,
                'SalarioFiscal' => ($this->input->post('SalarioFiscal') !== NULL) ? $this->input->post('SalarioFiscal') : NULL,
                'NoFiscal' => ($this->input->post('NoFiscal') !== NULL) ? $this->input->post('NoFiscal') : NULL,
                'Beneficiario' => ($this->input->post('Beneficiario') !== NULL) ? $this->input->post('Beneficiario') : NULL,
                'ParentescoBeneficiario' => ($this->input->post('ParentescoBeneficiario') !== NULL) ? $this->input->post('ParentescoBeneficiario') : NULL,
                'PorcentajeBeneficio' => ($this->input->post('PorcentajeBeneficio') !== NULL) ? $this->input->post('PorcentajeBeneficio') : NULL,
                'CtaBancaria' => ($this->input->post('CtaBancaria') !== NULL) ? $this->input->post('CtaBancaria') : NULL,
                'ZapTiendaEmpleado' => ($this->input->post('ZapTiendaEmpleado') !== NULL) ? $this->input->post('ZapTiendaEmpleado') : NULL,
                'ZapTiendaEmpleadoPagos' => ($this->input->post('ZapTiendaEmpleadoPagos') !== NULL) ? $this->input->post('ZapTiendaEmpleadoPagos') : NULL,
                'ZapTiendaEmpleadoSaldo' => ($this->input->post('ZapTiendaEmpleadoSaldo') !== NULL) ? $this->input->post('ZapTiendaEmpleadoSaldo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $ID = $this->empleados_model->onAgregar($data);

            /* SUBIR FOTO */
            $URL_DOC = 'uploads/Empleados/';
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
                    $this->empleados_model->onModificar($ID, $DATA);
                } else {
                    $DATA = array(
                        'Foto' => (null),
                    );
                    $this->empleados_model->onModificar($ID, $DATA);
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
            $data = array(
                'ApellidoP' => ($this->input->post('ApellidoP') !== NULL) ? $this->input->post('ApellidoP') : NULL,
                'ApellidoM' => ($this->input->post('ApellidoM') !== NULL) ? $this->input->post('ApellidoM') : NULL,
                'PrimerNombre' => ($this->input->post('PrimerNombre') !== NULL) ? $this->input->post('PrimerNombre') : NULL,
                'SegundoNombre' => ($this->input->post('SegundoNombre') !== NULL) ? $this->input->post('SegundoNombre') : NULL,
                'Direccion' => ($this->input->post('Direccion') !== NULL) ? $this->input->post('Direccion') : NULL,
                'NoExt' => ($this->input->post('NoExt') !== NULL) ? $this->input->post('NoExt') : NULL,
                'NoInt' => ($this->input->post('NoInt') !== NULL) ? $this->input->post('NoInt') : NULL,
                'Colonia' => ($this->input->post('Colonia') !== NULL) ? $this->input->post('Colonia') : NULL,
                'Ciudad' => ($this->input->post('Ciudad') !== NULL) ? $this->input->post('Ciudad') : NULL,
                'Estado' => ($this->input->post('Estado') !== NULL) ? $this->input->post('Estado') : NULL,
                'CP' => ($this->input->post('CP') !== NULL) ? $this->input->post('CP') : NULL,
                'EstadoCivil' => ($this->input->post('EstadoCivil') !== NULL) ? $this->input->post('EstadoCivil') : NULL,
                'RFC' => ($this->input->post('RFC') !== NULL) ? $this->input->post('RFC') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Celular' => ($this->input->post('Celular') !== NULL) ? $this->input->post('Celular') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL) ? $this->input->post('Genero') : NULL,
                'NoIMSS' => ($this->input->post('NoIMSS') !== NULL) ? $this->input->post('NoIMSS') : NULL,
                'Telefono' => ($this->input->post('Telefono') !== NULL) ? $this->input->post('Telefono') : NULL,
                'Celular' => ($this->input->post('Celular') !== NULL) ? $this->input->post('Celular') : NULL,
                'Genero' => ($this->input->post('Genero') !== NULL) ? $this->input->post('Genero') : NULL,
                'NoIMSS' => ($this->input->post('NoIMSS') !== NULL) ? $this->input->post('NoIMSS') : NULL,
                'FechaNacimiento' => ($this->input->post('FechaNacimiento') !== NULL) ? $this->input->post('FechaNacimiento') : NULL,
                'FechaIngreso' => ($this->input->post('FechaIngreso') !== NULL) ? $this->input->post('FechaIngreso') : NULL,
                'FechaEgreso' => ($this->input->post('FechaEgreso') !== NULL) ? $this->input->post('FechaEgreso') : NULL,
                'TipoSalario' => ($this->input->post('TipoSalario') !== NULL) ? $this->input->post('TipoSalario') : NULL,
                'SalarioDiario' => ($this->input->post('SalarioDiario') !== NULL) ? $this->input->post('SalarioDiario') : NULL,
                'Ahorro' => ($this->input->post('Ahorro') !== NULL) ? $this->input->post('Ahorro') : NULL,
                'Prestamo' => ($this->input->post('Prestamo') !== NULL) ? $this->input->post('Prestamo') : NULL,
                'AbonoPrestamo' => ($this->input->post('AbonoPrestamo') !== NULL) ? $this->input->post('AbonoPrestamo') : NULL,
                'SaldoPrestamo' => ($this->input->post('SaldoPrestamo') !== NULL) ? $this->input->post('SaldoPrestamo') : NULL,
                'DescInfonavit' => ($this->input->post('DescInfonavit') !== NULL) ? $this->input->post('DescInfonavit') : NULL,
                'DescImpuesto' => ($this->input->post('DescImpuesto') !== NULL) ? $this->input->post('DescImpuesto') : NULL,
                'DescIMSS' => ($this->input->post('DescIMSS') !== NULL) ? $this->input->post('DescIMSS') : NULL,
                'PrimaDominical' => ($this->input->post('PrimaDominical') !== NULL) ? $this->input->post('PrimaDominical') : NULL,
                'Fonacot' => ($this->input->post('Fonacot') !== NULL) ? $this->input->post('Fonacot') : NULL,
                'PorcentajeVtaSem' => ($this->input->post('PorcentajeVtaSem') !== NULL) ? $this->input->post('PorcentajeVtaSem') : NULL,
                'PorcentajeVtaMens' => ($this->input->post('PorcentajeVtaMens') !== NULL) ? $this->input->post('PorcentajeVtaMens') : NULL,
                'Tienda' => ($this->input->post('Tienda') !== NULL) ? $this->input->post('Tienda') : NULL,
                'FormaPagoNomina' => ($this->input->post('FormaPagoNomina') !== NULL) ? $this->input->post('FormaPagoNomina') : NULL,
                'PorcentajeVtaSemGlobal' => ($this->input->post('PorcentajeVtaSemGlobal') !== NULL) ? $this->input->post('PorcentajeVtaSemGlobal') : NULL,
                'PorcentajeVtaMensGlobal' => ($this->input->post('PorcentajeVtaMensGlobal') !== NULL) ? $this->input->post('PorcentajeVtaMensGlobal') : NULL,
                'SalarioNeto' => ($this->input->post('SalarioNeto') !== NULL) ? $this->input->post('SalarioNeto') : NULL,
                'SalarioFiscal' => ($this->input->post('SalarioFiscal') !== NULL) ? $this->input->post('SalarioFiscal') : NULL,
                'NoFiscal' => ($this->input->post('NoFiscal') !== NULL) ? $this->input->post('NoFiscal') : NULL,
                'Beneficiario' => ($this->input->post('Beneficiario') !== NULL) ? $this->input->post('Beneficiario') : NULL,
                'ParentescoBeneficiario' => ($this->input->post('ParentescoBeneficiario') !== NULL) ? $this->input->post('ParentescoBeneficiario') : NULL,
                'PorcentajeBeneficio' => ($this->input->post('PorcentajeBeneficio') !== NULL) ? $this->input->post('PorcentajeBeneficio') : NULL,
                'CtaBancaria' => ($this->input->post('CtaBancaria') !== NULL) ? $this->input->post('CtaBancaria') : NULL,
                'ZapTiendaEmpleado' => ($this->input->post('ZapTiendaEmpleado') !== NULL) ? $this->input->post('ZapTiendaEmpleado') : NULL,
                'ZapTiendaEmpleadoPagos' => ($this->input->post('ZapTiendaEmpleadoPagos') !== NULL) ? $this->input->post('ZapTiendaEmpleadoPagos') : NULL,
                'ZapTiendaEmpleadoSaldo' => ($this->input->post('ZapTiendaEmpleadoSaldo') !== NULL) ? $this->input->post('ZapTiendaEmpleadoSaldo') : NULL,
                'Estatus' => ($this->input->post('Estatus') !== NULL) ? $this->input->post('Estatus') : NULL
            );
            $this->empleados_model->onModificar($ID, $data);

            /* MODIFICAR FOTO */
            $Foto = $this->input->post('Foto');
            if (empty($Foto)) {
                if ($_FILES["Foto"]["tmp_name"] !== "") {
                    $URL_DOC = 'uploads/Empleados';
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
                            $this->empleados_model->onModificar($ID, $DATA);
                        } else {
                            $DATA = array(
                                'Foto' => (null),
                            );
                            $this->empleados_model->onModificar($ID, $DATA);
                        }
                    }
                }
            } else {
                $DATA = array(
                    'Foto' => (null),
                );
                $this->empleados_model->onModificar($ID, $DATA);
            }
            /* FIN MODIFICAR FOTO */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar() {
        try {
            extract($this->input->post());
            $this->empleados_model->onEliminar($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
