<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Users');
		$this->load->model('M_Staff');
		$this->load->library(array('form_validation','session'));

		if(!$this->session->userdata('level'))
		{
			redirect('welcome');
		}

	}

	public function index()
	{
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		$data['user']=$this->M_Users->getDataUsers();
		$data['page']='User.php';
		$this->load->view('Admin/menu',$data);	
	}

	public function simpanUser()
	{
		$email = $this->input->post('email');
		$query = $this->db->query("Select * from users where email = '$email'");
		
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menambahkan User Baru, Sudah Ada yang Menggunakan Username Tersebut');
			redirect('Users');
		}

	    $this->M_Users->inputdata(); //memasukan data ke database
	    $this->session->set_flashdata('success','Tambah User berhasil');
        redirect('Users');
	}

	public function editProfil(){
		$data['user']= $this->M_Users->getUserId();
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		$data['page']='editProfile.php';
		$this->load->view('admin/menu',$data);
	}

	public function editUsers($id){
		$where = array('id_users' => $id);
		$data['user'] = $this->M_Users->getDataID($where,'users')->result();
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$data['now']= date('Y-m-d H:i:s');
		$data['page']='ubahUsers.php';
		$this->load->view('admin/menu',$data);
	}

	public function updateProfile()
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');

		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
	    $data['id_fakultas'] = set_value('id_fakultas');
	    $data['updated_at'] = $now;
	    $this->session->set_userdata($data);
	    $this->M_Users->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Users/editProfil'); //mengalihkan halaman
	}

	public function updateUsers($id)
	{
		$email = $this->input->post('email');
		$query = $this->db->query("Select * from users where email = '$email' AND id_users != $id");
		
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Update User, Sudah Ada yang Menggunakan Username Tersebut');
			redirect('Users');
		}

	    $this->M_Users->updateUsers($id); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Users'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'		=>md5($this->input->post('password'))
        );
        $this->M_Users->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Users/editProfil');
	}
	
	function ubahpassUsers($id){
        $data = array(
            'password'		=>md5($this->input->post('password'))
        );
        $this->M_Users->ubahpasswordUsers($data, $id);
        $this->session->set_userdata($data);
        redirect('Users');
    }

	function hapus_user($id){
    	$query = $this->db->query("Select * from pemesanan where id_user = $id");
		
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus User, Data User Masih Digunakan Pada Tabel Pemesanan');
			redirect('Users');
		}

		$where = array('id_users' => $id);
		$this->M_Users->hapus($where,'users');
		$this->session->set_flashdata('success','Hapus User berhasil');
		redirect('Users');
	}
}