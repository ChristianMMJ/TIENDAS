<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Compras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("U.ID, IFNULL(U.DocMov,'') AS Documento ,"
                    . "(CASE WHEN  U.Estatus ='ACTIVO' "
                    . "THEN CONCAT('<span class=''badge badge-info'' style=''font-size: 15px;'' >','EN TRANSITO','</span>') "
                    . "WHEN  U.Estatus ='AFECTADO' "
                    . "THEN CONCAT('<span class=''badge badge-success'' style=''font-size: 15px;''>','ENTRADA','</span>') "
                    . "END) AS Estatus ,"
                    . "CONCAT(T.Clave , '-',T.RazonSocial) AS 'Tienda' ,"
                    . "U.FechaMov as 'Fecha Movimiento ', "
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_compras AS U');
            $this->db->join('sz_tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where_in('U.Estatus', array('AFECTADO', 'ACTIVO'));
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
            $this->db->insert("sz_compras", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($array) {
        try {
            $this->db->insert("sz_compradetalle", $array);
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
            $this->db->update("sz_compras", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $Compra, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->where('Compra', $Compra);
            $this->db->update("sz_compradetalle", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_compradetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_compras");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCompraByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_compras AS U');
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

    public function getCompraDetalleByID($ID) {
        try {
            $this->db->select('CD.ID AS ID, CD.Estilo AS IdEstilo, CD.Color AS IdColor,'
                    . 'CONCAT(E.Clave,\'-\',E.Descripcion) AS Estilo,'
                    . 'CONCAT(C.Clave,\'-\',C.Descripcion) AS Color,'
                    . 'CD.Talla AS Talla,'
                    . 'CD.Cantidad AS Cantidad,'
                    . 'CD.Precio AS Precio,'
                    . 'CD.Subtotal AS SubTotal,'
                    . 'CD.EsCoTa', false);
            $this->db->from('sz_compradetalle AS CD');
            $this->db->join('sz_estilos AS E', 'CD.Estilo = E.ID');
            $this->db->join('sz_combinaciones AS C', 'CD.Color = C.ID');
            $this->db->where('CD.Compra', $ID);
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

    public function Existe($Estilo, $Color, $Talla, $Compra) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_compradetalle AS CD ');
            $this->db->where('CD.Compra', $Compra);
            $this->db->where('CD.Talla', $Talla);
            $this->db->where('CD.Color', $Color);
            $this->db->where('CD.Estilo', $Estilo);
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

    /* Reportes */

    public function getDetalleEtiquetas($ID) {
        try {
            $this->db->select('CD.ID AS ID, '
                    . 'Em.Foto As LogoEmpresa,'
                    . 'COMS.FechaMov As Fecha,'
                    . 'T.RazonSocial As Tienda,'
                    . 'CD.Estilo AS IdEstilo, '
                    . 'CD.Color AS IdColor,'
                    . 'E.Clave AS Estilo,'
                    . "CONCAT(C.Clave,' ',C.Descripcion) AS Color,"
                    . 'CD.Talla AS Talla,'
                    . 'CD.Cantidad AS Cantidad,'
                    . 'CD.EsCoTa', false);
            $this->db->from('sz_compradetalle AS CD');
            $this->db->join('sz_estilos AS E', 'CD.Estilo = E.ID');
            $this->db->join('sz_combinaciones AS C', 'CD.Color = C.ID');
            $this->db->join('sz_compras AS COMS', 'CD.Compra = COMS.ID');
            $this->db->join('sz_tiendas AS T', 'COMS.Tienda = T.ID');
            $this->db->join('sz_empresas AS Em', 'T.Empresa = Em.ID');
            $this->db->where('CD.Compra', $ID);
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
