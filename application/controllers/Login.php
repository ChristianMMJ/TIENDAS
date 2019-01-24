<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('usuario_model');
    }

    public function index() {
        if (session_status() === 2 && isset($_SESSION["LOGGED"])) {
            if ($this->session->userdata['Tipo'] === 'VENDEDOR') {
                if ($this->session->userdata['Ventas'] === 0) {
                    $this->session->set_userdata("Ventas", 1);
                }
                $this->load->view('vEncabezado')->view('vVentas')->view('vFooter');
            } else {
                $this->load->view('vEncabezado')->view('vFondo')->view('vNavegacion')->view('vQuickMenu')->view('vStyles')->view('vFooter');
            }
        } else {
            $this->load->view('vEncabezado')->view('vSesion')->view('vFooter');
        }
    }

    public function onIngreso() {
        try {
            extract(filter_input_array(INPUT_POST));
            $data = $this->usuario_model->getAcceso($USUARIO, $CONTRASENA);
            if (count($data) > 0) {
                $r = $data[0];
                $newdata = array(
                    'USERNAME' => $r->Usuario,
                    'PASSWORD' => $r->Contrasena,
                    'TIENDA' => $r->Tienda,
                    'TIENDA_NOMBRE' => $r->RazonSocial,
                    'EMPRESA' => $r->EmpresaID,
                    'EMPRESA_LOGO' => $r->FotoEmpresa,
                    'ID' => $r->ID,
                    'LOGGED' => TRUE,
                    'Tipo' => $r->Tipo,
                    'Ventas' => 0,
                    'THEME' => $r->Theme
                );
                $this->session->mark_as_temp('LOGGED', 28800);
                $this->session->set_userdata($newdata);
                print 1;
            } else {
                print 'ACCESO DENEGADO';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onCambiarContrasena() {
        try {
            extract($this->input->post());
            $DATA = array(
                'Contrasena' => ($Contrasena !== NULL) ? $Contrasena : NULL
            );
            $this->usuario_model->onModificar($ID, $DATA);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onSalir() {
        try {
            $array_items = array('USERNAME', 'PASSWORD', 'LOGGED', 'TIENDA', 'TIENDA_NOMBRE', 'ID', 'Tipo', 'Ventas');
            $this->session->unset_userdata($array_items);
            $this->session->sess_destroy();
            header('Location: ' . base_url());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function onSendMail() {
        extract($this->input->post());
        $data = $this->usuario_model->getContrasena($USUARIO);
        //var_dump($data);
        if (!empty($data[0])) {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://mut.hosting-mexico.net',
                'smtp_port' => 465,
                'smtp_user' => 'no-reply@ayr.mx',
                'smtp_pass' => 'AyR20017#',
                'mailtype' => 'html',
                'charset' => 'ISO_8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->from('no-reply@ayr.mx', 'app.ayr.mx');
            $this->email->to($USUARIO);
            $this->email->subject(utf8_decode('Envío de contraseña app.ayr.mx'));
            $this->email->message(utf8_decode('<p>Se ha enviado su contraseña para el usuario: ' . $USUARIO . '</p><br>'
                            . '<p>Su contraseña es: </p>' . '<h3>' . $data[0]->Contrasena . '</h3><hr>'
                            . ''));
            if ($this->email->send()) {
                print 1;
            } else {
                print 0;
            }
        } else {
            print 2;
        }
    }

}
