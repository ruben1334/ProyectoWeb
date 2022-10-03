<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pedido extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('tipo')=='admin')
		{
		$listaPedido=$this->pedido_model->listaPedido();
		$data['pedido']=$listaPedido;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaPedido',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
		}
		else
		{
			redirect('usuarios/panel','refresh');
		}
		
	
	
}

	public function listaxlsx()
	{
		$lista=$this->pedido_model->listaPedido();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaPedido.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre del Pedido');
		$sheet->setCellValue('C1', 'Stock');
		$sheet->setCellValue('D1', 'Unidad de Medida ');
		$sheet->setCellValue('E1', 'Descripción');
		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idPedido);
			$sheet->setCellValue('B'.$sn,$row->nombreMaterial);
			$sheet->setCellValue('C'.$sn,$row->stock);
			$sheet->setCellValue('D'.$sn,$row->unidadMedida);
			$sheet->setCellValue('E'.$sn,$row->descripcion);
		$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaPedido=$this->pedido_model->listaPedido();
		$data['pedido']=$listaPedido;


		$this->load->view('inc/headersbadmin');
		$this->load->view('formularioPedido');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['unidadMedida']=$_POST['unidadMedida'];
		$data['descripcion']=$_POST['descripcion'];
		$formularioMaterial=$this->pedido_model->agregarpedido($data);
		redirect('Pedido/index','refresh');
	}

	public function eliminarbd()
	{
		$idPedido=$_POST['idPedido'];
		$this->pedido_model->eliminarpedido($idPedido);
		redirect('Pedido/index','refresh');
	}

public function modificar()
	{
		$idPedido=$_POST['idPedido'];
		$data['infomaterial']=$this->pedido_model->recuperarpedido($idPedido);
		$listaPedido=$this->pedido_model->listaPedido();
		$data['pedido']=$listaPedido;


		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('formularioModificarPedido',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idPedido=$_POST['idPedido'];
		$data['nombreMaterial']=$_POST['nombreMaterial'];
		$data['stock']=$_POST['stock'];
		$data['unidadMedida']=$_POST['unidadMedida'];
		$data['descripcion']=$_POST['descripcion'];    
	


		$this->pedido_model->modificarpedido($idPedido,$data);
		redirect('Pedido/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idPedidos=$_POST['idPedido'];
		$data['estado']='0';

		$this->pedido_model->modificarpedido($idPedido,$data);
		redirect('Pedido/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaPedido=$this->pedido_model->listapedidosdeshabilitados();
		$data['pedido']=$listaPedido;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaPedido',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idPedido=$_POST['idPedido'];
	$data['estado']='1';

		$this->pedido_model->modificarpedido($idPedido,$data);
		redirect('Pedido/deshabilitados','refresh');
	
	}
	
  }
