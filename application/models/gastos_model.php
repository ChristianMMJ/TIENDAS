<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class gastos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.ID, ISNULL(U.DocMov,'') AS Documento ,"
                    . "T.Clave + '-'+T.RazonSocial AS 'Tienda' ,"
                    . "U.FechaMov as 'Fecha Movimiento ', "
                    . "'<strong>$'+CONVERT(varchar, CAST(U.Importe AS money), 1)+'</strong>' AS Importe , "
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_Gastos AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where_in('U.Estatus', array('ACTIVO'));
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
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($array) {
        try {
            $this->db->insert("sz_GastosDetalle", $array);
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
                    . "CONVERT(varchar(4),C.IValue) + '-'+C.SValue AS CatNombre   "
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
