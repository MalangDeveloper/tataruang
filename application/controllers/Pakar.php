<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakar extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Pakar');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		// $data['totalKasus'] = $this->M_Pakar->countKasus();
		// $data['totalRevisi'] = $this->M_Pakar->countRevisi();
		// $data['totalPemeriksaan'] = $this->M_Pakar->countPemeriksaan();
		// $data['komen']=$this->M_Pakar->getDataKomen();
		$data['page']='homePakar.php';
		$this->load->view('Pakar/menu', $data);
	}

	public function DataPenyakit()
	{
		$data['penyakit'] = $this->M_Pakar->getDataPenyakit();
		$data['page']='Penyakit.php';
		$this->load->view('Pakar/menu',$data);
	}

	public function DataKasus()
	{
		$data['kasus'] = $this->M_Pakar->getDataKasus();
		$data['page']='BasisKasus.php';
		$this->load->view('Pakar/menu',$data);
	}

	public function detailKasus($id)
	{
		$data['kasus'] = $this->M_Pakar->getDataKasusId($id);
		$data['page']='DetailKasus.php';
		$this->load->view('Pakar/menu',$data);
	}

	public function DataPemeriksaan()
	{
		$data['pemeriksaan'] = $this->M_Pakar->getDataPemeriksaan();
		$data['page']='Pemeriksaan.php';
		$this->load->view('Pakar/menu',$data);
	}

	public function detailPemeriksaan($id)
	{
		$data['pemeriksaan'] = $this->M_Pakar->getDataPemeriksaanId($id);
		$data['page']='PemeriksaanDetail.php';
		$this->load->view('Pakar/menu',$data);
	}

	public function hapusPemeriksaan($id)
    {
    	$where = array('id_pemeriksaan' => $id);
		$this->M_Pakar->hapus($where,'pemeriksaan');
		$this->session->set_flashdata('success','Data Kasus Berhasil Dihapus');
		redirect('Pakar/DataPemeriksaan');
    }

	public function DataPemeriksaanRevisi()
	{
		$data['pemeriksaan'] = $this->M_Pakar->getDataPemeriksaanRevisi();
		$data['penyakitKasus']=$this->M_Pakar->ambilPenyakit();
		$data['page']='PemeriksaanRevisi.php';
		$this->load->view('Pakar/menu',$data);
	}

	public function detailPemeriksaanRevisi($id)
	{
		$where = array('id_pemeriksaan' => $id);
		$data['penyakit'] = $this->M_Pakar->getdataID($where,'pemeriksaan')->result();
		$data['penyakitKasus']=$this->M_Pakar->ambilPenyakit();
		$data['pemeriksaan'] = $this->M_Pakar->getDataPemeriksaanId($id);
		$data['page']='PemeriksaanDetailRevisi.php';
		$this->load->view('Pakar/menu',$data);
	}

	//proses revise dan dilanjutkan ke proses retain karena kasus baru cocok untuk dijadikan solusi baru di basis_kasus
	function ProsesRevisi($id){
		//proses 1 yaitu update tabel pemeriksaan
		$data = array(
			'fk_penyakit' => $this->input->post('fk_penyakit'),
			'fk_user' => $_SESSION['id_users'],
			'status' => "4",
			'tgl_direvisi' => date("Y-m-d")
		);
		$where = array(
			'id_pemeriksaan' => $id
		);
		$this->M_Pakar->updatePemeriksaan($where, $data, 'pemeriksaan');

		//proses 2, input data kasus ke database basis_kasus dan detail_kasus
		$output = $this->input->post('bobot', TRUE);
		$fk_gejala = $this->input->post('fk_gejala', TRUE);
		$this->M_Pakar->addKeBasis($output, $fk_gejala);
		
		$this->session->set_flashdata('success','Data Kasus Berhasil Direvisi');
		redirect('Pakar/DataPemeriksaanRevisi');
	}

	//Proses revise tapi tidak membutuhkan revisi dan tidak perlu melanjutkan ke proses retain karena kasus baru tidak cocok untuk dijadikan solusi baru
	function ProsesRevisiDihapus($id){
		$data = array(
			'fk_user' => $_SESSION['id_users'],
			'status' => "3",
			'tgl_direvisi' => date("Y-m-d")
		);
		$where = array(
			'id_pemeriksaan' => $id
		);
		$this->M_Pakar->updatePemeriksaan($where, $data, 'pemeriksaan');
		$this->session->set_flashdata('success','Data Kasus Berhasil Dihapus dari Kasus Revisi');
		redirect('Pakar/DataPemeriksaanRevisi');
	}

	public function editProfil(){
		$data['user']= $this->M_Pakar->getUserId();
		$data['page']='editProfile.php';
		$this->load->view('pakar/menu',$data);
	}

	public function updateProfile()
	{
		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
	    $data['alamat'] = set_value('alamat');
	    $data['noWa'] = set_value('noWa');
	    $this->session->set_userdata($data);
	    $this->M_Pakar->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Pakar/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'		=>md5($this->input->post('password'))
        );
        $this->M_Pakar->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Pakar/editProfil');
    }
}
?>