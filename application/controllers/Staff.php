<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Staff');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['totalFakultas'] = $this->M_Staff->countFakultas();
		$data['totalLaboratorium'] = $this->M_Staff->countLaboratorium();
		$data['totalPemesanan'] = $this->M_Staff->countPemesanan();
		// $data['komen']=$this->M_Staff->getDataKomen();
		$data['page']='homeStaff.php';
		$this->load->view('Staff/menu', $data);
	}

	public function DataPemesanan()
	{
		$data['pemesanan'] = $this->M_Staff->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Staff/menu',$data);
	}

	public function DataKasus()
	{
		$data['kasus'] = $this->M_Staff->getDataKasus();
		$data['page']='BasisKasus.php';
		$this->load->view('Staff/menu',$data);
	}

	public function detailKasus($id)
	{
		$data['kasus'] = $this->M_Staff->getDataKasusId($id);
		$data['page']='DetailKasus.php';
		$this->load->view('Staff/menu',$data);
	}

	public function DataPemeriksaan()
	{
		$data['pemeriksaan'] = $this->M_Staff->getDataPemeriksaan();
		$data['page']='Pemeriksaan.php';
		$this->load->view('Staff/menu',$data);
	}

	public function detailPemeriksaan($id)
	{
		$data['pemeriksaan'] = $this->M_Staff->getDataPemeriksaanId($id);
		$data['page']='PemeriksaanDetail.php';
		$this->load->view('Staff/menu',$data);
	}

	public function hapusPemeriksaan($id)
    {
    	$where = array('id_pemeriksaan' => $id);
		$this->M_Staff->hapus($where,'pemeriksaan');
		$this->session->set_flashdata('success','Data Kasus Berhasil Dihapus');
		redirect('Staff/DataPemeriksaan');
    }

	public function DataPemeriksaanRevisi()
	{
		$data['pemeriksaan'] = $this->M_Staff->getDataPemeriksaanRevisi();
		$data['penyakitKasus']=$this->M_Staff->ambilPenyakit();
		$data['page']='PemeriksaanRevisi.php';
		$this->load->view('Staff/menu',$data);
	}

	public function detailPemeriksaanRevisi($id)
	{
		$where = array('id_pemeriksaan' => $id);
		$data['penyakit'] = $this->M_Staff->getdataID($where,'pemeriksaan')->result();
		$data['penyakitKasus']=$this->M_Staff->ambilPenyakit();
		$data['pemeriksaan'] = $this->M_Staff->getDataPemeriksaanId($id);
		$data['page']='PemeriksaanDetailRevisi.php';
		$this->load->view('Staff/menu',$data);
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
		$this->M_Staff->updatePemeriksaan($where, $data, 'pemeriksaan');

		//proses 2, input data kasus ke database basis_kasus dan detail_kasus
		$output = $this->input->post('bobot', TRUE);
		$fk_gejala = $this->input->post('fk_gejala', TRUE);
		$this->M_Staff->addKeBasis($output, $fk_gejala);
		
		$this->session->set_flashdata('success','Data Kasus Berhasil Direvisi');
		redirect('Staff/DataPemeriksaanRevisi');
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
		$this->M_Staff->updatePemeriksaan($where, $data, 'pemeriksaan');
		$this->session->set_flashdata('success','Data Kasus Berhasil Dihapus dari Kasus Revisi');
		redirect('Staff/DataPemeriksaanRevisi');
	}

	public function editProfil(){
		$data['user']= $this->M_Staff->getUserId();
		$data['page']='editProfile.php';
		$this->load->view('Staff/menu',$data);
	}

	public function updateProfile()
	{
		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
	    $data['alamat'] = set_value('alamat');
	    $data['noWa'] = set_value('noWa');
	    $this->session->set_userdata($data);
	    $this->M_Staff->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Staff/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'=>md5($this->input->post('password'))
        );
        $this->M_Staff->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Staff/editProfil');
    }

    public function ubahPemesanan($id){
		$where = array('id_pemesanan' => $id);
		$data['pemesanan'] = $this->M_Staff->getdataID($where,'pemesanan')->result();
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		$data['kursus']=$this->M_Staff->ambilKursus();
		$data['instruktur']=$this->M_Staff->ambilInstruktur();
		$data['ruang']=$this->M_Staff->ambilRuang();
		$data['page']='editPemesanan.php';
		$this->load->view('Staff/menu',$data);
	}
}
?>