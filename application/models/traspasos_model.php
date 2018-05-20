<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class traspasos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
    }

    public function getRecords() {
        try {
            $this->db->select("T.ID, IFNULL(T.DocMov,'') AS Documento , "
                    . "OTI.RazonSocial as 'De Tienda', "
                    . "DTI.RazonSocial as 'A Tienda', "
                    . "(CASE WHEN  T.Estatus ='ACTIVO' "
                    . "THEN CONCAT('<h5><span class=''badge badge-info''>','ACTIVO','</span><h5>') "
                    . "WHEN  T.Estatus ='AFECTADO' "
                    . "THEN CONCAT('<h5><span class=''badge badge-success''>','AFECTADO','</span></h5>') "
                    . "END) AS Estatus ,"
                    . "T.FechaMov as 'Fecha Movimiento', T.Registro AS Registro,"
                    . "US.Usuario AS 'Usuario'", false);
            $this->db->from('sz_Traspasos AS T');
            $this->db->join('sz_Usuarios AS US', 'T.Usuario = US.ID', 'left');
            $this->db->join('sz_Tiendas AS OTI', 'OTI.ID = T.dTienda', 'left');
            $this->db->join('sz_Tiendas AS DTI', 'DTI.ID = T.Tienda', 'left');
            $this->db->where_in('T.Estatus', 'ACTIVO');
            $this->db->order_by("T.DocMov", "ASC");
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

    public function getPreciosXTiendaXEstiloXColor($TIENDA, $ESTILO, $COLOR) {
        try {
            $this->db->select("EX.Precio, EX.PrecioMenudeo, EX.PrecioMayoreo", false);
            $this->db->from('sz_Existencias AS EX');
            $this->db->where('EX.Tienda', $TIENDA);
            $this->db->where('EX.Estilo', $ESTILO);
            $this->db->where('EX.Color', $COLOR);
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

    public function onAgregarExistencias($data) {
        try {
            $this->db->insert("sz_Existencias", $data);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
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

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Traspasos", $array);
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onAgregarDetalle($array) {
        try {
            $this->db->insert("sz_TraspasosDetalle", $array);
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
            $this->db->update("sz_Traspasos", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarDetalle($ID, $Compra, $DATA) {
        try {
            $this->db->where('ID', $ID);
            $this->db->where('Traspaso', $Compra);
            $this->db->update("sz_TraspasosDetalle", $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->set('Estatus', 'INACTIVO');
            $this->db->where('ID', $ID);
            $this->db->update("sz_Traspasos");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getTraspasoByID($ID) {
        try {
            $this->db->select('T.*', false);
            $this->db->from('sz_Traspasos AS T');
            $this->db->where('T.ID', $ID);
            $this->db->where_in('T.Estatus', 'ACTIVO');
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

    public function getTraspasoDetalleByID($ID) {
        try {
            $this->db->select('TD.Estilo as IdEstilo, TD.Color as IdColor, '
                    . 'CONCAT(E.Clave,\' -\',TD.ID,\' -\',E.Descripcion) AS Estilo,'
                    . 'CONCAT(C.ID,\'-\', C.Descripcion) AS Color, '
                    . 'TD.Talla AS Talla, TD.Cantidad AS Cantidad, TD.ID', false);
            $this->db->from('sz_TraspasosDetalle AS TD');
            $this->db->join('sz_Estilos AS E', 'TD.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'TD.Color = C.ID');
            $this->db->where('TD.Traspaso', $ID);
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

    public function Existe($Estilo, $Color, $Talla, $Compra) {
        try {
            $this->db->select('COUNT(*) AS EXISTE', false);
            $this->db->from('sz_TraspasosDetalle AS CD ');
            $this->db->where('CD.Traspaso', $Compra);
            $this->db->where('CD.Talla', $Talla);
            $this->db->where('CD.Color', $Color);
            $this->db->where('CD.Estilo', $Estilo);
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

    public function getExistenciasByIDs($Tienda, $Estilo, $Color) {
        try {
            $this->db->select('E.Ex1      ,E.Ex2      ,E.Ex3      ,E.Ex4
      ,E.Ex5      ,E.Ex6      ,E.Ex7      ,E.Ex8
      ,E.Ex9      ,E.Ex10      ,E.Ex11      ,E.Ex12
      ,E.Ex13      ,E.Ex14      ,E.Ex15      ,E.Ex16
      ,E.Ex17      ,E.Ex18      ,E.Ex19      ,E.Ex20
      ,E.Ex21      ,E.Ex22', false);
            $this->db->from('sz_Existencias AS E');
            $this->db->where('E.Tienda', $Tienda);
            $this->db->where('E.Estilo', $Estilo);
            $this->db->where('E.Color', $Color);
            $this->db->where_in('E.Estatus', '1');
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

    public function getTiendasConExistencias() {
        try {
            $this->db->select("T.ID, CONCAT(T.Clave,'-', T.RazonSocial) AS 'Tienda'  ", false);
            $this->db->from('sz_Tiendas AS T');
            $this->db->join('sz_Existencias AS E', 'E.Tienda = T.ID');
            $this->db->where_in('T.Estatus', 'ACTIVO');
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

}
