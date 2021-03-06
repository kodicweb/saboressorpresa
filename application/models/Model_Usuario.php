<?php

class Model_Usuario extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function registrarEmpleado($data)
    {
        $this->db->insert('empleado', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
    }

    public function registrarUsuario($data)
    {
        $this->db->insert('usuario', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
    }

    # consultar credenciales del usuario para ingresar a la aplicación
    public function Ingresar($usuario, $password){
        $this->db->select('usuario.NombreUsuario as nombreUsuario, usuario.UsuarioId as idUsuario, empleado.PrimerApellido, empleado.SegundoApellido, empleado.PrimerNombre, empleado.SegundoNombre, empleado.RutaFoto, empleado.Correo,cargo.cargoId, cargo.Nombre as nombreCargo, cargo.Sigla');
		$this->db->from('usuario usuario');
        $this->db->join('empleado empleado','usuario.EmpleadoId = empleado.EmpleadoId');
        $this->db->join('cargo cargo','cargo.cargoId = usuario.cargoId');
        $this->db->where('usuario.NombreUsuario', $usuario);
        $this->db->where('usuario.Pass', $password);
        $this->db->where('usuario.estado', 0);
        $resultado = $this->db->get();
        
        if ($resultado->num_rows() == 1) {
            $r = $resultado->row();
            $s_usuario = array(
                'session_idUsuario' => $r->idUsuario,
                'session_cargo' => $r->cargoId,
                'session_nombreCargo' => $r->nombreCargo,
                'session_siglacargo' => $r->Sigla,
				'session_email' => $r->Correo,
                'session_primerNombre' => $r->PrimerNombre,
                'session_segundoNombre' => $r->SegundoNombre,
                'session_primerApellido' => $r->PrimerApellido,
                'session_segundoApellido' => $r->SegundoApellido
            );
			$this->session->set_userdata($s_usuario);
			return 1;
        } else {
            return 0;
        }
    }

    public function Listarusuario(){
		$this->db->select('user.NombreUsuario, car.Nombre as cargo, user.pass, emp.PrimerNombre, emp.Identificacion');
		$this->db->from('usuario user');
		$this->db->join('empleado emp', 'user.EmpleadoId = emp.EmpleadoId');
		$this->db->join('cargo car', 'user.cargoId = car.cargoId');
		$datos = $this->db->get();
		return $datos->result();
	}
}
