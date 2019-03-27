<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'/third_party/Spout/Autoloader/autoload.php';

 use Box\Spout\Reader\ReaderFactory;  
 use Box\Spout\Common\Type;

class Unidadcompra_controllers extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->load->Model('Model_menu');
		$this->load->Model('Model_unidadcompra');
	}
	
	public function listarUnidadcompra()
	{
		$data = $this->Model_unidadcompra->listarUnidadcompra();
		echo json_encode($data);
	}

	public function guardaruc(){
		if ($this->input->is_ajax_request()) {
			$NombreUnidadCompra = $this->input->post('NombreUnidadCompra');
			$siglaC 	= $this->input->post('siglaC');
			$equivalent = $this->input->post('equivalent');
			$Unidad 	= $this->input->post('Unidad');
			$mensaje = '';
			
			$data = array(
				'NombreUndCompra' => $NombreUnidadCompra,
				'Sigla' => $siglaC,
				'Equivalente' => $equivalent,
				'UnidadMedidaId' => $Unidad
			);

			if($this->Model_unidadcompra->guardar($data)){
			
				$mensaje = 1;
			} else{
				$mensaje = 2;
			}

			echo $mensaje;
		}
	}

	public function Editar(){
		if ($this->input->is_ajax_request()) {
			$NombreUCompra 		= $this->input->post('NombreUCompra');
			$sigla 				= $this->input->post('sigla');
			$UnidadMedidaid			= $this->input->post('UnidadMedidaid');
			$equivalent			= $this->input->post('equivalent');
			$UnidadId			= $this->input->post('UnidadCId');
			$mensaje = '';

			$data = array(
				'NombreUndCompra' => $NombreUCompra,
				'Sigla' => $sigla,
				'UnidadMedidaId' => $UnidadMedidaid,
				'Equivalente' => $equivalent
			);

			if($this->Model_unidadcompra->Editar($UnidadId, $data) == true){
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

			$data = array('estado' => 1 );

			if ($this->Model_unidadcompra->Editar($UnidadId, $data) == true) {
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

			$data = array('estado' => 0);
			if ($this->Model_unidadcompra->Editar($UnidadId, $data) == true) {
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
				$UnidadMedidaId = 0;
				//Numero de Hojas en el Archivo
				foreach ($reader->getSheetIterator() as $sheet) {
			
					// Numero de filas en el documento EXCEL
					foreach ($sheet->getRowIterator() as $row) {
			
						// Lee los Datos despues del encabezado
						// El encabezado se encuentra en la primera fila
						if($count > 1) {
							$result = $this->Model_unidadcompra->buscarUnidad($row[3]);
								foreach ($result as $value) {
									$UnidadMedidaId = $result->$value;
								} 
							echo $row[3];
							$data = array(
								'Sigla' => $row[0],
								'NombreUndCompra' => $row[1],
								'Equivalente' => $row[2],
								'UnidadMedidaId' => $UnidadMedidaId
								
							); 
				
							if($this->Model_unidadcompra->guardar($data)){
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
