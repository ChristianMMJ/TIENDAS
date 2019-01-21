<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Diversos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("U.ID, "
                    . "CONCAT(T.Clave + '-'+T.RazonSocial) AS 'Tienda', ,"
                    . "U.Concepto, "
                    . "U.FechaCreacion as 'Fecha Movimiento ', "
                    . "CONCAT('<strong>$',FORMAT(IFNULL(U.Importe,0),2),'</strong>') AS Importe,"
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_diversos AS U');
            $this->db->join('sz_tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->like('U.Tienda', $Tienda, 'before');
            $this->db->where_in('U.Estatus', array('ACTIVO'));
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
            $this->db->insert("sz_diversos", $array);
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
            $this->db->update("sz_diversos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_diversos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDiversoByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_diversos AS U');
            $this->db->where('U.ID', $ID);
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

}
