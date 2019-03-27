<?php

class Model_proveedor extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarComboProveedor(){
		$this->db->select('ProveedorId as idProveedor, Nombre as nombreProveedo');
		$this->db->from('proveedor');
		$this->db->where('estado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function guardarProveedor($data){
		$this->db->insert('proveedor', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();;
		} else {
			return false;
		}
	}

	public function EditarProveedor($txtIdProvedor, $data){
		$this->db->where('ProveedorId', $txtIdProvedor);
		$this->db->update('proveedor', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function ListarProveedores(){
		$this->db->select('provedor.Nombre as nombreProveedor, provedor.Nit as nitProveedor, provedor.Direccion as direccionProveedor, provedor.Telefono as telefonoProveedor, tipoproveedor.TipoProveedorId as idTipoProveedor, tipoproveedor.Nombre, provedor.estado, provedor.ProveedorId as idProveedor');
		$this->db->from('proveedor provedor');
		$this->db->join('tipoproveedor tipoproveedor', 'provedor.TipoProveedorId = tipoproveedor.TipoProveedorId');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function ListarProveedoresCombo(){
		$this->db->select('provedor.Nombre as nombreProveedor, provedor.ProveedorId as idProveedor');
		$this->db->from('proveedor provedor');
		$this->db->join('tipoproveedor tipoproveedor', 'provedor.TipoProveedorId = tipoproveedor.TipoProveedorId');
		$datos = $this->db->get();
		return $datos->result();
	}
}
