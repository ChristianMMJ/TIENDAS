<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class gastos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("U.ID, IFNULL(U.DocMov,'') AS Documento ,"
                    . "CONCAT(T.Clave , '-',T.RazonSocial) AS 'Tienda' ,"
                    . "U.FechaMov as 'FechaMovimiento', "
                    . "CONCAT('<strong>$',FORMAT(IFNULL(U.Importe,0),2),'</strong>') AS Importe,"
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_Gastos AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where_in('U.Estatus', array('ACTIVO'));
            $this->db->like('U.Tienda', $Tienda, 'before');
            $this->db->order_by("U.DocMov", "ASC");
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
            $this->db->insert("sz_Gastos", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($array) {
        try {
            $this->db->insert("sz_GastosDetalle", $array);
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
            $this->db->update("sz_Gastos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $Compra, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->where('Compra', $Compra);
            $this->db->update("sz_GastosDetalle", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_GastosDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Gastos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getGastoByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Gastos AS U');
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

    public function getGastoDetalleByID($ID) {
        try {
            $this->db->select('CD.ID AS ID, '
                    . 'CD.Concepto AS Concepto ,'
                    . 'CD.Cantidad AS Cantidad,'
                    . 'CD.Precio AS Precio,'
                    . 'CD.Subtotal AS SubTotal,'
                    . 'CD.Categoria AS Categoria,'
                    . "CONCAT(C.IValue , '-',C.SValue) AS CatNombre   "
                    . '', false);
            $this->db->from('sz_GastosDetalle AS CD');
            $this->db->join('sz_Catalogos AS C', 'CD.Categoria = C.ID');
            $this->db->like('C.FieldId', 'CATEGORIAS GASTOS');
            $this->db->like('C.Estatus', 'ACTIVO');
            $this->db->where('CD.Gasto', $ID);
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
