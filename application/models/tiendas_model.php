<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class tiendas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Empresa) {
        try {
            if ($Empresa === 'TODAS') {
                $Empresa = "";
            }
            $this->db->select("U.ID, U.Clave, U.RazonSocial AS 'Tienda',CONCAT(E.Clave,'-',E.RazonSocial) AS 'Empresa' ", false);
            $this->db->from('sz_Tiendas AS U');
            $this->db->join('sz_Empresas AS E', 'U.Empresa = E.ID', 'left');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->like('U.Empresa', $Empresa, 'before');
            $this->db->order_by('U.Clave', 'ASC');
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

    public function getTiendas() {
        try {
            $this->db->select("U.ID, CONCAT(U.Clave,'-', U.RazonSocial) AS 'Tienda'  ", false);
            $this->db->from('sz_Tiendas AS U');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->where('U.Empresa', $this->session->userdata('EMPRESA'));
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

    public function getTiendasByEmpresa($Empresa) {
        try {
            $this->db->select("U.ID, CONCAT(U.Clave,'-', U.RazonSocial) AS 'Tienda'  ", false);
            $this->db->from('sz_Tiendas AS U');
            $this->db->where('U.Estatus', 'ACTIVO');
            $this->db->where('U.Empresa', $Empresa);

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

    public function getPorcentajesByTienda($ID) {
        try {
            $this->db->select("U.PorMen, U.PorMay  ", false);
            $this->db->from('sz_Tiendas AS U');
            $this->db->where_in('U.ID', $ID);
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
            $this->db->insert("sz_Tiendas", $array);
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
            $this->db->update("sz_Tiendas", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Tiendas");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTiendaByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Tiendas AS U');
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

}
