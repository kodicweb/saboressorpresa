<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Compras_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_proveedor');
		$this->load->Model('Model_compras');
	}

	public function Guardar(){
		if ($this->input->is_ajax_request()) {
			$cbxproveedor = $this->input->post('cbxproveedor');
			$txtCantidad = $this->input->post('txtCantidad');
			$txtCostoUnitario = $this->input->post('txtCostoUnitario');
			$txtCostoTotal = $this->input->post('txtCostoTotal');
			$txtlote = $this->input->post('txtlote');
			$txtObservaciones = $this->input->post('txtObservaciones');
			$cbxproducto		= $this->input->post('cbxproducto');
			$txtFactura			= $this->input->post('txtFactura');
			$txtFechaVencimiento = $this->input->post('txtFechaVencimiento');
			$mensajE = '';

			$data = array(
				'ProveedorId' => $cbxproveedor,
				'ProductoId' => $cbxproducto,
				'Cantidad' => $txtCantidad,
				'CostoUnitario' => $txtCostoUnitario,
				'CostoTotal' => $txtCostoTotal,
				'Observaciones' => $txtObservaciones,
				'lote' => $txtlote,
				'NumeroFactura' => $txtFactura,
				'FechaVenciemiento' => $txtFechaVencimiento
			);

			$idCompra = $this->Model_compras->Guardar($data);
			if ($idCompra != '') {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function ListarCompras()
	{
		$data = $this->Model_compras->ListarCompras();
		echo json_encode($data);
	}

	public function EditarCompra(){
		if ($this->input->is_ajax_request()) {
			$cbxproveedor = $this->input->post('cbxproveedor');
			$txtCantidad = $this->input->post('txtCantidad');
			$txtCostoUnitario = $this->input->post('txtCostoUnitario');
			$txtCostoTotal = $this->input->post('txtCostoTotal');
			$txtlote = $this->input->post('txtlote');
			$txtObservaciones = $this->input->post('txtObservaciones');
			$cbxproducto = $this->input->post('cbxproducto');
			$txtFactura = $this->input->post('txtFactura');
			$txtFechaVencimiento = $this->input->post('txtFechaVencimiento');
			$idCompra = $this->input->post('idCompra');

			$data = array(
				'ProveedorId' => $cbxproveedor,
				'ProductoId' => $cbxproducto,
				'Cantidad' => $txtCantidad,
				'CostoUnitario' => $txtCostoUnitario,
				'CostoTotal' => $txtCostoTotal,
				'Observaciones' => $txtObservaciones,
				'lote' => $txtlote,
				'NumeroFactura' => $txtFactura,
				'FechaVenciemiento' => $txtFechaVencimiento
			);

			if ($this->Model_compras->EditarCompra($idCompra, $data) == true) {
				$mensaje = 1;
			}

			echo $mensaje;
		}
	}

	public function EliminarCompra(){
		if ($this->input->is_ajax_request()) {
			$idCompra = $this->input->post('idCompra');
			$mensaje = '';

			$data = array(
				'estado' => 1
			);

			if ($this->Model_compras->EditarCompra($idCompra, $data) == true) {
				$mensaje = 1;
			}

			echo $mensaje;
		}
	}

}
