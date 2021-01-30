<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mhs extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Mahasiswa');
		$this->load->model('M_Pemesanan');
		$this->load->model('M_Staff');
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
		$data['page']='pemesananMahasiswa.php';
		$this->load->view('Mahasiswa/menu',$data);
	}

	public function Jadwal()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesananJadwalMhs();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$data['page']='jadwalMahasiswa.php';
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

	public function editProfil(){
		$data['mahasiswa']= $this->M_Mahasiswa->getMahasiswaId();
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		$data['page']='editProfile.php';
		$this->load->view('mahasiswa/menu',$data);
	}

	public function updateProfile()
	{
		$data['nim'] = set_value('nim');
	    $data['nama_mahasiswa'] = set_value('nama_mahasiswa');
	    $this->session->set_userdata($data);
	    $this->M_Mahasiswa->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('mhs/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'		=>md5($this->input->post('password'))
        );
        $this->M_Mahasiswa->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('mhs/editProfil');
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

	function batalMengikuti($id){
		$where = array('id_pemesananmhs' => $id);
		$this->M_Mahasiswa->hapus($where,'pemesananmhs');
		$this->session->set_flashdata('success',"Jadwal Mengikuti Berhasil Dihapus");
		redirect('mhs/jadwal');
	}

	public function ikuti($id)
	{

		$total_kapasitas = $this->M_Pemesanan->getTotalKapasitasRuang($id);
		echo($total_kapasitas[0]['total_kapasitas']);
		$query = $this->db->query("Select * from pemesananmhs where id_pemesanan='$id'");
		print(count($query->result()));
		if(count($query->result()) >= $total_kapasitas[0]['total_kapasitas']){
			$this->session->set_flashdata('error','Jadwal yang Akan Diikuti Sudah Penuh');
			redirect('mhs/jadwalRuang'); //mengalihkan halaman
		}
		$data['id_mahasiswa'] = $this->session->userdata['id_mahasiswa'];

		$data['id_pemesanan'] = $id;
	    $this->M_Mahasiswa->addPemesananMhs($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Jadwal yang Akan Diikuti Berhasil Ditambahkan');
	    redirect('mhs/jadwalRuang'); //mengalihkan halaman
	}

	// function inputMahasiswa($nama_Mahasiswa){
 //        $hasil=$this->db->query("INSERT INTO Mahasiswa (nama_istruktur) VALUES ('$nama_Mahasiswa')");
 //        return $hasil;
 //    }
}
?>