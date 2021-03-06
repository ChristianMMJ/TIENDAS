<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Devoluciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getVentas() {
        try {
            $this->db->select(" V.ID, CONCAT(T.Clave, ' - ',T.RazonSocial) AS TIENDA, "
                            . "V.FolioTienda AS FOLIO, CONCAT(C.Clave, ' - ',C.RazonSocial) AS CLIENTE, "
                            . "V.FechaCreacion AS \"FECHA DE CREACION\", "
                            . "CONCAT('<strong class=\"text-success\">$', FORMAT(V.Importe,2),'</strong>') AS IMPORTE,"
                            . "CONCAT('<button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"getVentaXID(this)\">',"
                            . "'<span class=\"fa fa-check\"></span><br><strong>Seleccionar</strong></button>') AS ACCIONES", false)
                    ->from('sz_ventas AS V')
                    ->join('sz_tiendas AS T', 'V.Tienda = T.ID', 'left')
                    ->join('sz_clientes AS C', 'V.Cliente = C.ID', 'left')
                    ->where_in('V.Estatus', array('CERRADA'));
            if (in_array($this->session->userdata["Tipo"], array('VENDEDOR'))) {
//                $this->db->where('V.Vendedor', $this->session->userdata["ID"]);
            }
            return $this->db->where_not_in('V.Tipo', array('D'))
                            ->where_in('T.Estatus', array('ACTIVO'))
                            ->where('V.Tienda', $this->session->userdata('TIENDA'))
                            ->where('V.ID NOT IN (SELECT D.Venta FROM sz_devoluciones AS D)', null, false)
                            ->where('(DATEDIFF(str_to_date(V.FechaCreacion, \'%d/%m/%Y\') , NOW()) *-1) <= 90', null, false)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDevolucionesX() {
        try {
            $this->db->select(" V.ID, CONCAT(T.Clave, ' - ',T.RazonSocial) AS TIENDA, "
                            . "V.FolioTienda AS FOLIO, CONCAT(C.Clave, ' - ',C.RazonSocial) AS CLIENTE, "
                            . "V.FechaCreacion AS \"FECHA DE CREACION\", "
                            . "CONCAT('<strong class=\"text-success\">$', FORMAT(D.Importe,2),'</strong>') AS IMPORTE,"
                            . "CONCAT('<button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"getVentaXID(this)\">',"
                            . "'<span class=\"fa fa-check\"></span><br><strong>Seleccionar</strong></button>') AS ACCIONES", false)
                    ->from('sz_ventas AS V')
                    ->join('sz_tiendas AS T', 'V.Tienda = T.ID', 'left')
                    ->join('sz_clientes AS C', 'V.Cliente = C.ID', 'left')
                    ->join('sz_devoluciones AS D', 'V.ID = D.Venta', 'left')
                    ->where_in('V.Estatus', array('CERRADA'));
            $this->db->where_in('V.Tipo', array('D'))
                    ->where_in('T.Estatus', array('ACTIVO'))
                    ->where('V.Tienda', $this->session->userdata('TIENDA'));
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

    public function getDevoluciones() {
        try {
            $this->db->select("D.ID AS ID, T.RazonSocial AS TIENDA, D.FolioTienda AS FOLIO, "
                    . "CL.RazonSocial AS CLIENTE, D.FechaCreacion AS \"FECHA DE CREACION\" , "
                    . "CONCAT('<strong class=\"text-success\">$',FORMAT(D.Importe,2),'</span>') AS IMPORTE", false)
                    ->from('sz_devoluciones AS D')
                    ->join('sz_tiendas AS T', 'D.Tienda = T.ID', 'left')
                    ->join('sz_clientes AS CL', 'D.Cliente = CL.ID', 'left')
                    ->where('D.Tienda', $this->session->userdata('TIENDA'));
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
                            . "CONCAT('<strong class=\"text-warning\">$',FORMAT(VD.Precio, 2),'</strong>') AS PRECIO,"
                            . "CONCAT('<strong class=\"text-danger\">$',FORMAT(VD.Descuento , 2),'</strong>') AS DESCUENTO,"
                            . "CONCAT('<strong class=\"text-success\">$',FORMAT(VD.Subtotal, 2),'</strong>') AS SUBTOTAL", false)
                    ->from('sz_ventasdetalle AS VD')
                    ->join('sz_ventas AS V', 'V.ID = VD.Venta', 'left')
                    ->join('sz_estilos AS E', 'E.ID = VD.Estilo', 'left')
                    ->join('sz_combinaciones AS C', 'C.ID = VD.Color', 'left')
                    ->where('V.Tipo', 'V')
                    ->where('V.ID NOT IN (SELECT D.Venta FROM sz_devoluciones AS D)', null, false)
                    ->where('VD.Venta', $ID);
            $query = $this->db->get();
//            print $str = $this->db->last_query();
            return $query->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getCatalogosByFielID($FieldId) {
        try {
            $this->db->select("U.ID, CONCAT(U.IValue,' ',U.SValue) AS SValue", false)->from('sz_catalogos AS U')
                    ->where('U.FieldId', $FieldId)->where_in('U.Estatus', 'ACTIVO')->order_by("U.IValue", "ASC");
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

    public function getCombinacionesXEstilo($Estilo) {
        try {
            $this->db->select("U.ID, CONCAT(U.Clave,'-', U.Descripcion) AS Descripcion ", false)
                    ->from('sz_combinaciones AS U')->where_in('U.Estilo', $Estilo)->where_in('U.Estatus', 'ACTIVO');
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

    public function getSerieXEstiloConClave($Estilo) {
        try {
            $this->db->select("S.*, E.Clave AS ClaveEstilo", false)
                    ->from('sz_estilos AS E')
                    ->join('sz_series AS S', 'E.Serie = S.ID', 'left')
                    ->where('E.ID', $Estilo);
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
            return $this->db->select("V.*", false)
                            ->from('sz_ventas AS V')
                            ->where('V.ID', $ID)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_ventas", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($array) {
        try {
            $this->db->insert("sz_ventasdetalle", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDevolucion($array) {
        try {
            $this->db->insert("sz_devoluciones", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDevolucionDetalle($array) {
        try {
            $this->db->insert("sz_devolucionesdetalle", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstilo($ESTILO) {
        try {
            return $this->db->select("S.T1,S.T2,S.T3,S.T4,S.T5,
                S.T6,S.T7,S.T8,S.T9,S.T10,S.T11,S.T12,S.T13,S.T14,S.T15,
                S.T16,S.T17,S.T18,S.T19,S.T20,S.T21,S.T22", false)
                            ->from('sz_estilos AS E')
                            ->join('sz_series AS S', 'E.Serie = S.ID')
                            ->where('E.ID', $ESTILO)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXTiendaXEstiloXColor($TIENDA, $ESTILO, $COLOR) {
        try {
            return $this->db->select("EX.Ex1       ,EX.Ex2      ,EX.Ex3      ,EX.Ex4      ,EX.Ex5      ,EX.Ex6
      ,EX.Ex7      ,EX.Ex8      ,EX.Ex9      ,EX.Ex10      ,EX.Ex11      ,EX.Ex12      ,EX.Ex13      ,EX.Ex14
      ,EX.Ex15      ,EX.Ex16      ,EX.Ex17      ,EX.Ex18      ,EX.Ex19      ,EX.Ex20      ,EX.Ex21      ,EX.Ex22, 
      EX.Precio, EX.PrecioMenudeo, EX.PrecioMayoreo", false)
                            ->from('sz_existencias AS EX')
                            ->where('EX.Tienda', $TIENDA)
                            ->where('EX.Estilo', $ESTILO)
                            ->where('EX.Color', $COLOR)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarExistencias($Tienda, $Estilo, $Color, $data, $index) {
        try {
            $this->db->where('Tienda', $Tienda)
                    ->where('Estilo', $Estilo)
                    ->where('Color', $Color)
                    ->set("Ex$index", $data)
                    ->update("sz_existencias");
            $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select("E.ID, E.Clave, CONCAT(E.Clave,'-',E.Descripcion) AS Descripcion ", false)
                            ->from('sz_estilos AS E')
                            ->join('sz_existencias as EX', 'E.ID = EX.Estilo')
                            ->where_in('E.Estatus', 'ACTIVO')
                            ->where('EX.Tienda', $this->session->userdata('TIENDA'))
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacion($Estilo, $combinacion) {
        try {
            return $this->db->select("EX.ID AS ID, 
                                    EX.Estilo AS ESTILO_ID,
                                    EX.Color AS COLOR_ID,
                                    CONCAT(ES.Clave, ' ',ES.Descripcion) AS ESTILO, 
                                    CONCAT(CO.Clave, ' ',CO.Descripcion) AS COLOR,
                                    EX.PrecioMenudeo AS PRECIO", false)
                            ->from('sz_existencias AS EX')
                            ->join('sz_estilos AS ES', 'EX.Estilo = ES.ID')
                            ->join('sz_combinaciones AS CO', 'EX.Color = CO.ID')
                            ->where('EX.Tienda', $this->session->userdata('TIENDA'))
                            ->where('EX.Estilo', $Estilo)
                            ->where('EX.Color', $combinacion)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciasXEstiloXCombinacionT($Estilo, $combinacion) {
        try {
            $this->db->select("U.* "
                    . " ", false);
            $this->db->from('sz_existencias AS U')
                    ->where('U.Tienda', $this->session->userdata('TIENDA'))
                    ->where('U.Estilo', $Estilo)->where('U.Color', $combinacion);
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

    public function getVentaXTicket($ID) {
        try {
            return
                            $this->db->select('V.TipoDoc TIPODOC,   V.FolioTienda AS FOLIO, C.RazonSocial AS CLIENTE, CONCAT(E.PrimerNombre, \' \',E.ApellidoP) AS VENDEDOR, 
	   V.FechaCreacion AS FECHA_DE_CREACION, V.FechaMov AS FECHA_MOV, CA.SValue AS METODO_PAGO, V.Estatus AS ESTATUS, V.SuPago AS SUPAGO
      ,V.Importe  AS IMPORTE_VENTA    ,V.Usuario      ,V.Tipo, T.RazonSocial AS TIENDA, 
      CONCAT(T.Direccion,\' #\', T.NoExt,\', \',T.Colonia,\' \', T.Ciudad,\', \', T.Estado,\' C.P \',T.CP) AS DIRECCION,
      CONCAT(T.Ciudad,\',\',T.Estado) AS LUGAR_EXPEDICION, V.ImporteEnLetra  AS TOTAL_EN_LETRA,V.Tienda AS TIENDA_ID, T.Foto AS FOTO_TIENDA,
      (SELECT SUM(VD.Descuento) FROM sz_ventasdetalle AS VD WHERE VD.Venta = V.ID) AS DESCUENTO_TOTAL, V.Tipo AS TIPO_VD', false)
                            ->from('sz_ventas AS V')
                            ->join('sz_tiendas AS T', 'V.Tienda = T.ID')
                            ->join('sz_clientes AS C', 'V.Cliente = C.ID')
                            ->join('sz_empleados AS E', 'V.Tienda = E.ID')
                            ->join('sz_catalogos AS CA', 'V.MetodoPago = CA.ID')
                            ->where('V.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDiferenciaTotalDevolucion($ID) {
        try {
            return $this->db->select('D.Importe AS IMPORTE_TOTAL_DEVOLUCION', false)
                            ->from('sz_ventas AS V')
                            ->join('sz_tiendas AS T', 'V.Tienda = T.ID')
                            ->join('sz_clientes AS C', 'V.Cliente = C.ID')
                            ->join('sz_empleados AS E', 'V.Tienda = E.ID')
                            ->join('sz_catalogos AS CA', 'V.MetodoPago = CA.ID')
                            ->join('sz_devoluciones AS D', 'D.Venta = V.ID')
                            ->where('V.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
