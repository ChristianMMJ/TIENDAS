<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class asistencias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $query = $this->db->select("A.ID AS ID, A.Usuario AS Usuario, A.Numero AS Numero, A.Fecha AS Fecha, A.Hora AS Hora,  A.Tipo As Tipo, A.Estatus AS Estatus", false)->from('sz_asistencias AS A')->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarEntrada($Numero, $fecha) {
        try {
            $query = $this->db->select("A.ID, A.Usuario, A.Numero, A.Fecha, A.Hora, A.Estatus, A.Tipo, A.Empleado, A.EmpleadoT ", false)->from('sz_asistencias AS A')
                    ->join('sz_Empleados AS E', 'E.NumeroEmpleado = A.Numero', 'left')
                    ->where('A.Numero', $Numero)
                    ->where('str_to_date(A.Fecha, \'%d/%m/%Y\') >= str_to_date(\'' . $fecha . '\', \'%d/%m/%Y\') ')
                    ->where('str_to_date(A.Fecha, \'%d/%m/%Y\') <= str_to_date(\'' . $fecha . '\', \'%d/%m/%Y\') ')
                    ->order_by('A.ID', 'DESC')->limit(4)->get();
            $str = $this->db->last_query();
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getInformacionPorEmpleado($Numero) {
        try {
            return $this->db->select("E.ID AS ID, CONCAT(E.PrimerNombre,' ', E.SegundoNombre,' ',E.ApellidoP,' ',E.ApellidoM) AS Empleado, E.Foto AS FOTO ", false)
                            ->from('sz_Empleados AS E')
                            ->where('E.NumeroEmpleado', $Numero)
                            ->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getInformacionSemana($Fecha) {
        try {
            return $this->db->select("S.ID ID, S.Ano ANIO, S.Sem AS SEMANA, S.FechaIni AS FECHA_INICIO, S.FechaFin AS FECHA_FIN", false)
                            ->from('sz_semanas AS S')
                            ->where("str_to_date('$Fecha','%d/%m/%Y') BETWEEN str_to_date(FechaIni, '%d/%m/%Y') AND  str_to_date(FechaFin, '%d/%m/%Y')", null, false)
                            ->limit(1)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
