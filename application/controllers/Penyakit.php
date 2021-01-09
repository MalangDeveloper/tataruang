<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Penyakit');
		$this->load->library(array('form_validation','session'));

		if(!$this->session->userdata('level'))
		{
			redirect('welcome');
		}

	}

	public function index()
	{
		$data['penyakit'] = $this->M_Penyakit->getDataPenyakit();
		$data['page']='Penyakit.php';
		$this->load->view('Admin/menu',$data);
	}

	public function addPenyakit()
	{
		$data['page']='addPenyakit.php';
		$this->load->view('Admin/menu',$data);
	}

	public function simpanPenyakit()
	{
		$data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
//        jika anda mau, anda bisa mengatur tampilan pesan error dengan menambahkan element dan css nya
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('nm_penyakit', 'Nama Penyakit', 'required');
		$this->form_validation->set_rules('detail', 'Detail Penyakit', 'required');
		$this->form_validation->set_rules('solusi', 'Solusi Penyakit', 'required');

		if($this->form_validation->run()==FALSE){
			$data['page']='addPenyakit.php';
			$this->load->view('Admin/menu',$data);
		}else{
			$this->M_Penyakit->inputPenyakit();
			$this->session->set_flashdata('success','Tambah Penyakit berhasil');
			redirect('Penyakit');
		}
	}

	public function ubahPenyakit($id){
		$where = array('id_penyakit' => $id);
		$data['penyakit'] = $this->M_Penyakit->getDataID($where,'penyakit')->result();
		$data['page']='editPenyakit.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahPenyakit($id)
	{
		$this->M_Penyakit->updatePenyakit($id);
		$this->session->set_flashdata('success','Penyakit Berhasil Diubah');
		redirect('Penyakit','refresh');
	}

	function hapusPenyakit($id)
	{
		$where = array('id_penyakit' => $id);
		$this->M_Penyakit->hapus($where,'penyakit');
		$this->session->set_flashdata('success','Data Penyakit Berhasil Dihapus');
		redirect('Penyakit');
	}
}