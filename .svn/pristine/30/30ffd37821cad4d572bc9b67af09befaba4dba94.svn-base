<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipoproveedor_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_tipoproveedor');
	}

	public function listarComboTipoProveedor()
	{
		$data = $this->Model_tipoproveedor->listarComboTipoProveedor();
		echo json_encode($data);
	}

	public function listarTipoProveedor()
	{
		$data = $this->Model_tipoproveedor->listarTipoProveedor();
		echo json_encode($data);
	}

	public function Editar(){
		if ($this->input->is_ajax_request()) {
			$tipoProveedor = $this->input->post('tipoProveedor');
			$descripcion = $this->input->post('descripcion');
			$sigla 	= $this->input->post('sigla');
			$IdtipoProveedor 	= $this->input->post('IdtipoProveedor');

			$mensaje = '';

			$data = array(
				'Nombre' => $tipoProveedor,
				'Descripcion' => $descripcion,
				'Sigla' => $sigla
			);

			if($this->Model_tipoproveedor->Editar($IdtipoProveedor, $data) == true){
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}
			echo $mensaje;
		}
	}

	public function Deshabilitar(){
		if ($this->input->is_ajax_request()) {
			$IdtipoProveedor = $this->input->post('IdtipoProveedor');
			$mensaje = '';

			$data = array('eliminado' => 1 );

			if ($this->Model_tipoproveedor->Editar($IdtipoProveedor, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;

		}
	}

	public function Habilitar()
	{
		if ($this->input->is_ajax_request()) {
			$IdtipoProveedor = $this->input->post('IdtipoProveedor');
			$mensaje = '';

			$data = array('eliminado' => 0);
			if ($this->Model_tipoproveedor->Editar($IdtipoProveedor, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

}
