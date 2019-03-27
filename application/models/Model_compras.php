<?php

class Model_compras extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Guardar($data){
		$this->db->insert('compras', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}

	public function EditarCompra($txtIdCompra, $data)
	{
		$this->db->where('Compraid', $txtIdCompra);
		$this->db->update('compras', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function ListarCompras(){
		$this->db->select('compra.Compraid as idCompra, producto.Nombre as nombreProducto, producto.ProductoId as idProducto, provedor.Nombre as nombreProveedor, provedor.ProveedorId as idProvedor,compra.Cantidad, compra.CostoUnitario, compra.CostoTotal, compra.NumeroFactura, compra.lote, compra.FechaVenciemiento, compra.Observaciones');
		$this->db->from('compras compra');
		$this->db->join('producto producto', 'compra.ProductoId = producto.ProductoId');
		$this->db->join('proveedor provedor', 'compra.ProveedorId = provedor.ProveedorId');
		$this->db->where('compra.estado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

}
