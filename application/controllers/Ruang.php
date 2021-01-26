<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Ruang');
		$this->load->model('M_Komputer');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['ruang']=$this->M_Ruang->getDataRuang();
		$data['komputer']=$this->M_Ruang->getDataKomputer();
		$data['page']='Ruang.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan Ruang setelah menambah data baru
	function simpanRuang(){
		$this->M_Ruang->inputRuang();
		$this->session->set_flashdata('success','Ruang Berhasil Ditambah');
		redirect('Ruang','refresh');
    }

	// proses update data Ruang
	public function ubahRuang($id){
		$where = array('id_ruang' => $id);
		$data['ruang'] = $this->M_Ruang->getDataID($where,'ruang')->result();
		$data['page']='ubahRuang.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahRuang($id)
	{
		$this->M_Ruang->updateRuang($id);
		$this->session->set_flashdata('success','Ruang Berhasil Diubah');
		redirect('Ruang','refresh');
	}

	function hapusRuang($id){
		$query = $this->db->query("Select * from pemesanan where id_ruang = $id");
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Ruang, Data Ruang Masih Digunakan Pada Tabel Pemesanan');
			redirect('Ruang');
		}

		$query2 = $this->db->query("Select * from komputer where id_ruang = $id");
		if($query2->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Ruang, Data Ruang Masih Digunakan Pada Tabel Komputer');
			redirect('Ruang');
		}

		$where = array('id_ruang' => $id);
		$this->M_Ruang->hapus($where,'Ruang');
		$this->session->set_flashdata('success',"Data Ruang Berhasil Dihapus");
		redirect('Ruang');
	}

	public function detailKomputer($id)
	{
		$nama_ruang =$this->db->query("select * from ruang where id_ruang = $id")->row();
		$data['nama_ruang'] = $nama_ruang;
		$where = array('id_ruang' => $id);
		$data['ruang']=$this->M_Ruang->getDataRuang();
		$data['komputer'] = $this->M_Komputer->getDataID($where,'komputer')->result();
		$data['page']='detailKomputer.php';
		$this->load->view('admin/menu',$data);
	}
}
?>