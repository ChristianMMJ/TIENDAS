<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class existencias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getExistenciasByTienda($Tienda) {
        try {
            $this->db->select("U.ID, E.Clave +'-'+ E.Descripcion AS 'Estilo' , C.Clave +'-'+ c.Descripcion AS 'Color' "
                    . "", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->where_in('U.Tienda', $Tienda);
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

    public function getEstilosExt() {
        try {
            $this->db->select("U.Estilo AS IdEstilo, E.Clave +'-'+ E.Descripcion AS 'Estilo' "
                    . "", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->group_by(array("U.Estilo", "E.Clave", "E.Descripcion"));
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

    public function getUbicacionesByTienda() {
        try {
            $this->db->select("U.ID, E.Clave +'-'+ E.Descripcion AS 'Estilo' , "
                    . "C.Clave +'-'+ c.Descripcion AS 'Color', "
                    . "ISNULL(Loc1,'') AS 'Ubicación 1', "
                    . "ISNULL(Loc2,'') AS 'Ubicación 2', "
                    . "ISNULL(Loc3,'') AS 'Ubicación 3' "
                    . "", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->where_in('U.Tienda', $this->session->userdata('TIENDA'));
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

    public function getExistenciasByEstiloByColor($Estilo, $Color) {
        try {
            $this->db->select('U.Estilo AS IDEstilo, '
                    . " T.Clave + '-'+T.RazonSocial AS 'Tienda', "
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
                    . "Ex22"
                    . " ", false);

            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID', 'left');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            if ($Estilo !== '') {
                $this->db->where('U.Estilo', $Estilo);
            }
            if ($Color !== '') {
                $this->db->where('U.Color', $Color);
            }

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

    public function onComprobarExistencias($Tienda, $Estilo, $Color) {
        try {
            $this->db->select("E.*", false);
            $this->db->from('sz_Existencias AS E');
            $this->db->where('E.Tienda', $Tienda);
            $this->db->where('E.Estilo', $Estilo);
            $this->db->where('E.Color', $Color);
            $this->db->where('E.Estatus', '1');
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

    public function onComprobarExistenciasTempXDoc($ID, $Tienda, $Estilo, $Color) {
        try {
            $this->db->select("E.*", false);
            $this->db->from('sz_Existencias AS E');
            $this->db->where('E.Tienda', $Tienda);
            $this->db->where('E.Estilo', $Estilo);
            $this->db->where('E.Color', $Color);
            $this->db->where('E.Documento', $ID);
            $this->db->where('E.Estatus', '0');
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

    public function onAgregar($array) {
        try {
            $this->db->insert("sz_Existencias", $array);
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
            $this->db->update("sz_Existencias", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onActualizarExistenciasActualesVsFisico($Tienda, $Estilo, $Color, $DATA) {
        try {
            $this->db->where('Tienda', $Tienda);
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Color', $Color);
            $this->db->update("sz_Existencias", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciaXEstiloXColorXTienda($Estilo, $Color, $Posicion, $CantidadNueva) {
        try {
            $DATA = array(
                $Posicion => $CantidadNueva
            );
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Color', $Color);
            $this->db->where('Tienda', $this->session->userdata('TIENDA'));
            $this->db->set('Estatus', '1');
            $this->db->update("sz_Existencias", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarEstatusExistencias($ID, $DATA) {
        try {
            $DATOS = array(
                'Estatus' => $DATA
            );
            $this->db->where('Documento', $ID);
            $this->db->update("sz_Existencias", $DATOS);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_Existencias");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarExistenciaTemp($ID, $Tienda, $Estilo, $Color) {
        try {
            $this->db->set('Estatus', '0');
            $this->db->where('Documento', $ID);
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Tienda', $Tienda);
            $this->db->where('Color', $Color);
            $this->db->delete("sz_Existencias");
            //print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getExistenciaByID($ID) {
        try {
            $this->db->select("U.*, T.Clave + '-'+T.RazonSocial AS NombreTienda, "
                    . "E.Clave + '-'+E.Descripcion AS NombreEstilo, "
                    . "C.Clave + '-'+C.Descripcion AS NombreColor "
                    . " ", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID', 'left');
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

    public function getExistenciaByDocumento($ID) {
        try {
            $this->db->select("U.* ", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->where('U.Documento', $ID);
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

    public function getExistenciasXEstiloXCombinacion($Estilo, $combinacion) {
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

}
