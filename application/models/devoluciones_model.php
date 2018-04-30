<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class devoluciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getVentas() {
        try {
            $this->db->select(" V.ID, CONCAT(T.Clave, ' - ',T.RazonSocial) AS TIENDA, "
                    . "V.FolioTienda AS FOLIO, CONCAT(C.Clave, ' - ',C.RazonSocial) AS CLIENTE, "
                    . "V.FechaCreacion AS \"FECHA DE CREACION\", "
                    . "CONCAT('<strong class=\"text-success\">$',CONVERT(varchar, CAST(V.Importe AS money), 1),'</strong>') AS IMPORTE,"
                    . "CONCAT('<button type=\"button\" class=\"btn btn-danger\" onclick=\"getVentaXID(this)\">','<span class=\"fa fa-eye\"></span>') AS ACCIONES", false);
            $this->db->from('sz_Ventas AS V');
            $this->db->join('sz_Tiendas AS T', 'V.Tienda = T.ID', 'left');
            $this->db->join('sz_Clientes AS C', 'V.Cliente = C.ID', 'left');
            $this->db->where_in('V.Estatus', array('CERRADA'));
            if (in_array($this->session->userdata["Tipo"], array('VENDEDOR'))) {
//                $this->db->where('V.Vendedor', $this->session->userdata["ID"]);
            }
            $this->db->where_in('V.Estatus', array('CERRADA'));
            $this->db->where_in('T.Estatus', array('ACTIVO'));
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
    
    public function getVentaXID($ID) {
        try {
            $this->db->select("VD.ID AS ID, "
                    . "CONCAT(E.Clave,' - ',E.Descripcion) AS ESTILO,"
                    . "CONCAT(C.ID,' - ',C.Descripcion) AS COLOR,"
                    . "VD.Talla AS TALLA,"
                    . "VD.Cantidad AS CANTIDAD,"
                    . "CONCAT('<strong class=\"text-primary\">$',CONVERT(varchar, CAST(VD.Precio AS money), 1),'</strong>') AS PRECIO,"
                    . "CONCAT('<strong class=\"text-danger\">$',CONVERT(varchar, CAST(VD.Descuento AS money), 1),'</strong>') AS DESCUENTO,"
                    . "CONCAT('<strong class=\"text-success\">$',CONVERT(varchar, CAST(VD.Subtotal AS money), 1),'</strong>') AS SUBTOTAL", false);
            $this->db->from('sz_VentasDetalle AS VD');  
            $this->db->join('sz_Estilos AS E', 'E.ID = VD.Estilo', 'left');
            $this->db->join('sz_Combinaciones AS C', 'C.ID = VD.Color', 'left');
            $this->db->where('VD.Venta',$ID);
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
