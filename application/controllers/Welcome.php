<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->library(array('form_validation'));
		$this->load->model('M_Welcome');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function Konsultasi()
	{
		$data['gejala']=$this->M_Welcome->getDataGejala();
		$this->load->view('konsultasi', $data);
	}

	public function Penyakit()
	{
		$data['penyakit']=$this->M_Welcome->getDataPenyakit();
		$this->load->view('penyakit', $data);
	}

	function aksi_login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$cek=$this->M_Welcome->cek_login($email,$password);
		$tes=count((array)$cek);
		if ($tes > 0 ) 
		{
			$data_login=$this->M_Welcome->cek_login($email,$password);
			$level=$data_login->level;
			$nama=$data_login->nama;
			$id_fakultas=$data_login->id_fakultas;
			$id=$data_login->id_users;
			$created_at=$data_login->created_at;
			$updated_at=$data_login->updated_at;
			$email=$data_login->email;
			$data=array('level' => $level,
				'nama' => $nama,
				'id_fakultas' => $id_fakultas,
				'id_users' => $id,
				'created_at' => $created_at,
				'updated_at' => $updated_at,
				'email' => $email);
			$this->session->set_userdata($data);
			
			if ($level=='Admin')
			{
				redirect('Home');
			}
			elseif ($level=='Staf')
			{
				redirect('Staff');
			}
			
		}
		else
		{
			echo "<script>alert('email atau Password salah!!');history.go(-1);</script>";
		}
	}

	function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->sess_destroy();
		redirect(base_url('Welcome'));
	}

	public function simpanKomentar()
	{
		$komen = $this->input->post('komen');
 
		$data = array(
			'komen' => $komen
		);
		$this->M_Welcome->input_datakomentar($data,'komentar');
		redirect('Welcome');
	}
}
