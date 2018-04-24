<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('estilos_model');
        $this->load->model('tiendas_model');
        $this->load->model('combinaciones_model');
        $this->load->model('existencias_model');
        $this->load->model('clientes_model');
        $this->load->model('generales_model');
        $this->load->model('empleados_model');
        $this->load->model('descuentos_model');
        $this->load->model('ventas_model');
        date_default_timezone_set('America/Mexico_City');
    }

    public function index() {

        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado');
            $this->load->view('vVentas');
            $this->load->view('vFooter');
        } else {
            $this->load->view('vEncabezado');
            $this->load->view('vSesion');
            $this->load->view('vFooter');
        }
    }

    public function onEliminarDetalle() {
        try {
            extract($this->input->post());
            $this->ventas_model->onEliminarDetalle($ID);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getNuevoFolio() {
        try {
            $Datos = $this->ventas_model->onCrearFolio($this->input->post('TipoDoc'));
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }

            print $Folio;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar() {
        try {
            $Datos = $this->ventas_model->onCrearFolio($this->input->post('TipoDoc'));
            $Folio = $Datos[0]->FolioTienda;
            if (empty($Folio)) {
                $Folio = 1;
            } else {
                $Folio = $Folio + 1;
            }
            $data = array(
                'TipoDoc' => ($this->input->post('TipoDoc') !== NULL) ? $this->input->post('TipoDoc') : NULL,
                'Tienda' => $this->session->userdata('TIENDA'),
                'FolioTienda' => $Folio,
                'Cliente' => ($this->input->post('Cliente') !== NULL) ? $this->input->post('Cliente') : NULL,
                'Vendedor' => ($this->input->post('Vendedor') !== NULL) ? $this->input->post('Vendedor') : NULL,
                'FechaCreacion' => Date('d/m/Y h:i:s a'),
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'MetodoPago' => ($this->input->post('MetodoPago') !== NULL) ? $this->input->post('MetodoPago') : NULL,
                'Estatus' => 'BORRADOR',
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL,
                'Usuario' => $this->session->userdata('ID')
            );
            $ID = $this->ventas_model->onAgregar($data);
            $dataCliente = array(
                'ID' => $ID,
                'FolioTienda' => $Folio
            );
            //print $ID;
            echo json_encode($dataCliente);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle() {
        try {
            $data = array(
                'Venta' => ($this->input->post('Venta') !== NULL) ? $this->input->post('Venta') : NULL,
                'Estilo' => ($this->input->post('Estilo') !== NULL) ? $this->input->post('Estilo') : NULL,
                'Color' => ($this->input->post('Color') !== NULL) ? $this->input->post('Color') : NULL,
                'Talla' => ($this->input->post('Talla') !== NULL) ? $this->input->post('Talla') : NULL,
                'Cantidad' => ($this->input->post('Cantidad') !== NULL) ? $this->input->post('Cantidad') : NULL,
                'Precio' => ($this->input->post('Precio') !== NULL) ? $this->input->post('Precio') : NULL,
                'Descuento' => ($this->input->post('Descuento') !== NULL) ? $this->input->post('Descuento') : NULL,
                'Subtotal' => ($this->input->post('Subtotal') !== NULL) ? $this->input->post('Subtotal') : NULL,
                'PorcentajeDesc' => ($this->input->post('PorcentajeDesc') !== NULL) ? $this->input->post('PorcentajeDesc') : NULL
            );
            $this->ventas_model->onAgregarDetalle($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar() {
        try {
            $data = array(
                'Tienda' => $this->session->userdata('TIENDA'),
                'Cliente' => ($this->input->post('Cliente') !== NULL) ? $this->input->post('Cliente') : NULL,
                'Vendedor' => ($this->input->post('Vendedor') !== NULL) ? $this->input->post('Vendedor') : NULL,
                'FechaMov' => ($this->input->post('FechaMov') !== NULL) ? $this->input->post('FechaMov') : NULL,
                'MetodoPago' => ($this->input->post('MetodoPago') !== NULL) ? $this->input->post('MetodoPago') : NULL,
                'Importe' => ($this->input->post('Importe') !== NULL) ? $this->input->post('Importe') : NULL
            );
            $this->ventas_model->onModificar($ID, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle() {
        try {

            extract($this->input->post());
            unset($_POST['ID']);
            $this->ventas_model->onModificarDetalle($ID, $this->input->post());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciaXEstiloXColorXTienda() {
        try {

            extract($this->input->post());
            $this->existencias_model->onModifcarExistenciaXEstiloXColorXTienda($Estilo, $Color, $CantidadNueva);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaByFolioTiendaByTipoDocByTienda() {
        try {
            extract($this->input->post());
            $data = $this->ventas_model->getVentaByFolioTiendaByTipoDocByTienda($FolioTienda, $TipoDoc);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID() {
        try {
            extract($this->input->post());
            $data = $this->ventas_model->getDetalleByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasByEstiloByColor() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciasByEstiloByColor($Estilo, $Color);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciaByID() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciaByID($ID);
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVendedores() {
        try {
            extract($this->input->post());
            $data = $this->empleados_model->getEmpleados();
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getMetodosPago() {
        try {
            extract($this->input->post());
            $data = $this->generales_model->getCatalogosByFielID('CONDICIONES DE PAGO');
            print json_encode($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getClientes() {
        try {
            extract($this->input->post());
            $data = $this->clientes_model->getClientes();
            print json_encode($data);
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

    public function getDescuentos() {
        try {
            extract($this->input->post());
            $data = $this->descuentos_model->getDescuentos();
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

    public function getEstiloByID() {
        try {
            extract($this->input->post());
            print json_encode($this->estilos_model->getEstiloByID($Estilo));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion() {
        try {
            extract($this->input->post());
            $data = $this->existencias_model->getExistenciasXEstiloXCombinacion($Estilo, $Combinacion);
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

}
