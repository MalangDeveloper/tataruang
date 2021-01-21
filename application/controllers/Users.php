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
		$where = array('id_users' => $id);
		$this->M_Users->hapus($where,'users');
		$this->session->set_flashdata('success','Hapus User berhasil');
		redirect('Users');
	}
}