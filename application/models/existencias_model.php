<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class existencias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
     public function getExistenciasByTienda($Tienda) {
        try {
            $this->db->select("U.ID, E.Clave +'-'+ E.Descripcion AS 'Estilo' , C.Clave +'-'+ c.Descripcion AS 'Color' "
                    . "", false);
            $this->db->from('sz_Existencias AS U');
             $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
             $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
             $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->where_in('U.Tienda', $Tienda);
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

    public function onComprobarExistencias($Tienda, $Estilo, $Color) {
        try {
            $this->db->select("E.*", false);
            $this->db->from('sz_Existencias AS E');
            $this->db->where('E.Tienda', $Tienda);
            $this->db->where('E.Estilo', $Estilo);
            $this->db->where('E.Color', $Color);
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
            $this->db->insert("sz_Existencias", $array);
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
            $this->db->update("sz_Existencias", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarEstatusExistencias($ID, $DATA) {
        try {
            $DATOS = array(
                'Estatus' => $DATA
            );
            $this->db->where('Documento', $ID);
            $this->db->update("sz_Existencias", $DATOS);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', '0');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Existencias");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciaByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Existencias AS U');
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

}