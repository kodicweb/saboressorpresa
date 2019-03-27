<?php

class Model_tiporeceta extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarTiporeceta()
	{
		$this->db->select('TipoRecetaId as idTipoReceta, Nombre as nombreTipoReceta, sigla, eliminado as estado');
		$this->db->from('tiporeceta');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function guardar($data)
    {
        $this->db->insert('tiporeceta', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function Editar($TipoRecetaId, $data){
		$this->db->where('TipoRecetaId', $TipoRecetaId);
		$this->db->update('tiporeceta', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
