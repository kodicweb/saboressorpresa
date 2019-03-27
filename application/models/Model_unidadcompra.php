<?php

class Model_unidadcompra extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarUnidadcompra()
	{
		$this->db->select('undC.UnidadCompraId as idunidadcompra, undC.NombreUndCompra as nombreUnidadcompra, undC.Sigla, undC.Equivalente, undC.estado, und.Nombre as nombreunidadmedida, undC.UnidadMedidaId');
		$this->db->from('unidadcompra undC');
		$this->db->join('unidadmedida und', 'undC.UnidadMedidaId = und.unidadId');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function buscarUnidad($unidad)
	{
		$this->db->select('unidadId');
		$this->db->from('unidadmedida');
		$this->db->where('Sigla', $unidad);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function guardar($data)
    {
        $this->db->insert('unidadcompra', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function Editar($UnidadId, $data){
		$this->db->where('UnidadCompraId', $UnidadId);
		$this->db->update('unidadcompra', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
