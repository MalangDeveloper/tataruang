<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Pemesanan');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['totalFakultas'] = $this->M_Pemesanan->countFakultas();
		$data['totalLaboratorium'] = $this->M_Pemesanan->countLaboratorium();
		$data['totalPemesanan'] = $this->M_Pemesanan->countPemesanan();
		$data['page']='homeAdmin.php';
		$this->load->view('Admin/menu', $data);
	}

	public function DataPemesanan()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Admin/menu',$data);
	}

	public function editProfil(){
		$data['user']= $this->M_Pemesanan->getUserId();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['page']='editProfile.php';
		$this->load->view('Admin/menu',$data);
	}

	public function updateProfile()
	{
		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
	    $data['level'] = set_value('level');
	    $this->session->set_userdata($data);
	    $this->M_Pemesanan->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Admin/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'=>md5($this->input->post('password'))
        );
        $this->M_Pemesanan->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Admin/editProfil');
    }

    public function ubahPemesanan($id){
		$where = array('id_pemesanan' => $id);
		$data['pemesanan'] = $this->M_Pemesanan->getdataID($where,'pemesanan')->result();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$data['page']='editPemesanan.php';
		$this->load->view('Admin/menu',$data);
	}

	public function prosesUbahpemesanan($id)
	{
		$this->M_Pemesanan->updatePemesanan($id);
		$this->session->set_flashdata('success','Pemesanan Berhasil Diubah');
		redirect('Admin/DataPemesanan','refresh');
	}

		function hapusPemesanan($id){
		$where = array('id_pemesanan' => $id);
		$this->M_Pemesanan->hapus($where,'pemesanan');
		$this->session->set_flashdata('success',"Data Pemesanan Berhasil Dihapus");
		redirect('Pemesanan');
	}

	public function DataRuang()
	{
		$data['ruang'] = $this->M_Pemesanan->view_ruang();
		$data['page']='ruang.php';
		$this->load->view('Admin/menu', $data);
	}

	public function DataKomputer()
	{
		$data['komputer'] = $this->M_Pemesanan->view_komputer();
		$data['page']='komputer.php';
		$this->load->view('Admin/menu', $data);
	}
}
?>