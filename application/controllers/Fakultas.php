<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Fakultas');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['Fakultas']=$this->M_Fakultas->getDataFakultas();
		$data['page']='Fakultas.php';
		$this->load->view('Admin/menu',$data);
	}

	// proses menyimpan Fakultas setelah menambah data baru
	function simpanFakultas(){
        $data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
		
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('nama_fakultas', 'nama fakultas', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error','Tambah Fakultas Gagal');
	        redirect('Fakultas');
		}else{
			$this->M_Fakultas->inputFakultas();
			$this->session->set_flashdata('success','Tambah Fakultas berhasil');
			redirect('Fakultas');
		}
    }

    // proses update data Fakultas
    public function ubahFakultas($id_fakultas){
		$where = array('id_fakultas' => $id_fakultas);
		$data['fakultas'] = $this->M_Fakultas->getDataID($where,'fakultas')->result();
		$data['page']='editFakultas.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahFakultas($id_fakultas)
	{
		$this->M_Fakultas->updateFakultas($id_fakultas);
		$this->session->set_flashdata('success','Fakultas Berhasil Diubah');
		redirect('Fakultas','refresh');
	}
	public function prosesUbah()
    {
        $this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'required');
        $this->form_validation->set_rules('nama_fakultas', 'nama_fakultas', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Fakultas Gagal Diubah");
            redirect('Fakultas');
        }else{
            $data=array(
                "nama_fakultas"=>$_POST['nama_fakultas']
            );
            $this->db->where('id_fakultas', $_POST['id_fakultas']);
            $this->db->update('fakultas',$data);
            $this->session->set_flashdata('success',"Data Fakultas Berhasil Diubah");
            redirect('Fakultas');
        }
    }

	function hapusFakultas($id){
		$query = $this->db->query("Select * from pemesanan where id_fakultas = $id");
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Fakultas, Data Fakultas Masih Digunakan Pada Tabel Pemesanan');
			redirect('Fakultas');
		}

		$query2 = $this->db->query("Select * from users where id_fakultas = $id");
		if($query2->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Fakultas, Data Fakultas Masih Digunakan Pada Tabel Users');
			redirect('Fakultas');
		}

		$where = array('id_fakultas' => $id);
		$this->M_Fakultas->hapus($where,'Fakultas');
		$this->session->set_flashdata('success',"Data Fakultas Berhasil Dihapus");
		redirect('Fakultas');
	}

	// function inputFakultas($nama_Fakultas){
 //        $hasil=$this->db->query("INSERT INTO Fakultas (nama_istruktur) VALUES ('$nama_Fakultas')");
 //        return $hasil;
 //    }
}
?>