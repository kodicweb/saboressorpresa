<?php

class Cuser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Usuario');
    }

    public function index()
    {
       // $this->load->view('Login/Vlogin');
    }

    public function Listarusuario(){
		$data = $this->Model_Usuario->Listarusuario();
		echo json_encode($data);
    }
     
    public function guardar()
    {
        if ($this->input->is_ajax_request()){
            $nombreEmpleado = $this->input->post('nombre');
            $identificacion = $this->input->post('identificacion');
            $email = $this->input->post('email');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cargo = $this->input->post('cargo');

            $empleado = array(
                'PrimerNombre' => $nombreEmpleado,
                'Identificacion' => $identificacion,
                'Correo' => $email,
                'Direccion' => $direccion,
                'Telefono' => $telefono,
            );

            $empleadoId = $this->Model_Usuario->registrarEmpleado($empleado);

            $user = array(
                'NombreUsuario' => $username,
                'Pass' => $password,
                'EmpleadoId' => $empleadoId,
                'cargoId' => $cargo
            );

            if($this->Model_Usuario->registrarUsuario($user) == true){
                echo 'Se registro correctamente el empleado';
            } else {
                echo 'Ocurrio un error al registrar el usuario';
            } 
        }
        
    
    }

}
