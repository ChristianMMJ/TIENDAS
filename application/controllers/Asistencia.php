<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

/**
 * Description of Asistencia
 *
 * @author Administrador
 */
class Asistencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session')->model('asistencias_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            $this->load->view('vEncabezado')->view('vNavegacion')->view('vAsistencia')->view('vFooter');
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onAcceder() {
        try {
            $fecha = Date('d/m/Y');
            $Entrada_Salida = $this->asistencias_model->onComprobarEntrada($this->input->post('Numero'), $fecha);
            $info_empleado = $this->asistencias_model->getInformacionPorEmpleado($this->input->post('Numero'));
            $dtm = json_decode(json_encode($info_empleado), FALSE);
            if (count($dtm) > 0) {
                $es = array('Usuario' => $this->session->ID,
                    'Numero' => $this->input->post('Numero'),
                    'Fecha' => $fecha,
                    'Hora' => Date('h:i:s a'),
                    'Estatus' => 'A',
                    'Empleado' => $dtm[0]->ID,
                    'EmpleadoT' => $dtm[0]->Empleado);
                switch (count($Entrada_Salida)) {
                    case 0:
                        $es['Tipo'] = 'E';
                        $this->db->insert('sz_Asistencias', $es);
                        break;
                    case 1:
                        $es['Tipo'] = 'S';
                        $this->db->insert('sz_Asistencias', $es);
                        break;
                    case 2:
                        $es['Tipo'] = 'ES';
                        $this->db->insert('sz_Asistencias', $es);
                        break;
                    case 3:
                        $es['Tipo'] = 'SE';
                        $this->db->insert('sz_Asistencias', $es);
                        break;
                }
                print json_encode($info_empleado);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getRecords() {
        try {
            print json_encode($this->asistencias_model->getRecords());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getInformacionSemana() {
        try {
            print json_encode($this->asistencias_model->getInformacionSemana(Date('d/m/Y')));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
