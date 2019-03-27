<?php

class Model_producto extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function Guardar($data){
		$this->db->insert('producto', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}

	public function EditarProducto($idproducto, $data){
		$this->db->where('ProductoId', $idproducto);
		$this->db->update('producto', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function ListarProducto(){
		$this->db->select('producto.ProductoId, producto.Nombre as nombreproducto, producto.GrupoInventario as Marca, tipoproducto.Nombre as nombreTipoProducto, tipoproducto.TipoProductoId as idTipoProducto, producto.estado, unidadm.Sigla as siglaUnidad, unidadm.unidadId, producto.CostoUnitario as costounitario');
		$this->db->from('producto producto');
		$this->db->join('tipoproducto tipoproducto', 'producto.TipoProductoid = tipoproducto.TipoProductoId');
		$this->db->join('unidadmedida unidadm', 'unidadm.unidadId = producto.UniddadmedidaId');
		$this->db->where('tipoproducto.eliminado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function listarProductoCombo(){
		$this->db->select('producto.ProductoId, producto.Nombre as nombreproducto');
		$this->db->from('producto producto');
		$this->db->where('producto.estado',0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function ListarProductosVentas(){
		$this->db->select('prducto.ProductoId as idProducto, prducto.Nombre as nombreProducto, prducto.GrupoInventario as Marca, prducto.Sigla, prducto.CostoUnitario, unimedida.unidadId as idUnidadmedida, unimedida.Nombre, unimedida.Sigla, tipproductpo.TipoProductoId as idTipoProducto, tipproductpo.Nombre as nombreTipoProducto, tipproductpo.Sigla as siglaTipoProducto, stoc.StkDisponible as cantidadDisponible, stoc.StockId as idStockt');
		$this->db->from('producto prducto');
		$this->db->join('tipoproducto tipproductpo', 'prducto.TipoProductoid = tipproductpo.TipoProductoId');
		$this->db->join('unidadmedida unimedida', 'prducto.UniddadmedidaId = unimedida.unidadId');
		$this->db->join('stock stoc', 'stoc.ProductoId = prducto.ProductoId');
		$this->db->where('tipproductpo.Sigla', 'PRD_FINALPRD');
		$datos = $this->db->get();
		return $datos->result();
	}
}
