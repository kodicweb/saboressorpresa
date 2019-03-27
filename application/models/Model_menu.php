<?php

class Model_menu extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    # Query para traer menus asignados
    public function ListarMenus($siglacargo){
        $this->db->select('menu.Nombre, menu.MenuId, menu.carpeta, menu.ruta, menu.ClaseIcono as icono');
        $this->db->from('menu menu');
		$this->db->join('asignarusuariomenu asgmenu','menu.MenuId = asgmenu.menuId');
		$this->db->join('tipomenu tipomenu','tipomenu.TipoMenuId = menu.TipoMenuId');
        $this->db->join('usuario usuario','usuario.UsuarioId = asgmenu.usuarioId');
        $this->db->join('cargo cargo','cargo.cargoId = usuario.cargoId');
		$this->db->where('cargo.Sigla', $siglacargo);
		$this->db->where('tipomenu.Sigla', 'MENU_PADRE');
		$this->db->where('menu.eliminado',0);
        $datos = $this->db->get();
        return $datos->result();
	}
	
	// Query para traer los menus de nivel 2
	public function ListarMenusHijo2($siglacargo){
		$this->db->select('menu.Nombre, menu.MenuId, menu.carpeta, menu.ruta, menu.ClaseIcono as icono,  menu.MenuIdPadre');
		$this->db->from('menu menu');
		$this->db->join('asignarusuariomenu asgmenu','menu.MenuId = asgmenu.menuId');
		$this->db->join('tipomenu tipomenu','tipomenu.TipoMenuId = menu.TipoMenuId');
		$this->db->join('usuario usuario','usuario.UsuarioId = asgmenu.usuarioId');
		$this->db->join('cargo cargo','cargo.cargoId = usuario.cargoId');
		$this->db->where('cargo.Sigla', $siglacargo);
		$this->db->where('tipomenu.Sigla', 'MENU_HIJO2');
		$this->db->where('menu.eliminado',0); 
		$datos = $this->db->get();
		return $datos->result();
	}
}
