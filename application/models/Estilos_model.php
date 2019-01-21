<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Estilos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("E.ID, "
                    . "E.Clave+'-'+E.Descripcion AS Estilo, "
                    . "CASE "
                    . "WHEN E.Linea IS NULL "
                    . "THEN '<span class=\"badge badge-danger\">SIN LINEA</span>' "
                    . "ELSE CONCAT(L.Clave,'-',L.Descripcion) END AS Linea "
                    . " ", false);
            $this->db->from('sz_estilos AS E');
            $this->db->join('sz_lineas AS L', 'E.Linea = L.ID', 'left');
            $this->db->where_in('E.Estatus', array('ACTIVO'));
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            $this->db->select("U.ID, U.Clave, CONCAT(U.Clave,'-',U.Descripcion) AS Descripcion ", false);
            $this->db->from('sz_estilos AS U');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilosCombinacionesSerie($Estilo) {
        try {


            $this->db->select("CONCAT(E.ID,U.ID) AS Clave, "
                    . "U.ID AS ClaveColor,"
                    . "CONCAT(E.Clave , ' ', E.Descripcion) AS Estilo,"
                    . "CONCAT( IFNULL(U.Clave,''),' ',U.Descripcion) AS Color, "
                    . "CONCAT('Serie: ' ,S.PuntoInicial,' AL ', S.PuntoFinal) AS Serie ", false);
            $this->db->from('sz_combinaciones AS U');
            $this->db->join('sz_estilos AS E', 'E.ID = U.Estilo', 'left');
            $this->db->join('sz_series AS S', 'S.ID =  E.Serie');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->like('E.Clave', $Estilo, 'after');
            $this->db->order_by("E.Clave", "ASC");
            $this->db->order_by("U.Clave", "ASC");

            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_estilos", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_estilos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_estilos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstiloByID($ID) {
        try {
            $this->db->select('E.*', false);
            $this->db->from('sz_estilos AS E');
            $this->db->where('E.ID', $ID);
            $this->db->where_in('E.Estatus', 'ACTIVO');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//        print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo($Estilo) {
        try {
            $this->db->select("S.*, E.Clave AS ClaveEstilo", false);
            $this->db->from('sz_estilos AS E');
            $this->db->join('sz_series AS S', 'E.Serie = S.ID', 'left');
            $this->db->where('E.ID', $Estilo);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEncabezadoSerieXEstilo($Estilo) {
        try {
            $this->db->select("S.T1, "
                    . "S.T2,"
                    . "S.T3,"
                    . "S.T4,"
                    . "S.T5,"
                    . "S.T6,"
                    . "S.T7,"
                    . "S.T8,"
                    . "S.T9,"
                    . "S.T10,"
                    . "S.T11,"
                    . "S.T12,"
                    . "S.T13,"
                    . "S.T14,"
                    . "S.T15,"
                    . "S.T16,"
                    . "S.T17,"
                    . "S.T18,"
                    . "S.T19,"
                    . "S.T20,"
                    . "S.T21,"
                    . "S.T22"
                    . "", false);
            $this->db->from('sz_estilos AS E');
            $this->db->join('sz_series AS S', 'E.Serie = S.ID', 'left');
            $this->db->where('E.ID', $Estilo);
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
