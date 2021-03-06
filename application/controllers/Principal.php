<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Principal extends CI_Controller
{
    function __Construct()
    {
        parent::__Construct();
        $this->load->Model('Model_Usuario');
        $this->load->Model('Model_menu');
    }

    public function index()
    {
        $this->load->helper('url');
		$this->load->view('layout/head');
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('layout/body');
		$this->load->view('layout/footer');
    }

    public function CargarPagina($carpeta, $ruta){
		$this->load->view($carpeta . '/' . $ruta);
	}
}