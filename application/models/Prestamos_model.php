<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Prestamos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("EM.ID AS NoEmp, "
                    . "CONCAT(EM.PrimerNombre,' ',EM.SegundoNombre,' ',EM.ApellidoP,' ',EM.ApellidoM) AS Empleado, "
                    . "T.RazonSocial AS Tienda"
                    . " ", false);
            $this->db->from('sz_prestamos AS P');
            $this->db->join('sz_tiendas AS T', 'T.ID =  P.Tienda', 'left');
            $this->db->join('sz_empleados AS EM', 'P.Empleado = EM.ID', 'left');
            $this->db->like('P.Tienda', $Tienda, 'before');
            $this->db->where_in('P.Estatus', array('ACTIVO'));
            $this->db->group_by(array('EM.ID', 'EM.PrimerNombre', 'EM.SegundoNombre', 'EM.ApellidoP', 'EM.ApellidoM', 'T.RazonSocial'));
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
            $this->db->insert("sz_prestamos", $array);
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
            $this->db->update("sz_prestamos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarGastos($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_gastos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarVentas($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_ventas", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDiversos($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_diversos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaVentas($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_ventas");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaGastos($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_gastos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaDiversos($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_diversos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_prestamos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCorteCajaByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_prestamos AS U');
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
            $this->db->select('U.*', false);
            $this->db->from('sz_prestamos AS U');
            $this->db->where('U.ID', $ID);
            $query = $this->db->get();

            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
