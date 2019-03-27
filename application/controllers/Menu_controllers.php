<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_controllers extends CI_Controller
{
    function __Construct()
    {
        parent::__Construct();
        $this->load->Model('Model_menu');
    }

    public function ListarMenus(){
        $siglacargo = $this->session->userdata('session_siglacargo');
		$data = $this->Model_menu->ListarMenus($siglacargo);
		$data2 = $this->Model_menu->ListarMenusHijo2($siglacargo);
		$resultado = array('arrayMenus' => $data, 'arrayMenusH2' => $data2);
		echo json_encode( $resultado);
	}
	
	public function ListarMenusHijo2(){
        $siglacargo = $this->session->userdata('session_siglacargo');
        $data = $this->Model_menu->ListarMenus($siglacargo);
		echo json_encode($data);
    }
}
