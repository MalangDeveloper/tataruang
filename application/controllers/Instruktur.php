<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Instruktur');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['Instruktur']=$this->M_Instruktur->getDataInstruktur();
		$data['page']='Instruktur.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan Instruktur setelah menambah data baru
	function simpanInstruktur(){
        $data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
		
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('nama_instruktur', 'nama instruktur', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error','Tambah Instruktur Gagal');
	        redirect('Instruktur');
		}else{
			$this->M_Instruktur->inputInstruktur();
			$this->session->set_flashdata('success','Tambah Instruktur berhasil');
			redirect('Instruktur');
		}
    }

    public function ubahInstruktur($id_instruktur){
		$where = array('id_instruktur' => $id_instruktur);
		$data['instruktur'] = $this->M_Instruktur->getDataID($where,'instruktur')->result();
		$data['page']='editInstruktur.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahInstruktur($id_instruktur)
	{
		$this->M_Instruktur->updateInstruktur($id_instruktur);
		$this->session->set_flashdata('success','Instruktur Berhasil Diubah');
		redirect('Instruktur','refresh');
	}

    // proses update data Instruktur
	public function prosesUbah()
    {
        $this->form_validation->set_rules('id_Instruktur', 'id_Instruktur', 'required');
        $this->form_validation->set_rules('nama_instruktur', 'nama_instruktur', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Instruktur Gagal Diubah");
            redirect('Instruktur');
        }else{
            $data=array(
                "nama_Instruktur"=>$_POST['nama_Instruktur']
            );
            $this->db->where('id_Instruktur', $_POST['id_Instruktur']);
            $this->db->update('Instruktur',$data);
            $this->session->set_flashdata('success',"Data Instruktur Berhasil Diubah");
            redirect('Instruktur');
        }
    }

	function hapusInstruktur($id){
		$where = array('id_Instruktur' => $id);
		$this->M_Instruktur->hapus($where,'Instruktur');
		$this->session->set_flashdata('success',"Data Instruktur Berhasil Dihapus");
		redirect('Instruktur');
	}

	// function inputInstruktur($nama_instruktur){
 //        $hasil=$this->db->query("INSERT INTO instruktur (nama_istruktur) VALUES ('$nama_instruktur')");
 //        return $hasil;
 //    }
}
?>