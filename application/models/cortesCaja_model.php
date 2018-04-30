<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class cortesCaja_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select("U.ID, "
                    . "U.FechaCreacion as 'Fecha Corte ', "
                    . "US.Usuario AS 'Usuario' ", false);
            $this->db->from('sz_CortesCaja AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
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

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_CortesCaja", $array);
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
            $this->db->update("sz_CortesCaja", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarGastos($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_Gastos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarVentas($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_Ventas", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDiversos($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_Diversos", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaVentas($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_Ventas");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaGastos($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_Gastos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarCorteCajaDiversos($ID) {
        try {
            $this->db->where('CorteCaja', $ID);
            $this->db->set('CorteCaja', 'NULL', false);
            $this->db->update("sz_Diversos");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_CortesCaja");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCorteCajaByID($ID) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_CortesCaja AS U');
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

    public function getDetalleNuevo() {
        try {
            $query = $this->db->query("
SELECT V.FolioTienda AS Documento, V.FechaCreacion AS Fecha, 'VENTA: '+ CT.RazonSocial AS Cliente,V.Importe, V.ID
FROM sz_Ventas V
left join sz_Clientes CT ON CT.ID = v.Cliente
WHERE V.Estatus = 'CERRADA'
AND V.CorteCaja IS NULL
AND V.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT G.DocMov AS Documento, G.FechaCreacion AS Fecha, 'GASTO' AS Cliente, -G.Importe, G.ID
FROM sz_Gastos G
WHERE G.Estatus = 'ACTIVO'
AND G.CorteCaja IS NULL
AND G.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, D.FechaCreacion AS Fecha, D.Concepto +': '+ D.Motivo AS Cliente, D.Importe, D.ID
FROM sz_Diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja IS NULL
AND D.Concepto ='ENTRADA'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, D.FechaCreacion AS Fecha, D.Concepto +': '+ D.Motivo AS Cliente, -D.Importe, D.ID
FROM sz_Diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja IS NULL
AND D.Concepto ='RETIRO'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "



ORDER BY FechaCreacion DESC ");

            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDetalleByID($ID) {
        try {
            $query = $this->db->query("
SELECT V.FolioTienda AS Documento, V.FechaCreacion AS Fecha, 'VENTA: '+ CT.RazonSocial AS Cliente,V.Importe, V.ID
FROM sz_Ventas V
left join sz_Clientes CT ON CT.ID = v.Cliente
WHERE V.Estatus = 'CERRADA'
AND V.CorteCaja = " . $ID . "
AND V.Tienda = " . $this->session->userdata('TIENDA') . "


UNION

SELECT G.DocMov AS Documento, G.FechaCreacion AS Fecha, 'GASTO' AS Cliente, -G.Importe, G.ID
FROM sz_Gastos G
WHERE G.Estatus = 'ACTIVO'
AND G.CorteCaja = " . $ID . "
AND G.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, D.FechaCreacion AS Fecha, D.Concepto +': '+ D.Motivo AS Cliente, D.Importe, D.ID
FROM sz_Diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja = " . $ID . "
AND D.Concepto ='ENTRADA'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "

UNION

SELECT '' AS Documento, D.FechaCreacion AS Fecha, D.Concepto +': '+ D.Motivo AS Cliente, -D.Importe, D.ID
FROM sz_Diversos D
WHERE D.Estatus = 'ACTIVO'
AND D.CorteCaja = " . $ID . "
AND D.Concepto ='RETIRO'
AND D.Tienda = " . $this->session->userdata('TIENDA') . "


ORDER BY FechaCreacion DESC ");

            $str = $this->db->last_query();
            $data = $query->result();
            return $data;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
