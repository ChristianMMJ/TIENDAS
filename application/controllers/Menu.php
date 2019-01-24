<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "/third_party/fpdf17/fpdf.php";

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Mexico_City');
        $this->load->library('session');
    }

    public function menu() {
        $menus = array('Catalogos', 'Ventas', 'Caja', 'Gastos', 'Compras', 'Inventarios', 'Nomina');
        $this->load->view('vEncabezado')->view("vMenu{$menus[$this->uri->segment(2)]}")->view('vFondo')->view('vStyles')->view('vFooter');
    }

}
