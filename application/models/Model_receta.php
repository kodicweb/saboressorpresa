<?php

class Model_receta extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listarComboTipoReceta(){
		$this->db->select('TipoRecetaId, Nombre as nombreTipoReceta');
		$this->db->from('tiporeceta');
		$this->db->where('eliminado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function listarComboSubReceta(){
		$this->db->select('receta.RecetaId, receta.Nombre as nombreReceta, receta.CostoTotal');
		$this->db->from('receta');
		$this->db->join('tiporeceta', 'receta.TipoRecetaId = tiporeceta.TipoRecetaId');
		$this->db->where('receta.estado', 0);
		$this->db->where('tiporeceta.Sigla', 'RC_SUBRECETA');
		$datos = $this->db->get();
		return $datos->result();
	}

	public function listarComboProducto(){
		$this->db->select('producto.ProductoId, producto.Nombre as nombreProducto, producto.CostoUnitario, unidadmedida.Sigla');
		$this->db->from('producto');
		$this->db->join('unidadmedida', 'producto.UniddadmedidaId = unidadmedida.unidadId');
		$this->db->where('producto.estado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function ListarReceta(){
		$this->db->select('receta.RecetaId, receta.Nombre as nombreReceta, receta.Descripcion, receta.CostoTotal, receta.estado, tiporeceta.Nombre as TipoReceta, tiporeceta.TipoRecetaId');
		$this->db->from('receta');
		$this->db->join('tiporeceta', 'receta.TipoRecetaId = tiporeceta.TipoRecetaId');
		//$this->db->where('receta.estado', 0);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function ListarIngredientesReceta($RecetaId){
		$this->db->select('producto.ProductoId, producto.Nombre as nombreProducto, ingredientes.IngredienteId, ingredientes.Cantidad, ingredientes.Undmedida, ingredientes.CostoPorcion as Costounidad, ingredientes.CostoPreparacion as CostoTotalI');
		$this->db->from('ingredientes ingredientes');
		$this->db->join('producto producto', 'ingredientes.ProductoId = producto.ProductoId');
		$this->db->join('receta receta', 'receta.RecetaId = ingredientes.RecetaId');
		$this->db->where('producto.estado', 0);
		$this->db->where('ingredientes.estado', 0);
		$this->db->where('receta.recetaid', $RecetaId);
		$datos = $this->db->get();
		return $datos->result();
	}

	public function registrarReceta($data)
    {
        $this->db->insert('receta', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
    }

    public function registrarIngrediente($arrayproducto, $arraycantidadPorcion, $arrayundmedida, $arraycosto, $arraycostoPreparacion, $recetaId)
    {
		$data = array(
			'ProductoId' => $arrayproducto,
			'Cantidad' => $arraycantidadPorcion,
			'Undmedida' => $arrayundmedida,
			'CostoPorcion' => $arraycosto,
			'CostoPreparacion' => $arraycostoPreparacion,
			'RecetaId' => $recetaId
		);
        $this->db->insert('ingredientes', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function registrarIngredienteSubReceta($arraysub, $arraycotoSub, $recetaId)
    {
		$data = array(
			'SubRecetaId' => $arraysub,
			'Costo' => $arraycotoSub,
			'RecetaId' => $recetaId
		);
        $this->db->insert('subrecetaingrediente', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function editarReceta($RecetaId, $data){
		$this->db->where('RecetaId', $RecetaId);
		$this->db->update('receta', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editarIngrediente($arrayIngredienteId, $arrayproducto, $arraycantidadPorcion, $arrayundmedida, $arraycostoPreparacion, $arraycosto){
		$data = array(
			'ProductoId' => $arrayproducto,
			'Cantidad' => $arraycantidadPorcion,
			'Undmedida' => $arrayundmedida,
			'CostoPorcion' => $arraycosto,
			'CostoPreparacion' => $arraycostoPreparacion
			//'RecetaId' => $recetaId
		);
		$this->db->where('IngredienteId', $arrayIngredienteId);
		$this->db->update('ingredientes', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	
}
