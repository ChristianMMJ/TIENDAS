<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Proveedores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            return $this->db->select("U.ID, U.Clave, U.RazonSocial as 'Nombre' ", false)
                            ->from('sz_proveedores AS U')
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedores() {
        try {
            return $this->db->select("U.ID, CONCAT(U.Clave,'-',U.RazonSocial) AS Nombre ", false)
                            ->from('sz_proveedores AS U')
                            ->where_in('U.Estatus', 'ACTIVO')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_proveedores", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_proveedores", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("sz_proveedores");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getProveedorByID($ID) {
        try {
            return $this->db->select('U.*', false)
                    ->from('sz_proveedores AS U')
                    ->where('U.ID', $ID)
                    ->where_in('U.Estatus', 'ACTIVO')
                    ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
