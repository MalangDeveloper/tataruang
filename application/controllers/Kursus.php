<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Kursus');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['kursus']=$this->M_Kursus->getDataKursus();
		$data['page']='Kursus.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan Kursus setelah menambah data baru
	function simpanKursus(){
        $data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
		
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('nama_kursus', 'Nama Kursus', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error','Tambah Kursus Gagal');
	        redirect('Kursus');
		}else{
			$this->M_Kursus->inputKursus();
			$this->session->set_flashdata('success','Tambah Kursus berhasil');
			redirect('Kursus');
		}
    }

    // proses update data Kursus
	public function prosesUbah()
    {
        $this->form_validation->set_rules('id_kursus', 'id_kursus', 'required');
        $this->form_validation->set_rules('nama_kursus', 'nama_kursus', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Kursus Gagal Diubah");
            redirect('Kursus');
        }else{
            $data=array(
                "nama_kursus"=>$_POST['nama_kursus']
            );
            $this->db->where('id_kursus', $_POST['id_kursus']);
            $this->db->update('Kursus',$data);
            $this->session->set_flashdata('success',"Data Kursus Berhasil Diubah");
            redirect('Kursus');
        }
    }

	function hapusKursus($id){
		$query = $this->db->query("Select * from pemesanan where id_kursus = $id");
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Kursus, Data Kursus Masih Digunakan Pada Tabel Pemesanan');
			redirect('Kursus');
		}

		$where = array('id_kursus' => $id);
		$this->M_Kursus->hapus($where,'kursus');
		$this->session->set_flashdata('success',"Data Kursus Berhasil Dihapus");
		redirect('Kursus');
	}
}
?>