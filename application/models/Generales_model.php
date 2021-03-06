<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Generales_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($FieldId) {
        try {
            $this->db->select("U.ID ,U.IValue AS Clave, U.SValue AS Nombre,U.Valor_Text AS Descripción, U.Valor_Num AS Valor, U.Estatus AS Estatus ", false);
            $this->db->from('sz_catalogos AS U');
            $this->db->where_in('U.FieldId', $FieldId);
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

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_catalogos", $array);
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
            $this->db->update("sz_catalogos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_catalogos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogoByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_catalogos AS U');
            $this->db->where('U.ID', $ID);
            $this->db->where_in('U.Estatus', 'ACTIVO');
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

    public function getCatalogosByFielID($FieldId) {
        try {
            $this->db->select("U.ID, CONCAT(U.IValue,' ',U.SValue) AS SValue", false);
            $this->db->from('sz_catalogos AS U');
            $this->db->where('U.FieldId', $FieldId);
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("U.IValue", "ASC");
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

    public function getCatalogosDescripcionByFielID($FieldId) {
        try {
            $this->db->select("U.ID, CONCAT(U.IValue,' ',U.SValue,'-',U.Valor_Text) AS SValue", false);
            $this->db->from('sz_catalogos AS U');
            $this->db->where('U.FieldId', $FieldId);
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("U.IValue", "ASC");
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

}
