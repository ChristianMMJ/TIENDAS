<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class traspasos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.ID, ISNULL(U.DocMov,'') AS Documento , "
                    . "U.dTienda as 'De Tienda', "
                    . "U.Tienda as 'A Tienda', "
                    . "(CASE WHEN  U.Estatus ='ACTIVO' "
                    . "THEN CONCAT('<h5><span class=''badge badge-info''>','ACTIVO','</span><h5>') "
                    . "WHEN  U.Estatus ='AFECTADO' "
                    . "THEN CONCAT('<h5><span class=''badge badge-success''>','AFECTADO','</span></h5>') "
                    . "END) AS Estatus ,"
                    . "U.FechaMov as 'Fecha Movimiento', "
                    . "US.Usuario AS 'Usuario' "
                    . " ", false);
            $this->db->from('sz_Traspasos AS U');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("U.DocMov", "ASC");
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
            $this->db->insert("sz_Traspasos", $array);
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
            $this->db->insert("sz_TraspasosDetalle", $array);
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
            $this->db->update("sz_Traspasos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $Compra, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->where('Traspaso', $Compra);
            $this->db->update("sz_TraspasosDetalle", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Traspasos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTraspasoByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Traspasos AS U');
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

    public function getTraspasoDetalleByID($ID) {
        try {
            $this->db->select('CD.ID AS ID, CD.Estilo AS IdEstilo, CD.Color AS IdColor,'
                    . 'CONCAT(E.Clave,\'-\',E.Descripcion) AS Estilo,'
                    . 'CONCAT(C.Clave,\'-\',C.Descripcion) AS Color,'
                    . 'CD.Talla AS Talla,'
                    . 'CD.Cantidad AS Cantidad ', false);
            $this->db->from('sz_CompraDetalle AS CD');
            $this->db->join('sz_Estilos AS E', 'CD.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'CD.Color = C.ID');
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
            $this->db->from('sz_TraspasosDetalle AS CD ');
            $this->db->where('CD.Traspaso', $Compra);
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

    public function getExistenciasByIDs($Tienda, $Estilo, $Color) {
        try {
            $this->db->select('E.Ex1      ,E.Ex2      ,E.Ex3      ,E.Ex4
      ,E.Ex5      ,E.Ex6      ,E.Ex7      ,E.Ex8
      ,E.Ex9      ,E.Ex10      ,E.Ex11      ,E.Ex12
      ,E.Ex13      ,E.Ex14      ,E.Ex15      ,E.Ex16
      ,E.Ex17      ,E.Ex18      ,E.Ex19      ,E.Ex20
      ,E.Ex21      ,E.Ex22', false);
            $this->db->from('sz_Existencias AS E');
            $this->db->where('E.Tienda', $Tienda);
            $this->db->where('E.Estilo', $Estilo);
            $this->db->where('E.Color', $Color);
            $this->db->where_in('E.Estatus', '1');
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
