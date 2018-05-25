<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class reportesVentas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTiendas($TipoDoc, $Tienda, $MetodoPago, $FechaIni, $FechaFin) {
        try {
            if ($Tienda === 'TODAS' || $Tienda === '') {
                $Tienda = "";
            }
            if ($MetodoPago === 'TODAS' || $MetodoPago === '') {
                $Tienda = "";
            }
            if ($FechaIni === '') {
                $FechaIni = "";
            }
            if ($FechaFin === '') {
                $FechaFin = "";
            }
            $this->db->select("T.ID AS IdTienda, CONCAT(T.Clave,'-', T.RazonSocial) AS 'Tienda' ", false);
            $this->db->from('sz_Ventas AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->like('U.TipoDoc', $TipoDoc);
            $this->db->where_in('U.Estatus', array('CERRADA'));
            $this->db->like('U.Tienda', $Tienda, 'before');
            $this->db->where('U.FechaMov >=', $FechaIni);
            $this->db->where('U.FechaMov <=', $FechaFin);
            $this->db->where('T.Empresa', $this->session->userdata('EMPRESA'));
            $this->db->order_by("T.Clave", "ASC");
            $this->db->group_by(array('T.ID', 'T.Clave', 'T.RazonSocial'));
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

    public function getVentasGenerales($TipoDoc, $Tienda, $MetodoPago, $FechaIni, $FechaFin) {
        try {
            if ($Tienda === 'TODAS' || $Tienda === '') {
                $Tienda = "";
            }
            if ($MetodoPago === 'TODAS' || $MetodoPago === '') {
                $Tienda = "";
            }
            if ($FechaIni === '') {
                $FechaIni = "";
            }
            if ($FechaFin === '') {
                $FechaFin = "";
            }
            $this->db->select("t.ID AS IdTienda,"
                    . "T.RazonSocial AS Tienda ,"
                    . "CONCAT(U.TipoDoc,'-',U.FolioTienda)AS Folio,"
                    . "U.FechaMov,"
                    . "Ct.RazonSocial AS Cliente,"
                    . "US.Usuario, "
                    . "U.Importe,"
                    . "MP.SValue AS MetodoPago "
                    . " ", false);
            $this->db->from('sz_Ventas AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->join('sz_Clientes AS Ct', 'U.Cliente = Ct.ID', 'left');
            $this->db->join('sz_Catalogos AS MP', 'U.MetodoPago = MP.ID', 'left');
            $this->db->like('U.TipoDoc', $TipoDoc);
            $this->db->where_in('U.Estatus', array('CERRADA'));
            $this->db->like('U.Tienda', $Tienda, 'before');
            $this->db->where('U.FechaMov >=', $FechaIni);
            $this->db->where('U.FechaMov <=', $FechaFin);
            $this->db->order_by("U.TipoDoc", "ASC");
            $this->db->order_by("U.FolioTienda", "ASC");
            $query = $this->db->get();
            $str = $this->db->last_query();
            //print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
