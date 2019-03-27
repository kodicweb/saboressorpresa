<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'/third_party/Spout/Autoloader/autoload.php';

 use Box\Spout\Reader\ReaderFactory;  
 use Box\Spout\Common\Type;

class Unidadmedidad_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_unidadmedida');
	}

	public function listarComboUnidadmedida()
	{
		$data = $this->Model_unidadmedida->listarComboUnidadmedida();
		echo json_encode($data);
	}

	public function listarUnidadmedida()
	{
		$data = $this->Model_unidadmedida->listarUnidadmedida();
		echo json_encode($data);
	}

	public function Guardar(){
		if ($this->input->is_ajax_request()) {
			$NombreMedida = $this->input->post('NombreMedida');
			$sigla 	= $this->input->post('sigla');
			$mensaje = '';

			$data = array(
				'Nombre' => $NombreMedida,
				'Sigla' => $sigla,
			);

			if($this->Model_unidadmedida->guardar($data)){
			
				$mensaje = 1;
			} else{
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function Editar(){
		if ($this->input->is_ajax_request()) {
			$NombreMedida 		= $this->input->post('NombreMedida');
			$sigla 				= $this->input->post('sigla');
			$UnidadId			= $this->input->post('UnidadId');
			$mensaje = '';

			$data = array(
				'Nombre' => $NombreMedida,
				'Sigla' => $sigla
			);

			if($this->Model_unidadmedida->Editar($UnidadId, $data) == true){
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}
			echo $mensaje;
		}
	}

	public function Deshabilitar(){
		if ($this->input->is_ajax_request()) {
			$UnidadId = $this->input->post('unidadId');
			$mensaje = '';

			$data = array('eliminado' => 1 );

			if ($this->Model_unidadmedida->Editar($UnidadId, $data) == true) {
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
			$UnidadId = $this->input->post('unidadId');
			$mensaje = '';

			$data = array('eliminado' => 0);
			if ($this->Model_unidadmedida->Editar($UnidadId, $data) == true) {
				$mensaje = 1;
			} else {
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function cargue(){
		if (!empty($_FILES['file']['name'])) {
			$pathinfo = pathinfo($_FILES["file"]["name"]);
		
			if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') && $_FILES['file']['size'] > 0 ) {
				$base_url = base_url();
				// Nombre Temporal del Archivo
				$inputFileName = $_FILES['file']['tmp_name']; 
			
				//Lee el Archivo usando ReaderFactory
				$reader = ReaderFactory::create(Type::XLSX);
			
				//Esta linea mantiene el formato de nuestras horas y fechas
				//Sin esta linea Spout convierte la hora y fecha a su propio formato
				//predefinido como DataTime
			
				$reader->setShouldFormatDates(true);
			
				// Abrimos el archivo
				$reader->open($inputFileName);
				$count = 1;
			
				//Numero de Hojas en el Archivo
				foreach ($reader->getSheetIterator() as $sheet) {
			
					// Numero de filas en el documento EXCEL
					foreach ($sheet->getRowIterator() as $row) {
			
						// Lee los Datos despues del encabezado
						// El encabezado se encuentra en la primera fila
						if($count > 1) {
				
				
							$data = array(
								'Nombre' => $row[0],
								'Sigla' => $row[1]
								
							); 
				
							if($this->Model_unidadmedida->guardar($data)){
								$mensaje = 'Archibo subido con exitos, los datos se han registrado correctamente en el sistema';
								
							} else{
								$mensaje = 'No se Guardaron los datos en el sistema';
							}
								
							echo $mensaje;
						} 
						$count++;
					}
				}
		
			// cerramos el archivo EXCEL
				$reader->close();
		
			} else {
				echo "Seleccione un tipo de Archivo Valido";
			}
		
		} else {
			echo "Seleccione un Archivo EXCEL";
		}
	}

}
