<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class cortesCaja_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.ID, "
                    . "U.FechaCreacion as 'Fecha Corte ', "
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_CortesCaja AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
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
            $this->db->insert("sz_CortesCaja", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_CortesCaja", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_Ventas", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaVentas($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_Ventas");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_CortesCaja");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCorteCajaByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_CortesCaja AS U');
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

    public function getDetalleNuevo() {
        try {
            $this->db->select(" U.FolioTienda AS Folio,U.FechaCreacion AS Fecha, CT.RazonSocial AS 'Cliente', U.Importe  ,U.ID ", false);
            $this->db->from('sz_Ventas AS U');
            $this->db->join('sz_Clientes AS CT', 'U.Cliente = CT.ID', 'left');
            $this->db->where('U.Estatus', 'CERRADA');
            $this->db->where('U.CorteCaja IS NULL');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->order_by('U.FolioTienda', 'ASC');
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

    public function getDetalleByID($ID) {
        try {
            $this->db->select(" U.FolioTienda AS Folio,U.FechaCreacion AS Fecha, CT.RazonSocial AS 'Cliente', U.Importe  ,U.ID ", false);
            $this->db->from('sz_Ventas AS U');
            $this->db->join('sz_Clientes AS CT', 'U.Cliente = CT.ID', 'left');
            $this->db->where_in('U.Estatus', 'CERRADA');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.CorteCaja', $ID);
            $this->db->order_by('U.FolioTienda', 'ASC');
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

}
