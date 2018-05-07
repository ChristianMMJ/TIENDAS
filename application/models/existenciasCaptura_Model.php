<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class existenciasCaptura_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords() {
        try {
            $this->db->select(" U.Ano AS 'Año', U.Mes,"
                    . "(CASE WHEN  U.Estatus ='ACTIVO' "
                    . "THEN CONCAT('<span class=''badge badge-info'' style=''font-size: 15px;'' >','EN CAPTURA','</span>') "
                    . "WHEN  U.Estatus ='FINALIZADO' "
                    . "THEN CONCAT('<span class=''badge badge-success'' style=''font-size: 15px;''>','FINALIZADA','</span>') "
                    . "END) AS Estatus ,"
                    . "U.Estatus as EstatusSF "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Usuarios AS US', 'U.Usuario = US.ID', 'left');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->order_by("U.Mes", "ASC");
            $this->db->order_by("U.Ano", "ASC");
            $this->db->group_by(array("U.Ano", "U.Mes", "U.Estatus"));
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

    public function getEstatusInicial($Ano, $Mes) {
        try {
            $this->db->select('U.Estatus AS Estatus '
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
            $this->db->group_by(array("U.Estatus"));
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

    public function getExistenciasXEstiloXCombinacion($Estilo, $combinacion, $Mes, $Ano) {
        try {
            $this->db->select("U.* "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Estilo', $Estilo);
            $this->db->where('U.Color', $combinacion);
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
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

    public function getExistenciasCapturaByMesByAno($Ano, $Mes) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Color AS IdColor,'
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
                    . "Ex22,"
                    . "'<span class=''fa fa-trash-alt'' "
                    . "onclick=''onEliminarRegistro('+      "
                    . "REPLACE(LTRIM(REPLACE(U.ID, '0', ' ')), ' ', '0') +')  ''></span>' AS Eliminar "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
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

    public function getExistenciasCapturaFinalizadaByMesByAno($Ano, $Mes) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Color AS IdColor,'
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
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
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

    public function getTotalDama($Ano, $Mes) {
        try {
            $this->db->select('SUM(Ex.Ex1)
      +SUM(Ex.Ex2)
      +SUM(Ex.Ex3)
      +SUM(Ex.Ex4)
      +SUM(Ex.Ex5)
      +SUM(Ex.Ex6)
      +SUM(Ex.Ex7)
      +SUM(Ex.Ex8)
      +SUM(Ex.Ex9)
      +SUM(Ex.Ex10)
      +SUM(Ex.Ex11)
      +SUM(Ex.Ex12)
      +SUM(Ex.Ex13)
      +SUM(Ex.Ex14)
      +SUM(Ex.Ex15)
      +SUM(Ex.Ex16)
      +SUM(Ex.Ex17)
      +SUM(Ex.Ex18)
      +SUM(Ex.Ex19)
      +SUM(Ex.Ex20)
      +SUM(Ex.Ex21)
      +SUM(Ex.Ex22) AS TOTAL '
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS Ex');
            $this->db->join('sz_Estilos AS E', 'Ex.Estilo = E.ID');
            $this->db->where('Ex.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('E.Genero', 'FEMENINO');
            $this->db->where('Ex.Mes', $Mes);
            $this->db->where('Ex.Ano', $Ano);
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

    public function getTotalCaballero($Ano, $Mes) {
        try {
            $this->db->select('SUM(Ex.Ex1)
      +SUM(Ex.Ex2)
      +SUM(Ex.Ex3)
      +SUM(Ex.Ex4)
      +SUM(Ex.Ex5)
      +SUM(Ex.Ex6)
      +SUM(Ex.Ex7)
      +SUM(Ex.Ex8)
      +SUM(Ex.Ex9)
      +SUM(Ex.Ex10)
      +SUM(Ex.Ex11)
      +SUM(Ex.Ex12)
      +SUM(Ex.Ex13)
      +SUM(Ex.Ex14)
      +SUM(Ex.Ex15)
      +SUM(Ex.Ex16)
      +SUM(Ex.Ex17)
      +SUM(Ex.Ex18)
      +SUM(Ex.Ex19)
      +SUM(Ex.Ex20)
      +SUM(Ex.Ex21)
      +SUM(Ex.Ex22) AS TOTAL '
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS Ex');
            $this->db->join('sz_Estilos AS E', 'Ex.Estilo = E.ID');
            $this->db->where('Ex.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('E.Genero', 'MASCULINO');
            $this->db->where('Ex.Mes', $Mes);
            $this->db->where('Ex.Ano', $Ano);
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

    public function onAgregarExistenciasCaptura($array) {
        try {
            $this->db->insert("sz_ExistenciasCaptura", $array);
            $query = $this->db->query('SELECT SCOPE_IDENTITY() AS IDL');
            $row = $query->row_array();
//            PRINT "\n ID IN MODEL: $LastIdInserted \n";
            return $row['IDL'];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModifcarExistenciasCaptura($Mes, $Ano, $Estilo, $Color, $Posicion, $CantidadNueva) {
        try {
            $DATA = array(
                $Posicion => $CantidadNueva
            );
            $this->db->where('Mes', $Mes);
            $this->db->where('Ano', $Ano);
            $this->db->where('Estilo', $Estilo);
            $this->db->where('Color', $Color);
            $this->db->where('Tienda', $this->session->userdata('TIENDA'));
            $this->db->update("sz_ExistenciasCaptura", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onModificarEstatus($Mes, $Ano, $DATA) {
        try {
            $this->db->where('Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('Mes', $Mes);
            $this->db->where('Ano', $Ano);
            $this->db->update("sz_ExistenciasCaptura", $DATA);
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminar($Mes, $Ano) {
        try {
            $this->db->where('Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('Mes', $Mes);
            $this->db->where('Ano', $Ano);
            $this->db->delete("sz_ExistenciasCaptura");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onEliminarRegistro($ID) {
        try {
            $this->db->where('ID', $ID);
            $this->db->delete("sz_ExistenciasCaptura");
//            print $str = $this->db->last_query();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
