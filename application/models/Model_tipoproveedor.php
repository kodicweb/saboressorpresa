<?php

class Model_tipoproveedor extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarComboTipoProveedor()
	{
		$this->db->select('TipoProveedorId as idTipoProveedor, Nombre as nombreTipoProveedo');
		$this->db->from('tipoproveedor');
		$this->db->where('eliminado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function listarTipoProveedor()
	{
		$this->db->select('TipoProveedorId as idTipoProveedor, Nombre as nombreTipoProveedo, Descripcion, sigla, eliminado as estado');
		$this->db->from('tipoproveedor');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function guardar($data)
    {
        $this->db->insert('tipoproveedor', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function Editar($TipoProveedorId, $data){
		$this->db->where('TipoProveedorId', $TipoProveedorId);
		$this->db->update('tipoproveedor', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
