<?php

class Model_tipoproducto extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarComboTipoProducto(){
		$this->db->select('TipoProductoId as idTipoProducto, Nombre as nombreTipoProducto');
		$this->db->from('tipoproducto');
		$this->db->where('eliminado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}
}
