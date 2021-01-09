<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Home');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['totalKasus'] = $this->M_Home->countKasus();
		$data['totalPenyakit'] = $this->M_Home->countPenyakit();
		$data['totalPemeriksaan'] = $this->M_Home->countPemeriksaan();
		$data['komen']=$this->M_Home->getDataKomen();
		$data['page']='homeAdmin.php';
		$this->load->view('Admin/menu',$data);
	}

	public function DataKomentar()
	{
		$data['komen']=$this->M_Home->getDataKomen();
		$data['page']='Komentar.php';
		$this->load->view('Admin/menu',$data);
	}

	function hapus_komentar($id){
		$where = array('id_komen' => $id);
		$this->M_Home->hapus($where,'komentar');
		$this->session->set_flashdata('hapus','Hapus Komentar berhasil');
		redirect('Home/DataKomentar');
	}
}

?>