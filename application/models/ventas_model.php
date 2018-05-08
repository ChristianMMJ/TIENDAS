<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class ventas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function onCrearFolio($Tp) {
        try {
            $this->db->select('MAX(U.FolioTienda) As FolioTienda ', false);
            $this->db->from('sz_Ventas AS U');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.TipoDoc', $Tp);
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
            $this->db->insert("sz_Ventas", $array);
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
            $this->db->insert("sz_VentasDetalle", $array);
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
            $this->db->update("sz_Ventas", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->update("sz_VentasDetalle", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarDetalle($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_VentasDetalle");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Ventas");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getVentaByFolioTiendaByTipoDocByTienda($FolioTienda, $TipoDoc) {
        try {
            $this->db->select('U.*', false);
            $this->db->from('sz_Ventas AS U');
            $this->db->where('U.FolioTienda', $FolioTienda);
            $this->db->where('U.TipoDoc', $TipoDoc);
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
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

    public function getVentaByID($ID) {
        try {
            $this->db->select('V.TipoDoc TIPODOC,   V.FolioTienda AS FOLIO, C.RazonSocial AS CLIENTE, CONCAT(E.PrimerNombre, \' \',E.ApellidoP) AS VENDEDOR, 
	   V.FechaCreacion AS FECHA_DE_CREACION, V.FechaMov AS FECHA_MOV, V.MetodoPago AS METODO_PAGO, V.Estatus
      ,V.Importe      ,V.Usuario      ,V.Tipo, T.RazonSocial AS TIENDA, 
      CONCAT(T.Direccion,\' #\', T.NoExt,\', \',T.Colonia,\' \', T.Ciudad,\', \', T.Estado,\' C.P \',T.CP) AS DIRECCION', false);
            $this->db->from('sz_Ventas AS V');
            $this->db->join('sz_Tiendas AS T', 'V.Tienda = T.ID');
            $this->db->join('sz_Clientes AS C', 'V.Cliente = C.ID');
            $this->db->join('sz_Empleados AS E', 'V.Tienda = E.ID');
            $this->db->where('V.ID', $ID);
//            $this->db->where('V.Tipo', 'V');
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

    public function getVentaDetalleByID($ID) {
        try {
            $this->db->select('CONCAT(ES.Clave,\' \',ES.Descripcion,\' \',CO.Descripcion,\' \',VD.Talla) AS ESCOTA,      VD.Cantidad AS CANTIDAD      ,VD.Precio AS PRECIO
      ,VD.Descuento AS DESCUENTO      ,VD.Subtotal AS SUBTOTAL      ,VD.PorcentajeDesc AS PORCENTAJE_DESCUENTO ', false);
            $this->db->from('sz_VentasDetalle AS VD');
            $this->db->join('sz_Estilos AS ES', 'VD.Estilo = ES.ID');
            $this->db->join('sz_Combinaciones AS CO', 'VD.Color = CO.ID');
            $this->db->where('VD.Venta', $ID);
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
            $this->db->select('VD.ID AS ID, '
                    . 'VD.Estilo AS IdEstilo, '
                    . 'VD.Color AS IdColor,'
                    . 'CONCAT(E.Clave,\'-\',E.Descripcion) AS Estilo,'
                    . 'CONCAT(C.Clave,\'-\',C.Descripcion) AS Color,'
                    . 'VD.Talla AS Talla,'
                    . 'VD.Cantidad AS Cantidad,'
                    . "  ''+ CONVERT(varchar, CAST(VD.Precio AS money), 1) AS Precio, "
                    . "  '$'+ CONVERT(varchar, CAST(VD.Descuento AS money), 1) AS 'Desc', "
                    . "  '$'+ CONVERT(varchar, CAST(VD.Subtotal AS money), 1) AS Sub, "
                    . 'VD.PorcentajeDesc AS PorDesc,'
                    //Eliminar
                    . "'<span class=''fa fa-trash-alt''></span>' AS Eliminar "
//                    . "'<span class=''fa fa-trash-alt'' "
//                    . "onclick=''onEliminarDetalle('+      "
//                    . "REPLACE(LTRIM(REPLACE(VD.ID, '0', ' ')), ' ', '0') +','+  "
//                    . "REPLACE(LTRIM(REPLACE(VD.Venta, '0', ' ')), ' ', '0') +','+ "
//                    . "REPLACE(LTRIM(REPLACE(VD.Estilo, '0', ' ')), ' ', '0') +','+ "
//                    . "REPLACE(LTRIM(REPLACE(VD.Color, '0', ' ')), ' ', '0') +','+ "
//                    . "REPLACE(LTRIM(REPLACE(VD.Talla, '0', ' ')), ' ', '0') +','+ "
//                    . "REPLACE(LTRIM(REPLACE(VD.Cantidad, '0', ' ')), ' ', '0')      "
//                    . "+')  ''></span>' AS Eliminar "
                    . " "
                    . '', false);
            $this->db->from('sz_VentasDetalle AS VD');
            $this->db->join('sz_Estilos AS E', 'VD.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'VD.Color = C.ID');
            $this->db->where('VD.Venta', $ID);
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

    public function Existe($Estilo, $Color, $Talla, $Venta) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_VentasDetalle AS VD ');
            $this->db->where('VD.Venta', $Venta);
            $this->db->where('VD.Talla', $Talla);
            $this->db->where('VD.Color', $Color);
            $this->db->where('VD.Estilo', $Estilo);
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

    public function getExistenciasXTiendaXEstiloXColor($TIENDA, $ESTILO, $COLOR) {
        try {
            $this->db->select("EX.Ex1       ,EX.Ex2      ,EX.Ex3      ,EX.Ex4      ,EX.Ex5      ,EX.Ex6
      ,EX.Ex7      ,EX.Ex8      ,EX.Ex9      ,EX.Ex10      ,EX.Ex11      ,EX.Ex12      ,EX.Ex13      ,EX.Ex14
      ,EX.Ex15      ,EX.Ex16      ,EX.Ex17      ,EX.Ex18      ,EX.Ex19      ,EX.Ex20      ,EX.Ex21      ,EX.Ex22, EX.Precio, EX.PrecioMenudeo, EX.PrecioMayoreo", false);
            $this->db->from('sz_Existencias AS EX');
            $this->db->where('EX.Tienda', $TIENDA);
            $this->db->where('EX.Estilo', $ESTILO);
            $this->db->where('EX.Color', $COLOR);
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

    public function getSerieXEstilo($ESTILO) {
        try {
            $this->db->select("S.T1,S.T2,S.T3,S.T4,S.T5,
                S.T6,S.T7,S.T8,S.T9,S.T10,S.T11,S.T12,S.T13,S.T14,S.T15,
                S.T16,S.T17,S.T18,S.T19,S.T20,S.T21,S.T22", false);
            $this->db->from('sz_Estilos AS E');
            $this->db->join('sz_Series AS S', 'E.Serie = S.ID');
            $this->db->where('E.ID', $ESTILO);
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

    public function onModificarExistencias($Tienda, $Estilo, $Color, $data, $index) {
        try {
            $this->db->where('Tienda', $Tienda);
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Color', $Color);
            $this->db->set("Ex$index", $data);
            $this->db->update("sz_Existencias");

            $str = $this->db->last_query();
//            print $str;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onComprobarExistenciaFisica($TIENDA, $ESTILO, $COLOR) {
        try {
            $this->db->select("COUNT(*) AS EXISTE", false);
            $this->db->from('sz_Existencias AS EX');
            $this->db->where('EX.Tienda', $TIENDA);
            $this->db->where('EX.Estilo', $ESTILO);
            $this->db->where('EX.Color', $COLOR);
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

}
