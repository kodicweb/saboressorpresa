<?php

class Model_cliente extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function guardar($data){
		$this->db->insert('cliente', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}

	public function registrarInfoHijo($arrayNombreHijo, $arrayFechaNcHijo, $arrayEdadHijo, $idCliente)
	{
		$data = array(
			'Nombre' => $arrayNombreHijo,
			'FechaNacimiento' => $arrayFechaNcHijo,
			'edad' => $arrayEdadHijo,
			'ClienteId' => $idCliente
		);
        $this->db->insert('infofamiliar', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}
