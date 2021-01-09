<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Gejala');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['gejala']=$this->M_Gejala->getDataGejala();
		$data['page']='Gejala.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan gejala setelah menambah data baru
	function simpanGejala(){
        $data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
		
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('nm_gejala', 'Nama Gejala', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error','Tambah Gejala Gagal');
	        redirect('Gejala');
		}else{
			$this->M_Gejala->inputGejala();
			$this->session->set_flashdata('success','Tambah Gejala berhasil');
			redirect('Gejala');
		}
    }

    // proses update data gejala
	public function prosesUbah()
    {
        $this->form_validation->set_rules('id_gejala', 'id_gejala', 'required');
        $this->form_validation->set_rules('nm_gejala', 'nm_gejala', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gejala Gagal Diubah");
            redirect('Gejala');
        }else{
            $data=array(
                "nm_gejala"=>$_POST['nm_gejala']
            );
            $this->db->where('id_gejala', $_POST['id_gejala']);
            $this->db->update('gejala',$data);
            $this->session->set_flashdata('success',"Data Gejala Berhasil Diubah");
            redirect('Gejala');
        }
    }

	function hapusGejala($id){
		$where = array('id_gejala' => $id);
		$this->M_Gejala->hapus($where,'gejala');
		$this->session->set_flashdata('success',"Data Gejala Berhasil Dihapus");
		redirect('Gejala');
	}
}
?>