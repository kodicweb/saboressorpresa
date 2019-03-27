<?php

class Model_cargo extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function guardarCargo($data){
		$this->db->insert('cargo', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}

	public function ListarCargo(){
		$this->db->select('cargoId, Nombre, Descripcion, eliminado');
		$this->db->from('cargo');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function EditarCargo($txtIdCargo, $data){
		$this->db->where('cargoId', $txtIdCargo);
		$this->db->update('cargo', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
