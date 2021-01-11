<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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
		$nama=$this->input->post('nama');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $id_fakultas=$this->input->post('id_fakultas');
        $created_at=$this->input->post('created_at');
        $updated_at=$this->input->post('updated_at');
        $level=$this->input->post('level');
        $this->session->set_flashdata('success','Tambah User berhasil');
        $this->M_Users->inputdata($nama,$email,$password,$id_fakultas,$created_at,$updated_at,$level);
        redirect('Users');
	}

	public function editProfil(){
		$data['user']= $this->M_Users->getUserId();
		$data['page']='editProfile.php';
		$this->load->view('admin/menu',$data);
	}

	public function updateProfile()
	{
		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
	    $data['id_fakultas'] = set_value('id_fakultas');
	    $data['created_at'] = set_value('created_at');
	    $this->session->set_userdata($data);
	    $this->M_Users->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Users/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'		=>md5($this->input->post('password'))
        );
        $this->M_Users->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Users/editProfil');
    }

	function hapus_user($id){
		$where = array('id_users' => $id);
		$this->M_Users->hapus($where,'users');
		$this->session->set_flashdata('success','Hapus User berhasil');
		redirect('Users');
	}
}
