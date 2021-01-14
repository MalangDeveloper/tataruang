<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {


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
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Admin/menu', $data);
	}

	public function DataPemesanan()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Admin/menu',$data);
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

	public function simpanPemesanan()
	{
		$id_ruang=$this->input->post('id_ruang');
        $tanggal=$this->input->post('tanggal');
        $jam_awal=$this->input->post('jam_awal');
        $jam_akhir=$this->input->post('jam_akhir');
        $id_fakultas=$this->input->post('id_fakultas');
        $id_kursus=$this->input->post('id_kursus');
        $id_instruktur=$this->input->post('id_instruktur');
        $this->session->set_flashdata('success','Tambah Pemesanan berhasil');
        $this->M_Pemesanan->inputdata($id_ruang,$tanggal,$jam_awal,$jam_akhir,$id_fakultas,$id_kursus,$id_instruktur);
        redirect('Pemesanan');
	}

}
?>