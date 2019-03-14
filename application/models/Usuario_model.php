<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            return $this->db->select("U.ID, U.Usuario, U.Estatus, U.Tipo, CONCAT(IFNULL(T.Clave,''),'-',IFNULL(T.RazonSocial,'')) as Tienda ", false)
                            ->from('sz_usuarios AS U')
                            ->join('sz_tiendas AS T', 'U.Tienda = T.ID', 'left')
                            ->where_in('U.Estatus', 'ACTIVO')
                            ->like('U.Tienda', $Tienda, 'before')->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getAcceso($USUARIO, $CONTRASENA) {
        try {
            $this->db->select('U.*,T.RazonSocial, E.ID AS EmpresaID, E.Foto AS FotoEmpresa,T.Clave AS CLAVE_TIENDA ', false)
                    ->from('sz_usuarios AS U')
                    ->join('sz_tiendas AS T', 'U.Tienda = T.ID', 'left')
                    ->join('sz_empresas AS E', 'T.Empresa = E.ID', 'left')
                    ->where('U.Usuario', $USUARIO)
                    ->where('U.Contrasena', $CONTRASENA)
                    ->where_in('U.Estatus', 'ACTIVO');
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
            $this->db->insert("sz_usuarios", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_usuarios", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("sz_usuarios");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getUsuarioByID($ID) {
        try {
            $this->db->select('U.*', false)->from('sz_usuarios AS U')->where('U.ID', $ID)->where_in('U.Estatus', 'ACTIVO');
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

    public function getContrasena($USUARIO) {
        try {
            $this->db->select('U.Contrasena', false)->from('sz_usuarios AS U')->where('U.Usuario', $USUARIO)->where_in('U.Estatus', 'Activo');
            $query = $this->db->get();
            /*
             * FOR DEBUG ONLY
             */
            $str = $this->db->last_query();
//       print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
