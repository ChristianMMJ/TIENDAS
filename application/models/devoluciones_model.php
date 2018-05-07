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
                    . "CONCAT('<button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"getVentaXID(this)\">',"
                    . "'<span class=\"fa fa-check\"></span><br><strong>Seleccionar</strong></button>') AS ACCIONES", false);
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
            $this->db->select("VD.ID AS ID,VD.Estilo AS ESTILO_ID, VD.Color AS COLOR_ID,V.TipoDoc AS TP, "
                    . "CONCAT(E.Clave,' - ',E.Descripcion) AS ESTILO,"
                    . "CONCAT(C.ID,' - ',C.Descripcion) AS COLOR,"
                    . "VD.Talla AS TALLA,"
                    . "VD.Cantidad AS CANTIDAD,"
                    . "CONCAT('<strong class=\"text-primary\">$',CONVERT(varchar, CAST(VD.Precio AS money), 1),'</strong>') AS PRECIO,"
                    . "CONCAT('<strong class=\"text-danger\">$',CONVERT(varchar, CAST(VD.Descuento AS money), 1),'</strong>') AS DESCUENTO,"
                    . "CONCAT('<strong class=\"text-success\">$',CONVERT(varchar, CAST(VD.Subtotal AS money), 1),'</strong>') AS SUBTOTAL", false);
            $this->db->from('sz_VentasDetalle AS VD');
            $this->db->join('sz_Ventas AS V', 'V.ID = VD.Venta', 'left');
            $this->db->join('sz_Estilos AS E', 'E.ID = VD.Estilo', 'left');
            $this->db->join('sz_Combinaciones AS C', 'C.ID = VD.Color', 'left');
            $this->db->where('VD.Venta', $ID);
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

    public function getVentabyID($ID) {
        try {
            $this->db->select("V.*", false);
            $this->db->from('sz_Ventas AS V');
            $this->db->where('V.ID', $ID);
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

    public function getSerieXEstilo($ESTILO) {
        try {
            $this->db->select("S.T1,S.T2,S.T3,S.T4,S.T5,
                S.T6,S.T7,S.T8,S.T9,S.T10,S.T11,S.T12,S.T13,S.T14,S.T15,
                S.T16,S.T17,S.T18,S.T19,S.T20,S.T21,S.T22", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_Series AS S', 'E.Serie = S.ID');
            $this->db->where('E.ID', $ESTILO);
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

    public function getExistenciasXTiendaXEstiloXColor($TIENDA, $ESTILO, $COLOR) {
        try {
            $this->db->select("EX.Ex1       ,EX.Ex2      ,EX.Ex3      ,EX.Ex4      ,EX.Ex5      ,EX.Ex6
      ,EX.Ex7      ,EX.Ex8      ,EX.Ex9      ,EX.Ex10      ,EX.Ex11      ,EX.Ex12      ,EX.Ex13      ,EX.Ex14
      ,EX.Ex15      ,EX.Ex16      ,EX.Ex17      ,EX.Ex18      ,EX.Ex19      ,EX.Ex20      ,EX.Ex21      ,EX.Ex22, EX.Precio, EX.PrecioMenudeo, EX.PrecioMayoreo", false);
            $this->db->from('sz_Existencias AS EX');
            $this->db->where('EX.Tienda', $TIENDA);
            $this->db->where('EX.Estilo', $ESTILO);
            $this->db->where('EX.Color', $COLOR);
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
      
    public function onModificarExistencias($Tienda, $Estilo, $Color, $data, $index) {
        try {
            $this->db->where('Tienda', $Tienda);
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Color', $Color);
            $this->db->set("Ex$index", $data);
            $this->db->update("sz_Existencias");

            $str = $this->db->last_query();
//            print $str;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    } 
}
