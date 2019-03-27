<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_proveedor');
		$this->load->Model('Model_producto');
	}

	public function Guardar(){
		if ($this->input->is_ajax_request()) {
			$txtNombreProducto 		= $this->input->post('txtNombreProducto');
			$txtMarca 				= $this->input->post('txtMarca');
			$txtCostoUnitaria 		= $this->input->post('txtCostoUnitaria');
			$cbxTipoProducto 		= $this->input->post('cbxTipoProducto');
			$cbxUnidadMedida		= $this->input->post('cbxUnidadMedida');
			$mensaje = '';

			$data = array(
				'TipoProductoid' => $cbxTipoProducto,
				'UniddadmedidaId' => $cbxUnidadMedida,
				'Nombre' => $txtNombreProducto,
				'GrupoInventario' => $txtMarca,
				'CostoUnitario' => $txtCostoUnitaria
			);

			$idProducto = $this->Model_producto->Guardar($data);
			if($idProducto != ''){
				$mensaje = 1;
			}else{
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function EditarProducto(){
		if ($this->input->is_ajax_request()) {
			$txtNombreProducto = $this->input->post('txtNombreProducto');
			$txtMarca = $this->input->post('txtMarca');
			$cbxTipoProducto = $this->input->post('cbxTipoProducto');
			$txtIdProducto = $this->input->post('txtIdProducto');
			$cbxUnidadMedida = $this->input->post('cbxUnidadMedida');
			$txtCostoUnitaria = $this->input->post('txtCostoUnitaria');
			$mensaje = '';

			$data = array(
				'TipoProductoid' => $cbxTipoProducto,
				'UniddadmedidaId' => $cbxUnidadMedida,
				'Nombre' => $txtNombreProducto,
				'GrupoInventario' => $txtMarca,
				'CostoUnitario' => $txtCostoUnitaria
			);

			if($this->Model_producto->EditarProducto($txtIdProducto, $data) == true){
				$mensaje = 1;
			}
			echo $mensaje;
		}
	}

	public function ListarProducto(){
		$data = $this->Model_producto->ListarProducto();
		echo json_encode($data);
	}

	public function listarProductoCombo()
	{
		$data = $this->Model_producto->listarProductoCombo();
		echo json_encode($data);
	}

	public function Deshabilitar(){
		if ($this->input->is_ajax_request()) {
			$idProducto = $this->input->post('idProducto');
			$mensaje = '';

			$data = array('estado' => 1 );

			if ($this->Model_producto->EditarProducto($idProducto, $data) == true) {
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
			$idProducto = $this->input->post('idProducto');
			$mensaje = '';

			$data = array('estado' => 0);
			if ($this->Model_producto->EditarProducto($idProducto, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function ListarProductosVentas(){
		$data = $this->Model_producto->ListarProductosVentas();
		echo json_encode($data);
	}
}
