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
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("U.ID, "
                    . "U.Estilo AS IdEstilo, "
                    . "CONCAT(T.Clave ,'-', T.RazonSocial) AS 'Tienda', "
                    . "CONCAT(E.Clave ,'-', E.Descripcion) AS 'Estilo' ,"
                    . "CONCAT(C.Clave ,'-', c.Descripcion) AS 'Color', "
                    . "U.Ex1, "
                    . "U.Ex2, "
                    . "U.Ex3, "
                    . "U.Ex4, "
                    . "U.Ex5, "
                    . "U.Ex6, "
                    . "U.Ex7, "
                    . "U.Ex8, "
                    . "U.Ex9, "
                    . "U.Ex10, "
                    . "U.Ex11, "
                    . "U.Ex12, "
                    . "U.Ex13, "
                    . "U.Ex14, "
                    . "U.Ex15, "
                    . "U.Ex16, "
                    . "U.Ex17, "
                    . "U.Ex18, "
                    . "U.Ex19, "
                    . "U.Ex20, "
                    . "U.Ex21, "
                    . "U.Ex22,"
                    . "S.ID AS Serie", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Tiendas AS T', 'U.Tienda = T.ID', 'left');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->join('sz_series AS S', 'E.Serie = S.ID', 'left');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->like('U.Tienda', $Tienda);
            $this->db->order_by('U.Tienda', 'ASC');
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

    public function getEstilosExistentesXTienda() {
        try {
            $this->db->select("U.Estilo AS IdEstilo, CONCAT(E.Clave ,'-', E.Descripcion) AS 'Estilo' "
                    . "", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->where_in('U.Tienda', $this->session->userdata('TIENDA'));
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

    public function getTiendasConExistencias() {
        try {
            $this->db->select("U.Tienda AS ID, CONCAT(E.Clave ,'-', E.RazonSocial) AS 'Tienda' "
                    . "", false);
            $this->db->from('sz_Existencias AS U');
            $this->db->join('sz_Tiendas AS E', 'U.Tienda = E.ID', 'left');
            $this->db->where_in('U.Estatus', '1');
            $this->db->group_by(array("U.Tienda", "E.Clave", "E.RazonSocial"));
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
            $this->db->select("U.Estilo AS IdEstilo, CONCAT(E.Clave ,'-', E.Descripcion) AS 'Estilo' "
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

    public function getUbicacionesByTienda($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
            $this->db->select("U.ID, CONCAT(E.Clave ,'-', E.Descripcion) AS 'Estilo' , "
                    . "CONCAT(C.Clave ,'-', c.Descripcion) AS 'Color', "
                    . "IFNULL(Loc1,'') AS 'Ubicación 1', "
                    . "IFNULL(Loc2,'') AS 'Ubicación 2', "
                    . "IFNULL(Loc3,'') AS 'Ubicación 3' "
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

    public function getExistenciasByEstiloByColor($Estilo, $Color) {
        try {
            $this->db->select('U.Estilo AS IDEstilo, '
                    . " CONCAT(T.Clave ,'-', T.RazonSocial) AS 'Tienda', "
                    . "CONCAT(E.Clave ,'-', E.Descripcion) AS Estilo, "
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
            $this->db->select("U.*, "
                    . "CONCAT(T.Clave , '-',T.RazonSocial) AS NombreTienda, "
                    . "CONCAT(E.Clave , '-',E.Descripcion) AS NombreEstilo, "
                    . "CONCAT(C.Clave , '-',C.Descripcion) AS NombreColor "
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

    public function getSerieXEstiloTR($Estilo) {
        try {
            return $this->db->select("S.T1,S.T2,
                                S.T3,                                S.T4,
                                S.T5,                                S.T6,
                                S.T7,                                S.T8,
                                S.T9,                                S.T10,
                                S.T11,                                S.T12,
                                S.T13,                                S.T14,
                                S.T15,                                S.T16,
                                S.T17,                                S.T18,
                                S.T19,                                S.T20,
                                S.T21,                                S.T22", false)
                            ->from('sz_Estilos AS E')
                            ->join('sz_Series AS S', 'E.Serie = S.ID', 'left')
                            ->where('E.ID', $Estilo)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function getSerieXEstiloTRG($Estilo) {
        try {
            return $this->db->select("S.ID,S.T1,S.T2,
                                S.T3,                                S.T4,
                                S.T5,                                S.T6,
                                S.T7,                                S.T8,
                                S.T9,                                S.T10,
                                S.T11,                                S.T12,
                                S.T13,                                S.T14,
                                S.T15,                                S.T16,
                                S.T17,                                S.T18,
                                S.T19,                                S.T20,
                                S.T21,                                S.T22", false)
                            ->from('sz_Estilos AS E')
                            ->join('sz_Series AS S', 'E.Serie = S.ID', 'left')
                            ->where('E.ID', $Estilo)
                            ->get()
                            ->result();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
