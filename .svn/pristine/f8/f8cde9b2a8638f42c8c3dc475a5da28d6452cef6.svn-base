<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiporeceta_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_tiporeceta');
	}

	public function listarTiporeceta()
	{
		$data = $this->Model_tiporeceta->listarTiporeceta();
		echo json_encode($data);
	}

	public function Editar(){
		if ($this->input->is_ajax_request()) {
			$tiporeceta = $this->input->post('tiporeceta');
			$sigla 	= $this->input->post('sigla');
			$Idtiporeceta 	= $this->input->post('Idtiporeceta');

			$mensaje = '';

			$data = array(
				'Nombre' => $tiporeceta,
				'Sigla' => $sigla
			);

			if($this->Model_tiporeceta->Editar($Idtiporeceta, $data) == true){
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}
			echo $mensaje;
		}
	}

	public function Deshabilitar(){
		if ($this->input->is_ajax_request()) {
			$IdtipoReceta = $this->input->post('IdtipoReceta');
			$mensaje = '';

			$data = array('eliminado' => 1 );

			if ($this->Model_tiporeceta->Editar($IdtipoReceta, $data) == true) {
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
			$IdtipoReceta = $this->input->post('IdtipoReceta');
			$mensaje = '';

			$data = array('eliminado' => 0);
			if ($this->Model_tiporeceta->Editar($IdtipoReceta, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

}