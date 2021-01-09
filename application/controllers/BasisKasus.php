<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasisKasus extends CI_Controller {

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
		$this->load->model('M_Basis');
		$this->load->library(array('form_validation','session'));

		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}

	}

	public function index()
	{
		$data['kasus'] = $this->M_Basis->getDataKasus();
		$data['penyakitKasus']=$this->M_Basis->ambilPenyakit();
		$data['page']='BasisKasus.php';
		$this->load->view('Admin/menu',$data);
	}

	public function detailKasus($id)
	{
		$data['gejalaKasus']=$this->M_Basis->ambilGejala($id);
		$data['kasus'] = $this->M_Basis->getDataKasusId($id);
		$data['page']='DetailKasus.php';
		$this->load->view('Admin/menu',$data);
	}

	public function simpanKasus()
	{
		$this->M_Basis->inputDataKasus();
		$this->session->set_flashdata('success','Tambah Data Basis Kasus Berhasil');
		redirect('BasisKasus');
	}

	public function prosesUbahKasus()
    {
        $this->form_validation->set_rules('id_kasus', 'id_kasus', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Basis Kasus Gagal Diubah");
            redirect('BasisKasus');
        }else{
            $data=array(
                "fk_penyakit"=>$_POST['fk_penyakit']
            );
            $this->db->where('id_kasus', $_POST['id_kasus']);
            $this->db->update('basis_kasus',$data);
            $this->session->set_flashdata('success',"Data Basis Kasus Berhasil Diubah");
            redirect('BasisKasus');
        }
    }

    public function simpanGejalaKasus()
	{
		
		$data = array();
		$this->load->helper('url','form');
		$this->load->library("form_validation");
//        jika anda mau, anda bisa mengatur tampilan pesan error dengan menambahkan element dan css nya
		$this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');

		if($this->form_validation->run()==FALSE){
			$data['gejalaPenyakit']=$this->M_Basis->ambilGejala();
			$data['page']='BasisKasus.php';
			$this->load->view('Admin/menu',$data);
		}else{
			$this->M_Basis->inputDataDetail();
			$this->session->set_flashdata('success','Tambah Gejala berhasil');
			redirect('BasisKasus/detailKasus/'.$this->input->post('id_kasus'));
		}
	}

	function hapusGejala($id, $id_kasus){

		$where = array('id_detail' => $id);
		$this->M_Basis->hapus($where,'detail_kasus');
		$this->session->set_flashdata('success','Data Gejala Kasus Berhasil Dihapus');
		// redirect('BasisKasus');
		redirect('BasisKasus/detailKasus/'.$id_kasus);
	}

	public function hapusKasus($id)
    {
    	$where = array('id_kasus' => $id);
		$this->M_Basis->hapus($where,'basis_kasus');
		$this->session->set_flashdata('success','Data Kasus Berhasil Dihapus');
		redirect('BasisKasus');
    }
}
