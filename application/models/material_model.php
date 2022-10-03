<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class material_model extends CI_model {

	public function listaMaterial()
	{
		$this->db->select('*');         //select *
        $this->db->from('material'); 
		$this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarmaterial($data)
	{
		$this->db->insert('material',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarmaterial($idMaterial)
	{
		$this->db->where('idMaterial',$idMaterial);
		$this->db->delete('material');
	}
	
	public function recuperarmaterial($idMaterial)
	{
		$this->db->select('*');         //select *
        $this->db->from('material');    	//tabla
        $this->db->where('idMaterial',$idMaterial);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarmaterial($idMaterial,$data)
	{
	
		$this->db->where('idMaterial',$idMaterial);
		$this->db->update('material',$data);
	
      
	}

	public function listaMaterialdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('material'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
