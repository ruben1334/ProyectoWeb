<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedido_model extends CI_model {

	public function listaPedido()
	{
		$this->db->select('*');         //select *
        $this->db->from('material'); 
		$this->db->where('estado','1');
        return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function agregarpedido($data)
	{
		$this->db->insert('material',$data);       //devolucion de resultado de la consulta
	}

	public function eliminarpedido($idMaterial)
	{
		$this->db->where('idMaterial',$idMaterial);
		$this->db->delete('material');
	}
	
	public function recuperarpedido($idMaterial)
	{
		$this->db->select('*');         //select *
        $this->db->from('material');    	//tabla
        $this->db->where('idMaterial',$idMaterial);
		return $this->db->get();        //devolucion de resultado de la consulta
	}

	public function modificarpedido($idMaterial,$data)
	{
	
		$this->db->where('idMaterial',$idMaterial);
		$this->db->update('material',$data);
	
      
	}

	public function listapedidosdeshabilitados()
	{
		$this->db->select('*');         //select *
        $this->db->from('material'); 
		$this->db->where('estado','0');
        return $this->db->get();        //devolucion de resultado de la consulta
	}


}
