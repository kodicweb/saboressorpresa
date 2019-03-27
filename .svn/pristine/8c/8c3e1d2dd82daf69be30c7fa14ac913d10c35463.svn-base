<?php

class Model_tipoventa extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ListarTipoVentaCombo()
	{
		$this->db->select('tv.TipoVentaId as TipoVentaId, tv.Nombre as nombreTipoVenta, tv.Sigla');
		$this->db->from('TipoVenta tv');
		$this->db->where('eliminado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}
}
