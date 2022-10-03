<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class maestro_model extends CI_model {

	public function listaMaestros()
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario'); 
		$this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarmaestro($data)
	{
		$this->db->insert('usuario',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarmaestro($idUsuario)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->delete('usuario');
	}
	
	public function recuperarmaestro($idUsuario)
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario');    	//tabla
        $this->db->where('idUsuario',$idUsuario);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarmaestro($idUsuario,$data)
	{
	
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuario',$data);
	
      
	}

	public function listaMaestrosdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('usuario'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
