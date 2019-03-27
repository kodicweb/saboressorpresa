<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedor_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_proveedor');
	}



	public function guardarProveedor(){
		if ($this->input->is_ajax_request()) {
			$txtNombreProveedor 	= $this->input->post('txtNombreProveedor');
			$txtNitProveedor 		= $this->input->post('txtNitProveedor');
			$txtDireccion 			= $this->input->post('txtDireccion');
			$txtTelefono 			= $this->input->post('txtTelefono');
			$cbxTipoProveedor 		= $this->input->post('cbxTipoProveedor');
			$mensaje 				= '';

			$data = array(
				'TipoProveedorId' => $cbxTipoProveedor,
				'Nombre' => $txtNombreProveedor,
				'Nit' => $txtNitProveedor,
				'Direccion' => $txtDireccion,
				'Telefono' => $txtTelefono
			);

			$idProveedor = $this->Model_proveedor->guardarProveedor($data);
			if ($idProveedor != '') {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function EditarProveedor(){
		if ($this->input->is_ajax_request()) {
			$txtNombreProveedor = $this->input->post('txtNombreProveedor');
			$txtNitProveedor = $this->input->post('txtNitProveedor');
			$txtDireccion = $this->input->post('txtDireccion');
			$txtTelefono = $this->input->post('txtTelefono');
			$cbxTipoProveedor = $this->input->post('cbxTipoProveedor');
			$txtIdProvedor = $this->input->post('txtIdProvedor');
			$mensaje = '';


			$data = array(
				'TipoProveedorId' => $cbxTipoProveedor,
				'Nombre' => $txtNombreProveedor,
				'Nit' => $txtNitProveedor,
				'Direccion' => $txtDireccion,
				'Telefono' => $txtTelefono
			);

			if ($this->Model_proveedor->EditarProveedor($txtIdProvedor, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function ListarProveedores(){
		$data = $this->Model_proveedor->ListarProveedores();
		echo json_encode($data);
	}

	public function Accion(){
		if ($this->input->is_ajax_request()) {
			$estado = $this->input->post('estado');
			$idProveedor = $this->input->post('idProveedor');
			$mensaje = '';

			$data = array('estado' => $estado );
			if ($this->Model_proveedor->EditarProveedor($idProveedor, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function ListarProveedoresCombo(){
		$data = $this->Model_proveedor->ListarProveedoresCombo();
		echo json_encode($data);
	}

	

}
