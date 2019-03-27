<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipoproducto_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_tipoproducto');
	}

	public function listarComboTipoProducto()
	{
		$data = $this->Model_tipoproducto->listarComboTipoProducto();
		echo json_encode($data);
	}

	public function Guardar(){
		if ($this->input->is_ajax_request()) {
			$tipoProveedor = $this->input->post('tipoProveedor');
			$descripcion = $this->input->post('descripcion');
			$sigla 	= $this->input->post('sigla');
			$mensaje = '';

			$data = array(
				'Nombre' => $tipoProveedor,
				'Descripcion' => $descripcion,
				'Sigla' => $sigla
			);

			if($this->Model_tipoproducto->guardar($data)){
			
				$mensaje = 1;
			} else{
				$mensaje = 2;
			}

			echo $mensaje;
		}
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

			if($this->Model_tipoproducto->Editar($IdtipoProveedor, $data) == true){
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}
			echo $mensaje;
		}
	}

}
