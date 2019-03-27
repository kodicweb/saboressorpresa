<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controllers extends CI_Controller
{
    function __Construct()
    {
        parent::__Construct();
        $this->load->Model('Model_Usuario');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Login/Vlogin');
        // $this->load->view('layout/footer');
    }

    public function Ingresar(){
        if ($this->input->is_ajax_request()) {
            $usuario    = $this->input->post('txtUsuario');
            //$password   = md5($this->input->post('txtPassword'));
            $password   = $this->input->post('txtPassword');

            $respuesta = $this->Model_Usuario->Ingresar($usuario, $password);

            $men = '';
            if($respuesta == 1){
                $men = 1;
            } else {
                $men = 2;
            }
            echo $men;
        }
    }
}
