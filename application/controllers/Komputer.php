<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komputer extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Komputer');
		$this->load->model('M_Ruang');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['komputer']=$this->M_Komputer->getDataKomputer();
		$data['ruang']=$this->M_Ruang->getDataRuang();
		$data['page']='Komputer.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan Komputer setelah menambah data baru
	function simpanKomputer(){
		$this->M_Komputer->inputKomputer();
		$this->session->set_flashdata('success','Komputer Berhasil Ditambah');
		redirect('Komputer','refresh');
    }

	// proses update data Komputer
	public function ubahKomputer($id){
		$where = array('id_komputer' => $id);
		$data['komputer'] = $this->M_Komputer->getDataID($where,'komputer')->result();
		$data['ruang']=$this->M_Ruang->ambilRuang();
		$data['page']='ubahKomputer.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahKomputer($id)
	{
		$this->M_Komputer->updateKomputer($id);
		$this->session->set_flashdata('success','Komputer Berhasil Diubah');
		redirect('Komputer','refresh');
	}

	function hapusKomputer($id){
		$where = array('id_komputer' => $id);
		$this->M_Komputer->hapus($where,'Komputer');
		$this->session->set_flashdata('success',"Data Komputer Berhasil Dihapus");
		redirect('Komputer');
	}
}
?>