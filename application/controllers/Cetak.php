<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
		$this->load->model('M_Cetak');
		$this->load->helper('file');
	}

	public function index()
	{
		$data['pemeriksaan']=$this->M_Cetak->view_row(); 
  		$this->load->view('admin/preview', $data);
	}

	public function cetakPdf(){
	    $this->load->library('dompdf_gen'); 

	    $data['pemeriksaan']=$this->M_Cetak->view_row();
	    $this->load->view('print', $data);

	    $paper_size='A4'; //paper size
	    $orientation = 'landscape'; //tipe format kertas
	    $html = $this->output->get_output();

	    $this->dompdf->set_paper($paper_size, $orientation); //convert to pdf
	    $dompdf = new DOMPDF();
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $this->dompdf->stream("Data Pemeriksaan.pdf", array('Attachment' =>0));
	    // unset($html);
	    // unset($dompdf);
  	}
}
