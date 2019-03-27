<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_receta');
		$this->load->Model('Model_venta');
	}

	public function ListarClienteCombo(){
		$data = $this->Model_venta->ListarClienteCombo();
		echo json_encode($data);
	}

	public function GuardarVenta(){
		if ($this->input->is_ajax_request()) {

			$cbxCliente 				= $this->input->post('cbxCliente');
			$cbxTipoVenta 				= $this->input->post('cbxTipoVenta');
			$vlrTotalVenta 				= $this->input->post('vlrTotalVenta');
			$vlrIva 					= $this->input->post('vlrIva');
			$vlrTotalVentaIva 			= $this->input->post('vlrTotalVentaIva');
			$arrayproducto 				= $this->input->post('arrayproducto');
			$arrayCostoUnitario 		= $this->input->post('arrayCostoUnitario');
			$arraycantidadDetalle 		= $this->input->post('arraycantidadDetalle');
			$arrayTotalProductoDetalle 	= $this->input->post('arrayTotalProductoDetalle');
			$arraycantidadDispoDetalle 	= $this->input->post('arraycantidadDispoDetalle');
			$arraystockDetalle 			= $this->input->post('arraystockDetalle');
			$mensaje					= '';

			# array para guardar la venta
			$arrayVenta = array(
				'ClienteId' => $cbxCliente,
				'EmpleadoId' => $this->session->userdata("session_idUsuario"),
				'TipoVentaId' => $cbxTipoVenta,
				'TotalNeto' => $vlrTotalVenta,
				'MontoIva' => $vlrIva,
				'TotalVenta' => $vlrTotalVentaIva
			);

			// Id de venta
			$idVenta = $this->Model_venta->GuardarVenta($arrayVenta);
			if($idVenta != ''){

				# array para guardar el detalle de la venta
				$i = 0;
				for ($i = 0; $i < count($arrayproducto); $i++) {
					if($this->Model_venta->registrarDetalleVenta($arrayproducto[$i], $arrayCostoUnitario[$i], $arraycantidadDetalle[$i], $arrayTotalProductoDetalle[$i], $idVenta) == true){

						# actualizar stock
						$arrayStock = array(
							'StkDisponible' => $arraycantidadDispoDetalle[$i]
						);
						$this->Model_venta->ActualizarStock($arrayStock, $arraystockDetalle[$i]);
					}
				}
			}
			$mensaje = 1;
			echo $mensaje;
		}
	}
}

