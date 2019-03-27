<?php

class Model_venta extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ListarClienteCombo(){
		$this->db->select('cl.ClienteId as idCliente, concat(cl.PrimerNombre, " ", cl.SegundoNombre, " ", cl.PrimerApellido, " ", cl.SegundoApellido) as nombre');
		$this->db->from('cliente cl');
		$this->db->where('eliminado',0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function GuardarVenta($data){
		$this->db->insert('venta', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}

	public function registrarDetalleVenta($arrayproducto, $arrayCostoUnitario, $arraycantidadDetalle, $arrayTotalProductoDetalle, $idVenta){
		$data = array(
			'VentaId' => $idVenta,
			'ProductoId' => $arrayproducto,
			'CantidadProducto' => $arraycantidadDetalle,
			'CostoTotal' => $arrayTotalProductoDetalle,
			'CostoUnitario' => $arrayCostoUnitario
		);
		$this->db->insert('detalleventa', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function ActualizarStock($data, $idStock){
		$this->db->where('StockId', $idStock);
		$this->db->update('stock', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
