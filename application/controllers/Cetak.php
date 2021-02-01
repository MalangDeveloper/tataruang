<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Cetak');
		$this->load->helper('file');
	}

	public function index()
	{
		$data['pemesanan']=$this->M_Cetak->view_row(); 
  		$this->load->view('admin/preview', $data);
	}

	public function cetakPdf(){
	    $this->load->library('dompdf_gen'); 

	    $data['pemesanan']=$this->M_Cetak->view_row();
	    $this->load->view('print', $data);

	    $paper_size='A4'; //paper size
	    $orientation = 'landscape'; //tipe format kertas
	    $html = $this->output->get_output();

	    $this->dompdf->set_paper($paper_size, $orientation); //convert to pdf
	    $dompdf = new DOMPDF();
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $this->dompdf->stream("Data Pemesanan.pdf", array('Attachment' =>0));
	    // unset($html);
	    // unset($dompdf);
  	}
}
