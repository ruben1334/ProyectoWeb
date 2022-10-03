<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Maestros extends CI_Controller {

	public function index()
	{
		

	if($this->session->userdata('tipo')=='admin')
		{

		$listaMaestros=$this->maestro_model->listaMaestros();
		$data['maestro']=$listaMaestros;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaMaestros',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
        }
else
		{
			redirect('usuarios/panel','refresh');
		}

	
	}
public function guest()
{
	
		
	
		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaEstudiantes',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	
	
}

	public function listaxlsx()
	{
		$lista=$this->maestro_model->listaMaestros();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="listaMaestros.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Primer Apellido');
		$sheet->setCellValue('D1', 'Segundo Apellido ');
		$sheet->setCellValue('G1', 'Carnet de Identidad');
		$sheet->setCellValue('E1', 'Fecha nacimiento');
		$sheet->setCellValue('F1', 'Bautizado');
		$sheet->setCellValue('H1', 'Telefono');

		$sn=2;
			foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idUsuario);
			$sheet->setCellValue('B'.$sn,$row->nombre);
			$sheet->setCellValue('C'.$sn,$row->primerApellido);
			$sheet->setCellValue('D'.$sn,$row->segundoApellido);
			$sheet->setCellValue('G'.$sn,$row->CarnetIdentidad);
			$sheet->setCellValue('E'.$sn,$row->fechaNacimiento);
			$sheet->setCellValue('F'.$sn,$row->bautizado);
			$sheet->setCellValue('H'.$sn,$row->telefono);
			$sn++; 
			}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function agregar()
	{
		$listaMaestros=$this->maestro_model->listaMaestros();
		$data['maestro']=$listaMaestros;

		$this->load->view('inc/headersbadmin');
		$this->load->view('formularioMaestro');
		$this->load->view('inc/footersbadmin');
	}

	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['CarnetIdentidad']=$_POST['CarnetIdentidad'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];
		$data['telefono']=$_POST['telefono'];

		
		$listaMaestros=$this->maestro_model->agregarmaestro($data);
		redirect('Maestros/index','refresh');
	}

	public function eliminarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$this->maestro_model->eliminarmaestro($idUsuario);
		redirect('Maestros/index','refresh');
	}

	public function modificar()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['infomaestro']=$this->maestro_model->recuperarmaestro($idUsuario);
		
		$this->load->view('inc/headersbadmin');
		$this->load->view('formulariomodificarMaestro',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}
	public function modificarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['bautizado']=$_POST['bautizado'];   
		$nombrearchivo=$idUsuario.".jpg";
		$config['upload_path']='./uploads2';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads2/".$nombrearchivo;
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		

		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload()) {
			$data['error']=$this->upload->display_errors();
		}
		else {
			$data['foto']=$nombrearchivo;
			$this->upload->data();
		}


		$this->maestro_model->modificarmaestro($idUsuario,$data);
		redirect('Maestros/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['estado']='0';

		$this->maestro_model->modificarmaestro($idUsuario,$data);
		redirect('Maestros/index','refresh');
	
	}
	
	public function deshabilitados()
	{
		$listaMaestros=$this->maestro_model->listaMaestrosdeshabilitados();
		$data['maestro']=$listaMaestros;

		$this->load->view('inc/headersbadmin');
		$this->load->view('inc/Sidebarsbadmin');
		$this->load->view('listaMaestrosdeshabilitados',$data);
		$this->load->view('inc/creditos');
		$this->load->view('inc/footersbadmin');
	}

	public function habilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['estado']='1';

		$this->maestro_model->modificarmaestro($idUsuario,$data);
		redirect('Maestros/deshabilitados','refresh');
	
	}

	public function pedido()
	{
		$data['infopedido']=$this->pedido_model->listaPedido($idPedido);
		$this->load->view('inc/headersbadmin');
		$this->load->view('formularioPedido');
		$this->load->view('inc/footersbadmin');

	}
}
