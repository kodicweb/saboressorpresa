<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_cliente');
	}

	public function calcularEdad()
	{
		if ($this->input->is_ajax_request()) {
			$nacimiento = $this->input->post('nacimiento');
			$nacimiento = str_replace("/","-",$nacimiento);
			$nacimiento = date('Y/m/d',strtotime($nacimiento));
			$hoy = date('Y/m/d');
			$edad = date_diff($nacimiento, $hoy);
			//$edad = $hoy - $nacimiento;
			
		}
		echo $nacimiento. ' ' . $hoy . ' ' . $edad;
		
	}

	public function guardar(){
		if ($this->input->is_ajax_request()) {
            $NombreCliente = $this->input->post('NombreCliente');
            $SegundoNombre = $this->input->post('SegundoNombre');
            $ApePaterno = $this->input->post('ApePaterno');
            $ApeMaterno = $this->input->post('ApeMaterno');
            $Identificacion = $this->input->post('Identificacion');
            $FechaNac = $this->input->post('FechaNac');
            $Direccion = $this->input->post('Direccion');
            $Telefono = $this->input->post('Telefono');
            $Correo = $this->input->post('Correo');
			$Celular = $this->input->post('Celular');
			$arrayNombreHijo = $this->input->post('arrayNombreHijo');
			$arrayFechaNcHijo = $this->input->post('arrayFechaNcHijo');
			$arrayEdadHijo = $this->input->post('arrayEdadHijo');
			$TieneHijo = $this->input->post('TieneHijo');

			$mensaje = '';

			$data = array(
				'PrimerNombre' => $NombreCliente,
                'SegundoNombre' => $SegundoNombre,
                'PrimerApellido' => $ApePaterno,
                'SegundoApellido' => $ApeMaterno,
                'Identificacion' => $Identificacion,
                'FechaNacimiento' => $FechaNac,
                'Direccion' => $Direccion,
                'Telefono' => $Telefono,
                'Celular' => $Celular,
                'Correo' => $Correo
			);

			$idCliente = $this->Model_cliente->guardar($data);

			if($TieneHijo > 0 && $idCliente != ''){
				$i = 0;
				for ($i=0; $i < count($arrayNombreHijo); $i++) {
					$r = $this->Model_cliente->registrarInfoHijo($arrayNombreHijo[$i], $arrayFechaNcHijo[$i], $arrayEdadHijo[$i], $idCliente);
				}
				
				if($r == true){
					$mensaje = 1;
				} else {
					$mensaje = 2;
				}
			}else{
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

}