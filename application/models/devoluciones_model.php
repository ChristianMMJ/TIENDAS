<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class devoluciones_model extends CI_Model {

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
                    ->from('sz_Ventas AS V')
                    ->join('sz_Tiendas AS T', 'V.Tienda = T.ID', 'left')
                    ->join('sz_Clientes AS C', 'V.Cliente = C.ID', 'left')
                    ->where_in('V.Estatus', array('CERRADA'));
            if (in_array($this->session->userdata["Tipo"], array('VENDEDOR'))) {
//                $this->db->where('V.Vendedor', $this->session->userdata["ID"]);
            }
            return $this->db->where_not_in('V.Tipo', array('D'))
                            ->where_in('T.Estatus', array('ACTIVO'))
                            ->where('V.Tienda', $this->session->userdata('TIENDA'))
                            ->where('V.ID NOT IN (SELECT D.Venta FROM sz_Devoluciones AS D)', null, false)
                            ->where('(DATEDIFF(str_to_date(V.FechaCreacion, \'%d/%m/%Y\') , NOW()) *-1) <= 90', null, false)
                            ->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDevoluciones() {
        try {
            $this->db->select(" V.ID, CONCAT(T.Clave, ' - ',T.RazonSocial) AS TIENDA, "
                            . "V.FolioTienda AS FOLIO, CONCAT(C.Clave, ' - ',C.RazonSocial) AS CLIENTE, "
                            . "V.FechaCreacion AS \"FECHA DE CREACION\", "
                            . "CONCAT('<strong class=\"text-success\">$', FORMAT(V.Importe,2),'</strong>') AS IMPORTE,"
                            . "CONCAT('<button type=\"button\" class=\"btn btn-outline-danger\" onclick=\"getVentaXID(this)\">',"
                            . "'<span class=\"fa fa-check\"></span><br><strong>Seleccionar</strong></button>') AS ACCIONES", false)
                    ->from('sz_Ventas AS V')
                    ->join('sz_Tiendas AS T', 'V.Tienda = T.ID', 'left')
                    ->join('sz_Clientes AS C', 'V.Cliente = C.ID', 'left')
                    ->where_in('V.Estatus', array('CERRADA'));
            return $this->db->where_not_in('V.Tipo', array('V'))
                            ->where_in('T.Estatus', array('ACTIVO'))
                            ->where('V.Tienda', $this->session->userdata('TIENDA'))
                            ->where('V.ID IN (SELECT D.Venta FROM sz_Devoluciones AS D)', null, false)
                            ->get()->result();
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
                            ->from('sz_VentasDetalle AS VD')
                            ->join('sz_Ventas AS V', 'V.ID = VD.Venta', 'left')
                            ->join('sz_Estilos AS E', 'E.ID = VD.Estilo', 'left')
                            ->join('sz_Combinaciones AS C', 'C.ID = VD.Color', 'left')
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
            $this->db->select("U.ID, CONCAT(U.IValue,' ',U.SValue) AS SValue", false);
            $this->db->from('sz_Catalogos AS U');
            $this->db->where('U.FieldId', $FieldId);
            $this->db->where_in('U.Estatus', 'ACTIVO');
            $this->db->order_by("U.IValue", "ASC");
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
            $this->db->select("U.ID, CONCAT(U.Clave,'-', U.Descripcion) AS Descripcion ", false);
            $this->db->from('sz_Combinaciones AS U');
            $this->db->where_in('U.Estilo', $Estilo);
            $this->db->where_in('U.Estatus', 'ACTIVO');
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
            $this->db->select("S.*, E.Clave AS ClaveEstilo", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_Series AS S', 'E.Serie = S.ID', 'left');
            $this->db->where('E.ID', $Estilo);
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
                            ->from('sz_Ventas AS V')
                            ->where('V.ID', $ID)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Ventas", $array);
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
            $this->db->insert("sz_VentasDetalle", $array);
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
            $this->db->insert("sz_Devoluciones", $array);
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
            $this->db->insert("sz_DevolucionesDetalle", $array);
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
                            ->from('sz_Estilos AS E')
                            ->join('sz_Series AS S', 'E.Serie = S.ID')
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
                            ->from('sz_Existencias AS EX')
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
                    ->update("sz_Existencias");
            $str = $this->db->last_query();
            print $str;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getEstilos() {
        try {
            return $this->db->select("E.ID, E.Clave, CONCAT(E.Clave,'-',E.Descripcion) AS Descripcion ", false)
                            ->from('sz_Estilos AS E')
                            ->join('sz_Existencias as EX', 'E.ID = EX.Estilo')
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
                            ->from('sz_Existencias AS EX')
                            ->join('sz_Estilos AS ES', 'EX.Estilo = ES.ID')
                            ->join('sz_Combinaciones AS CO', 'EX.Color = CO.ID')
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
            $this->db->from('sz_Existencias AS U');
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

    public function getVentaXTicket($ID) {
        try {
            return
                            $this->db->select('V.TipoDoc TIPODOC,   V.FolioTienda AS FOLIO, C.RazonSocial AS CLIENTE, CONCAT(E.PrimerNombre, \' \',E.ApellidoP) AS VENDEDOR, 
	   V.FechaCreacion AS FECHA_DE_CREACION, V.FechaMov AS FECHA_MOV, CA.SValue AS METODO_PAGO, V.Estatus AS ESTATUS, V.SuPago AS SUPAGO
      ,V.Importe  AS IMPORTE_VENTA    ,V.Usuario      ,V.Tipo, T.RazonSocial AS TIENDA, 
      CONCAT(T.Direccion,\' #\', T.NoExt,\', \',T.Colonia,\' \', T.Ciudad,\', \', T.Estado,\' C.P \',T.CP) AS DIRECCION,
      CONCAT(T.Ciudad,\',\',T.Estado) AS LUGAR_EXPEDICION, V.ImporteEnLetra  AS TOTAL_EN_LETRA,V.Tienda AS TIENDA_ID, T.Foto AS FOTO_TIENDA,
      (SELECT SUM(VD.Descuento) FROM sz_VentasDetalle AS VD WHERE VD.Venta = V.ID) AS DESCUENTO_TOTAL, V.Tipo AS TIPO_VD', false)
                            ->from('sz_Ventas AS V')
                            ->join('sz_Tiendas AS T', 'V.Tienda = T.ID')
                            ->join('sz_Clientes AS C', 'V.Cliente = C.ID')
                            ->join('sz_Empleados AS E', 'V.Tienda = E.ID')
                            ->join('sz_Catalogos AS CA', 'V.MetodoPago = CA.ID')
                            ->where('V.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getDiferenciaTotalDevolucion($ID) {
        try {
            return $this->db->select('D.Importe AS IMPORTE_TOTAL_DEVOLUCION', false)
                            ->from('sz_Ventas AS V')
                            ->join('sz_Tiendas AS T', 'V.Tienda = T.ID')
                            ->join('sz_Clientes AS C', 'V.Cliente = C.ID')
                            ->join('sz_Empleados AS E', 'V.Tienda = E.ID')
                            ->join('sz_Catalogos AS CA', 'V.MetodoPago = CA.ID')
                            ->join('sz_Devoluciones AS D', 'D.Venta = V.ID')
                            ->where('V.ID', $ID)->get()->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
