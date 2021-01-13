<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Home');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['totalFakultas'] = $this->M_Home->countFakultas();
		$data['totalLaboratorium'] = $this->M_Home->countLaboratorium();
		$data['totalPemesanan'] = $this->M_Home->countPemesanan();
		$data['page']='homeAdmin.php';
		$this->load->view('Admin/menu',$data);
	}
}

?>