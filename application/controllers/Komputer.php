<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komputer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session','upload'));

		$this->load->model('M_Komputer');
		$this->load->model('M_Ruang');
		$this->load->helper('url','form');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['komputer']=$this->M_Komputer->getDataKomputer();
		$data['ruang']=$this->M_Ruang->getDataRuang();
		$data['page']='Komputer.php';
		$this->load->view('Admin/menu',$data);
	}

	public function simpanKomputer()
	{
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './Gambar/komputer/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '10240';
			$config['file_name'] = $filename_komputer;
			$config['remove_space'] = TRUE;
		}

		if (!empty($_FILES['foto']['name'])) {
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			}
		}

		$data = array(
			'merk'=>$this->input->post('merk'),
			'processor'=>$this->input->post('processor'),
			'memori'=>$this->input->post('memori'),
			'hardisk'=>$this->input->post('hardisk'),
			'foto'=>$_FILES['foto']['name'],
			'total_komputer'=>$this->input->post('total_komputer'),
			'id_ruang'=>$this->input->post('id_ruang'),
			'keterangan'=>$this->input->post('keterangan')
		);

		$this->M_Komputer->inputData($data,'komputer');
		redirect('Komputer');
	}

	// proses update data Komputer
	public function ubahKomputer($id){
		$where = array('id_komputer' => $id);
		$data['komputer'] = $this->M_Komputer->getDataID($where,'komputer')->result();
		$data['ruang']=$this->M_Ruang->ambilRuang();
		$data['page']='ubahKomputer.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahKomputer($id)
	{
		$foto_lama = $this->input->post('foto_lama');

		if($foto_lama == null){
			$data = array(
				'merk'=>$this->input->post('merk'),
				'processor'=>$this->input->post('processor'),
				'memori'=>$this->input->post('memori'),
				'hardisk'=>$this->input->post('hardisk'),
				'foto'=>'default.png',
				'total_komputer'=>$this->input->post('total_komputer'),
				'id_ruang'=>$this->input->post('id_ruang'),
				'keterangan'=>$this->input->post('keterangan')
			);
			$this->M_Komputer->updateKomputer($id,$data);
			redirect('Komputer');
		}

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './Gambar/komputer/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '10240';
			$config['remove_space'] = TRUE;
		}

		if (!empty($_FILES['foto']['name'])) {
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			} else {
				unlink('Gambar/komputer/'.$foto_lama); //menghapus gambar yang lama
			}
		}

		$data = array(
			'merk'=>$this->input->post('merk'),
			'processor'=>$this->input->post('processor'),
			'memori'=>$this->input->post('memori'),
			'hardisk'=>$this->input->post('hardisk'),
			'foto'=>$_FILES['foto']['name'],
			'total_komputer'=>$this->input->post('total_komputer'),
			'id_ruang'=>$this->input->post('id_ruang'),
			'keterangan'=>$this->input->post('keterangan')
		);
		$this->M_Komputer->updateKomputer($id,$data);
		redirect('Komputer');
	}

	function hapusKomputer($id){
		$where = array('id_komputer' => $id);
		$this->M_Komputer->hapus($where,'Komputer');
		$this->session->set_flashdata('success',"Data Komputer Berhasil Dihapus");
		redirect('Komputer');
	}
}
?>