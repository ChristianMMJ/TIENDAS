<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class existenciasCaptura_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRecords($Tienda) {
        try {
            if ($Tienda === 'TODAS') {
                $Tienda = "";
            }
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
            $this->db->like('U.Tienda', $Tienda, 'before');
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

    public function onActualizarInvFisAct($Mes, $Ano) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS Estilo, '
                    . 'U.Color AS Color,'
                    . 'U.Tienda AS Tienda,'
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

    public function getSerieReporteExistencias($Mes, $Ano) {
        try {
            $this->db->select(''
                    . 'Se.ID AS Serie,'
                    . "Se.T1, "
                    . "Se.T2, "
                    . "Se.T3, "
                    . "Se.T4, "
                    . "Se.T5, "
                    . "Se.T6, "
                    . "Se.T7, "
                    . "Se.T8, "
                    . "Se.T9, "
                    . "Se.T10, "
                    . "Se.T11, "
                    . "Se.T12, "
                    . "Se.T13, "
                    . "Se.T14, "
                    . "Se.T15, "
                    . "Se.T16, "
                    . "Se.T17, "
                    . "Se.T18, "
                    . "Se.T19, "
                    . "Se.T20, "
                    . "Se.T21, "
                    . "Se.T22 "
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Series AS Se', 'E.Serie = Se.ID');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
            $this->db->order_by('Se.ID', 'ASC');
            $this->db->group_by(array('Se.ID', "Se.T1", "Se.T2", "Se.T3", "Se.T4", "Se.T5"
                , "Se.T6", "Se.T7", "Se.T8", "Se.T9", "Se.T10", "Se.T11", "Se.T12", "Se.T13"
                , "Se.T14", "Se.T15", "Se.T16", "Se.T17", "Se.T18", "Se.T19", "Se.T20", "Se.T21"
                , "Se.T22"));
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

    public function getReporteCapturaInvByMesByAno($Mes, $Ano, $Serie) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Color AS IdColor,'
                    . "CONCAT(E.Clave,'-',C.Descripcion) AS Estilo, "
                    . 'Se.ID AS Serie,'
                    . "CONCAT(Se.PuntoInicial,' AL ',Se.PuntoFinal) AS NombreSerie ,"
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
                    . "U.Ex22"
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID');
            $this->db->join('sz_Series AS Se', 'E.Serie = Se.ID');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
            $this->db->where('E.Serie', $Serie);
            $this->db->order_by('Se.ID', 'ASC');
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

    public function getReporteDiferenciasInvByMesByAno($Mes, $Ano, $Serie) {
        try {
            $this->db->select('U.ID AS ID, '
                    . 'U.Estilo AS IdEstilo, '
                    . 'U.Color AS IdColor,'
                    . "CONCAT(E.Clave,'-',C.Descripcion) AS Estilo, "
                    . 'Se.ID AS Serie,'
                    . "CONCAT(Se.PuntoInicial,' AL ',Se.PuntoFinal) AS NombreSerie ,"
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
                    . "Ex.Ex1 AS Exi1 ,"
                    . "Ex.Ex2 AS Exi2 ,"
                    . "Ex.Ex3 AS Exi3 ,"
                    . "Ex.Ex4 AS Exi4 ,"
                    . "Ex.Ex5 AS Exi5 ,"
                    . "Ex.Ex6 AS Exi6,"
                    . "Ex.Ex7 AS Exi7 ,"
                    . "Ex.Ex8 AS Exi8 ,"
                    . "Ex.Ex9 AS Exi9 ,"
                    . "Ex.Ex10 AS Exi10 ,"
                    . "Ex.Ex11 AS Exi11 ,"
                    . "Ex.Ex12 AS Exi12 ,"
                    . "Ex.Ex13 AS Exi13 ,"
                    . "Ex.Ex14 AS Exi14 ,"
                    . "Ex.Ex15 AS Exi15 ,"
                    . "Ex.Ex16 AS Exi16 ,"
                    . "Ex.Ex17 AS Exi17 ,"
                    . "Ex.Ex18 AS Exi18 ,"
                    . "Ex.Ex19 AS Exi19 ,"
                    . "Ex.Ex20 AS Exi20 ,"
                    . "Ex.Ex21 AS Exi21 ,"
                    . "Ex.Ex22 AS Exi22"
                    . " ", false);
            $this->db->from('sz_ExistenciasCaptura AS U');
            $this->db->join('sz_Estilos AS E', 'U.Estilo = E.ID');
            $this->db->join('sz_Combinaciones AS C', 'U.Color = C.ID');
            $this->db->join('sz_Series AS Se', 'E.Serie = Se.ID');
            $this->db->join('sz_Existencias AS Ex', 'U.Estilo = Ex.Estilo and U.Color = Ex.Color and U.Tienda = Ex.Tienda ', 'left');
            $this->db->where('U.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('U.Mes', $Mes);
            $this->db->where('U.Ano', $Ano);
            $this->db->where('E.Serie', $Serie);
            $this->db->order_by('Se.ID', 'ASC');
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
                    . 'U.Color AS IdColor, '
                    . "CONCAT(E.Clave, '-',C.Descripcion) AS Estilo, "
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
                    . "CONCAT('<span class=''fa fa-trash-alt'' "
                    . "onclick=''onEliminarRegistro(',U.ID,')  ''></span>') AS Eliminar "
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
            $this->db->join('sz_Catalogos AS GEN', 'E.Genero = GEN.ID');
            $this->db->like('GEN.FieldId', 'GENEROS');
            $this->db->where('Ex.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('GEN.Special', 'DAMA');
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
            $this->db->join('sz_Catalogos AS GEN', 'E.Genero = GEN.ID');
            $this->db->like('GEN.FieldId', 'GENEROS');
            $this->db->where('Ex.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('GEN.Special', 'CABALLERO');
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

    public function getTotalInfantil($Ano, $Mes) {
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
            $this->db->join('sz_Catalogos AS GEN', 'E.Genero = GEN.ID');
            $this->db->like('GEN.FieldId', 'GENEROS');
            $this->db->where('Ex.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('GEN.Special', 'INFANTIL');
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

    public function getTotalUnisex($Ano, $Mes) {
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
            $this->db->join('sz_Catalogos AS GEN', 'E.Genero = GEN.ID');
            $this->db->like('GEN.FieldId', 'GENEROS');
            $this->db->where('Ex.Tienda', $this->session->userdata('TIENDA'));
            $this->db->where('GEN.Special', 'UNISEX');
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
            $query = $this->db->query('SELECT LAST_INSERT_ID()');
            $row = $query->row_array();
            return $row['LAST_INSERT_ID()'];
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
