<?php

class Model_unidadmedida extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarComboUnidadmedida()
	{
		$this->db->select('unidadId as idunidadmedida, Nombre as nombreUnidadmedida, Sigla as siglaUnidadMedida');
		$this->db->from('unidadmedida');
		$this->db->where('eliminado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function listarUnidadmedida()
	{
		$this->db->select('unidadId as idunidadmedida, Nombre as nombreUnidadmedida, Sigla as siglaUnidadMedida, eliminado as estado');
		$this->db->from('unidadmedida');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function guardar($data)
    {
        $this->db->insert('unidadmedida', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function Editar($UnidadId, $data){
		$this->db->where('unidadId', $UnidadId);
		$this->db->update('unidadmedida', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
