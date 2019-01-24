<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class CortesCaja_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("U.ID, "
                    . "U.FechaCreacion as 'Fecha Corte ', "
                    . "US.Usuario AS 'Usuario' ", false)
                    ->from('sz_cortescaja AS U')
                    ->join('sz_tiendas AS T', 'U.Tienda = T.ID', 'left')
                    ->join('sz_usuarios AS US', 'U.Usuario = US.ID', 'left')
                    ->like('U.Tienda', $Tienda, 'before')
                    ->where_in('U.Estatus', array('ACTIVO'));
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
            $this->db->insert("sz_cortescaja", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificar($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_cortescaja", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarGastos($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_gastos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarVentas($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_ventas", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDiversos($ID, $DATA) {
        try {
            $this->db->where('ID', $ID)->update("sz_diversos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaVentas($ID) {
        try {
            $this->db->where('CorteCaja', $ID)->set('CorteCaja', 'NULL', false)->update("sz_ventas");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaGastos($ID) {
        try {
            $this->db->where('CorteCaja', $ID)->set('CorteCaja', 'NULL', false)->update("sz_gastos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaDiversos($ID) {
        try {
            $this->db->where('CorteCaja', $ID)->set('CorteCaja', 'NULL', false)->update("sz_diversos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO')->where('ID', $ID)->update("sz_cortescaja");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCorteCajaByID($ID) {
        try {
            $this->db->select('U.*', false)->from('sz_cortescaja AS U')->where('U.ID', $ID);
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

    public function getDetalleNuevo() {
        try {
            $query = $this->db->query("
SELECT V.FolioTienda AS Documento, V.FechaCreacion AS Fecha,CONCAT( 'VENTA: ', CT.RazonSocial) AS Cliente,V.Importe, V.ID
FROM sz_ventas V
left join sz_clientes CT ON CT.ID = V.Cliente
WHERE V.Estatus = 'CERRADA'
AND V.CorteCaja IS NULL
AND V.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT G.DocMov AS Documento, G.FechaCreacion AS Fecha, 'GASTO' AS Cliente, -G.Importe, G.ID
FROM sz_gastos G
WHERE G.Estatus = 'ACTIVO'
AND G.CorteCaja IS NULL
AND G.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, D.FechaCreacion AS Fecha,CONCAT(D.Concepto ,': ', D.Motivo) AS Cliente, D.Importe, D.ID
FROM sz_diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja IS NULL
AND D.Concepto ='ENTRADA'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, D.FechaCreacion AS Fecha, CONCAT(D.Concepto ,': ', D.Motivo) AS Cliente, -D.Importe, D.ID
FROM sz_diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja IS NULL
AND D.Concepto ='RETIRO'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "

ORDER BY Fecha DESC ");

            $str = $this->db->last_query();
//            print $str;
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($ID) {
        try {
            $query = $this->db->query("
SELECT V.FolioTienda AS Documento, STR_TO_DATE( V.FechaCreacion ,'%d/%m/%Y %h:%i:%s %p')  AS Fecha, CONCAT( 'VENTA: ', CT.RazonSocial) AS Cliente,V.Importe, V.ID
FROM sz_ventas V
left join sz_clientes CT ON CT.ID = V.Cliente
WHERE V.Estatus = 'CERRADA'
AND V.CorteCaja = " . $ID . "
AND V.Tienda = " . $this->session->userdata('TIENDA') . "


UNION

SELECT G.DocMov AS Documento, STR_TO_DATE( G.FechaCreacion ,'%d/%m/%Y %h:%i:%s %p') AS Fecha, 'GASTO' AS Cliente, -G.Importe, G.ID
FROM sz_gastos G
WHERE G.Estatus = 'ACTIVO'
AND G.CorteCaja = " . $ID . "
AND G.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, STR_TO_DATE( D.FechaCreacion ,'%d/%m/%Y %h:%i:%s %p') AS Fecha, CONCAT(D.Concepto ,': ', D.Motivo) AS Cliente , D.Importe, D.ID
FROM sz_diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja = " . $ID . "
AND D.Concepto ='ENTRADA'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, STR_TO_DATE(D.FechaCreacion ,'%d/%m/%Y %h:%i:%s %p') AS Fecha, CONCAT(D.Concepto ,': ', D.Motivo) AS Cliente, -D.Importe, D.ID
FROM sz_diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja = " . $ID . "
AND D.Concepto ='RETIRO'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "


ORDER BY Fecha DESC ");

            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
