<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ventas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Ventas", $array);
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
            $this->db->insert("sz_VentasDetalle", $array);
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
            $this->db->update("sz_Ventas", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_VentasDetalle", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_VentasDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Ventas");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Ventas AS U');
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

    public function getDetalleByID($ID) {
        try {
            $this->db->select('VD.ID AS ID, '
                    . 'VD.Estilo AS IdEstilo, '
                    . 'VD.Color AS IdColor,'
                    . 'CONCAT(E.Clave,\'-\',E.Descripcion) AS Estilo,'
                    . 'CONCAT(C.Clave,\'-\',C.Descripcion) AS Color,'
                    . 'VD.Talla AS Talla,'
                    . 'VD.Cantidad AS Cantidad,'
                    
                    . "  ''+ CONVERT(varchar, CAST(VD.Precio AS money), 1) AS Precio, "
                    . "  '$'+ CONVERT(varchar, CAST(VD.Descuento AS money), 1) AS 'Desc', "
                    . "  '$'+ CONVERT(varchar, CAST(VD.Subtotal AS money), 1) AS Sub, "
                    . 'VD.PorcentajeDesc AS PorDesc,'
                    //Eliminar
                    . "'<span class=''fa fa-trash-alt'' onclick=''onEliminarDetalle('+ REPLACE(LTRIM(REPLACE(VD.ID, '0', ' ')), ' ', '0')+','+  REPLACE(LTRIM(REPLACE(VD.Venta, '0', ' ')), ' ', '0')  +')  ''></span>' AS Eliminar "
                    . " "
                    . '', false);
            $this->db->from('sz_VentasDetalle AS VD');
            $this->db->join('sz_Estilos AS E', 'VD.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'VD.Color = C.ID');
            $this->db->where('VD.Venta', $ID);
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

    public function Existe($Estilo, $Color, $Talla, $Venta) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_VentasDetalle AS VD ');
            $this->db->where('VD.Venta', $Venta);
            $this->db->where('VD.Talla', $Talla);
            $this->db->where('VD.Color', $Color);
            $this->db->where('VD.Estilo', $Estilo);
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
