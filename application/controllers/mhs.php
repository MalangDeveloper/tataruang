<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mhs extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Mahasiswa');
		$this->load->model('M_Pemesanan');
		if(!$this->session->userdata('nama_mahasiswa'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['Mahasiswa']=$this->M_Mahasiswa->getDataMahasiswa();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['totalFakultas'] = $this->M_Pemesanan->countFakultas();
		$data['totalLaboratorium'] = $this->M_Pemesanan->countLaboratorium();
		$data['totalPemesanan'] = $this->M_Pemesanan->countPemesanan();
		$data['page']='homeMahasiswa.php';
		$this->load->view('Mahasiswa/menu',$data);
	}


	public function jadwalRuang()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesananMhs();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$this->load->view('Mahasiswa/menu',$data);
	}

	// proses menyimpan Mahasiswa setelah menambah data baru
	function simpanMahasiswa(){
		$this->M_Mahasiswa->inputMahasiswa();
		$this->session->set_flashdata('success','Data Mahasiswa Berhasil Ditambah');
		redirect('Mahasiswa','refresh');
    }

    public function ubahMahasiswa($id_Mahasiswa){
		$where = array('id_Mahasiswa' => $id_Mahasiswa);
		$data['Mahasiswa'] = $this->M_Mahasiswa->getDataID($where,'Mahasiswa')->result();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['page']='editMahasiswa.php';
		$this->load->view('admin/menu',$data);
	}

	public function prosesUbahMahasiswa($id_Mahasiswa)
	{
		$this->M_Mahasiswa->updateMahasiswa($id_Mahasiswa);
		$this->session->set_flashdata('success','Mahasiswa Berhasil Diubah');
		redirect('Mahasiswa','refresh');
	}

    // proses update data Mahasiswa
	public function prosesUbah()
    {
        $this->form_validation->set_rules('id_Mahasiswa', 'id_Mahasiswa', 'required');
        $this->form_validation->set_rules('nama_Mahasiswa', 'nama_Mahasiswa', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Mahasiswa Gagal Diubah");
            redirect('Mahasiswa');
        }else{
            $data=array(
                "nama_Mahasiswa"=>$_POST['nama_Mahasiswa']
            );
            $this->db->where('id_Mahasiswa', $_POST['id_Mahasiswa']);
            $this->db->update('Mahasiswa',$data);
            $this->session->set_flashdata('success',"Data Mahasiswa Berhasil Diubah");
            redirect('Mahasiswa');
        }
    }

	function hapusMahasiswa($id){
		$query = $this->db->query("Select * from pemesanan where id_Mahasiswa = $id");
		
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Mahasiswa, Data Mahasiswa Masih Digunakan Pada Tabel Pemesanan');
			redirect('Mahasiswa');
		}

		$where = array('id_Mahasiswa' => $id);
		$this->M_Mahasiswa->hapus($where,'Mahasiswa');
		$this->session->set_flashdata('success',"Data Mahasiswa Berhasil Dihapus");
		redirect('Mahasiswa');
	}

	// function inputMahasiswa($nama_Mahasiswa){
 //        $hasil=$this->db->query("INSERT INTO Mahasiswa (nama_istruktur) VALUES ('$nama_Mahasiswa')");
 //        return $hasil;
 //    }
}
?>