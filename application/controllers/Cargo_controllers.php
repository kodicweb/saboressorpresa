<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cargo_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_cargo');
	}

	public function guardarCargo(){
		if ($this->input->is_ajax_request()) {
			$nombre = $this->input->post('nombre');
			$descripcion = $this->input->post('descripcion');
			$sigla = '';
			$mensaje = '';

			$rest = substr($nombre, 0, -2);
			$sigla = $rest.'_SISTEMA';
			

			$data = array(
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Sigla' => $sigla
			);

			$IdCargo = $this->Model_cargo->guardarCargo($data);
			if ($IdCargo != '') {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function EditarCargo(){
		if ($this->input->is_ajax_request()) {
			$nombre = $this->input->post('nombre');
			$descripcion = $this->input->post('descripcion');
			$txtIdCargo  = $this->input->post('txtIdCargo');
			$mensaje = '';

			$rest = substr($nombre, 0, -2);
			$sigla = $rest . '_SISTEMA';


			$data = array(
				'Nombre' => $nombre,
				'Descripcion' => $descripcion,
				'Sigla' => $sigla
			);

			if ($this->Model_cargo->EditarCargo($txtIdCargo, $data) == true) {
				$mensaje = 1;
			}
			echo $mensaje;

		}
	}

	public function eliminarCargo(){
		if ($this->input->is_ajax_request()) {
			$cargoId = $this->input->post('cargoId');
			$estado  = $this->input->post('estado');
			$mensaje = '';

			$data = array('eliminado' => $estado );
			if ($this->Model_cargo->EditarCargo($cargoId, $data) == true) {
				$mensaje = 1;
			}
			echo $mensaje;
		}
	}

	public function ListarCargo(){
		$data = $this->Model_cargo->ListarCargo();
		echo json_encode($data);
	}
}
