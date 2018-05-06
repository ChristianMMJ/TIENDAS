<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class existenciasCaptura_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select(" U.Ano AS 'Año', U.Mes "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where_in('U.Estatus', array('ACTIVO'));
            $this->db->order_by("U.Mes", "ASC");
            $this->db->order_by("U.Ano", "ASC");
            $this->db->group_by(array("U.Ano", "U.Mes"));
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

    public function getExistenciasXEstiloXCombinacion($Estilo, $combinacion) {
        try {
            $this->db->select("U.* "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Estilo', $Estilo);
            $this->db->where('U.Color', $combinacion);
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

    public function getExistenciasCapturaByMesByAno($Ano, $Mes) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Color AS IdColor,'
                    . 'CONCAT(E.Clave,\'-\',C.Descripcion) AS Estilo, '
                    . "Ex1, "
                    . "Ex2, "
                    . "Ex3, "
                    . "Ex4, "
                    . "Ex5, "
                    . "Ex6, "
                    . "Ex7, "
                    . "Ex8, "
                    . "Ex9, "
                    . "Ex10, "
                    . "Ex11, "
                    . "Ex12, "
                    . "Ex13, "
                    . "Ex14, "
                    . "Ex15, "
                    . "Ex16, "
                    . "Ex17, "
                    . "Ex18, "
                    . "Ex19, "
                    . "Ex20, "
                    . "Ex21, "
                    . "Ex22 "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
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

    public function onAgregarExistenciasCaptura($array) {
        try {
            $this->db->insert("sz_ExistenciasCaptura", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciasCaptura($Mes, $Ano, $Estilo, $Color, $Posicion, $CantidadNueva) {
        try {
            $DATA = array(
                $Posicion => $CantidadNueva
            );
            $this->db->where('Mes', $Mes);
            $this->db->where('Ano', $Ano);
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Color', $Color);
            $this->db->where('Tienda', $this->session->userdata('TIENDA'));
            $this->db->update("sz_ExistenciasCaptura", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_ExistenciasCaptura");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
