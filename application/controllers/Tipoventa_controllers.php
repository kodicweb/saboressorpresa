<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipoventa_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_receta');
		$this->load->Model('Model_tipoventa');

	}

	public function ListarTipoVentaCombo()
	{
		$data = $this->Model_tipoventa->ListarTipoVentaCombo();
		echo json_encode($data);
	}
}
