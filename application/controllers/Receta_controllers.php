<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receta_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_receta');
	}

	public function listarComboTipoReceta()
	{
		$data = $this->Model_receta->listarComboTipoReceta();
		echo json_encode($data);
    }
    
    public function listarComboSubReceta()
	{
		$data = $this->Model_receta->listarComboSubReceta();
		echo json_encode($data);
	}

	public function listarComboProducto()
	{
		$data = $this->Model_receta->listarComboProducto();
		echo json_encode($data);
    }
    
    public function ListarReceta(){
		$data = $this->Model_receta->ListarReceta();
		echo json_encode($data);
    }
    
    public function ListarIngredientesReceta($RecetaId){
		$data = $this->Model_receta->ListarIngredientesReceta($RecetaId);
		echo json_encode($data);
	}

	public function guardar()
    {
        if ($this->input->is_ajax_request()){
            $nombreReceta = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $tiporeceta = $this->input->post('tiporeceta');
            $arrayproducto = $this->input->post('cbxProducto');
            $arraycantidadPorcion = $this->input->post('cantidad');
            $arrayundmedida = $this->input->post('arrayundmedida');
            $arraycosto = $this->input->post('costoPorcion');
            $arraycostoPreparacion = $this->input->post('costoPreparacion');
            $costoReceta = $this->input->post('costoReceta');
            $arraysub = $this->input->post('arraysub');
            $arraycotoSub = $this->input->post('arraycotoSub');

            $receta = array(
                'Nombre' => $nombreReceta,
                'Descripcion' => $descripcion,
                'CostoTotal' => $costoReceta,
                'TipoRecetaId' => $tiporeceta
            );

            $r = false;

            $recetaId = $this->Model_receta->registrarReceta($receta);

            if ($arraysub > 0) {
                $p = 0;
                   for ($p=0; $p < count($arraysub); $p++) {
                    $r = $this->Model_receta->registrarIngredienteSubReceta($arraysub[$p], $arraycotoSub[$p], $recetaId);
                }
            }

            if ($arrayproducto > 0) {
                $i = 0;
                   for ($i=0; $i < count($arrayproducto); $i++) {
                    $r = $this->Model_receta->registrarIngrediente($arrayproducto[$i], $arraycantidadPorcion[$i], $arrayundmedida[$i], $arraycosto[$i], $arraycostoPreparacion[$i], $recetaId);
                }
            }
            

            if($r == true){
                echo 'Se registro correctamente la receta';
            } else {
                echo 'Ocurrio un error al registrar la receta';
            } 
        }
        
    }

    public function EditarReceta(){
		if ($this->input->is_ajax_request()) {
			$RecetaId = $this->input->post('RecetaId');
			//$IngredienteId = $this->input->post('IngredienteId');
			$nombreReceta = $this->input->post('nombre');
            $descripcion = $this->input->post('descripcion');
            $tiporeceta = $this->input->post('tiporeceta');
            $arrayproducto = $this->input->post('cbxProducto');
            $arraycantidadPorcion = $this->input->post('cantidad');
            $arrayundmedida = $this->input->post('arrayundmedida');
            $arraycosto = $this->input->post('costoPorcion');
            $arraycostoPreparacion = $this->input->post('costoPreparacion');
            $costoReceta = $this->input->post('costoReceta');
            $arrayIngredienteId = $this->input->post('arrayIngredienteId');
            
			$receta = array(
                'Nombre' => $nombreReceta,
                'Descripcion' => $descripcion,
                'CostoTotal' => $costoReceta,
                'TipoRecetaId' => $tiporeceta
            );

            if($this->Model_receta->editarReceta($RecetaId, $receta) == true){

                $i = 0;
                for ($i=0; $i < count($arrayIngredienteId); $i++) {
                    $r = $this->Model_receta->editarIngrediente($arrayIngredienteId[$i], $arrayproducto[$i], $arraycantidadPorcion[$i], $arrayundmedida[$i], $arraycostoPreparacion[$i], $arraycosto[$i]);
                }

                if($r == true){
                    echo 'Se Actualizo correctamente la receta';
                } else {
                    echo 'Ocurrio un error al Actualizar la receta';
                }
            }

		}
    }
    
    public function Deshabilitar(){
		if ($this->input->is_ajax_request()) {
			$RecetaId = $this->input->post('RecetaId');
			$mensaje = '';

			$data = array('estado' => 1 );

			if ($this->Model_receta->editarReceta($RecetaId, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;

		}
	}

	public function Habilitar()
	{
		if ($this->input->is_ajax_request()) {
			$RecetaId = $this->input->post('RecetaId');
			$mensaje = '';

			$data = array('estado' => 0);
			if ($this->Model_receta->editarReceta($RecetaId, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

}
