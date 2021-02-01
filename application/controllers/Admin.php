<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Pemesanan');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['totalFakultas'] = $this->M_Pemesanan->countFakultas();
		$data['totalLaboratorium'] = $this->M_Pemesanan->countLaboratorium();
		$data['totalPemesanan'] = $this->M_Pemesanan->countPemesanan();
		$data['page']='homeAdmin.php';
		$this->load->view('Admin/menu', $data);
	}

	public function DataPemesanan()
	{
		$data['pemesanan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Admin/menu',$data);
	}

	public function editProfil(){
		$data['user']= $this->M_Pemesanan->getUserId();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['page']='editProfile.php';
		$this->load->view('Admin/menu',$data);
	}

	public function updateProfile()
	{
		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
	    $data['level'] = set_value('level');
	    $this->session->set_userdata($data);
	    $this->M_Pemesanan->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Admin/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
        $data = array(
            'password'=>md5($this->input->post('password'))
        );
        $this->M_Pemesanan->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Admin/editProfil');
    }

    public function ubahPemesanan($id){
		$where = array('id_pemesanan' => $id);
		$data['pesan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['pemesanan'] = $this->M_Pemesanan->getdataID($where,'pemesanan')->result();
		$data['fakultas']=$this->M_Pemesanan->ambilFakultas();
		$data['kursus']=$this->M_Pemesanan->ambilKursus();
		$data['instruktur']=$this->M_Pemesanan->ambilInstruktur();
		$data['ruang']=$this->M_Pemesanan->ambilRuang();
		$data['page']='editPemesanan.php';
		$this->load->view('Admin/menu',$data);
	}

	public function prosesUbahpemesanan($id)
	{
		$jam1 = strtotime($_POST["jam_awal"]);
		$jam2 = strtotime($_POST["jam_akhir"]);
		
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where_not_in('id_pemesanan', $id );
		$this->db->where('id_ruang', $this->input->post('id_ruang') );
		$this->db->where('tanggal', $this->input->post('tanggal') );
		$query = $this->db->get();

		$jumlah = 0;
		
		if ( $query->num_rows() > 0 ){
				$row = $query->result_array();
				$count = $query->num_rows();
				// print_r($row);
				for ($i=0; $i < $count ; $i++) { 
					$jam_mulai_cek = strtotime($row[$i]['jam_awal']); 
					// print($jam_mulai_cek);
					// print_r("&nbsp;");
					$jam_akhir_cek= strtotime($row[$i]['jam_akhir']);
					// print($jam_akhir_cek);
					// print_r("<br>");

				if (($jam_mulai_cek <= $jam1 && $jam1 >= $jam_akhir_cek && $jam_mulai_cek <= $jam2 && $jam2 >= $jam_akhir_cek)
					||	($jam_mulai_cek >= $jam1 && $jam1 <= $jam_akhir_cek && $jam_mulai_cek >= $jam2 && $jam2 <= $jam_akhir_cek))
				{
					// echo "dapat Updatee";	
				}
				else {
					$jumlah++;
					// echo "gagal Update";
					$this->session->set_flashdata('error','Pemesanan Gagal Update <br> Silakan Ganti Jam atau Tempat Penggunaan Ruang');
					redirect(base_url()."Admin/ubahPemesanan/".$id);
					return;
				}
				
			}
			if($jumlah == 0){
				$this->M_Pemesanan->updatePemesanan($id);
				// print(" DAPAT Update");
				$this->session->set_flashdata('success','Pemesanan Berhasil Update');
				redirect('Pemesanan','refresh');
			}
		}
		else{
			$this->M_Pemesanan->updatePemesanan($id);
			// print("bisa Update ");
			$this->session->set_flashdata('success','Pemesanan Berhasil Update');
			redirect('Pemesanan','refresh');
			return;
		}

		// $this->M_Pemesanan->updatePemesanan($id);
		// $this->session->set_flashdata('success','Pemesanan Berhasil Diubah');
		// redirect('Pemesanan','refresh');
	}

	function hapusPemesanan($id){
		$query = $this->db->query("Select * from pemesananmhs where id_pemesanan = $id");
		if($query->result_array() != null){
			$this->session->set_flashdata('error','Gagal Menghapus Jadwal, Data Jadwal Masih Digunakan Pada Tabel Pemesanan Mahasiswa');
			redirect('Pemesanan');
		}

		$where = array('id_pemesanan' => $id);
		$this->M_Pemesanan->hapus($where,'pemesanan');
		$this->session->set_flashdata('success',"Data Pemesanan Berhasil Dihapus");
		redirect('Pemesanan');
	}

	public function DataRuang()
	{
		$data['ruang'] = $this->M_Pemesanan->view_ruang();
		$data['page']='ruang.php';
		$this->load->view('Admin/menu', $data);
	}

	public function DataKomputer()
	{
		$data['komputer'] = $this->M_Pemesanan->view_komputer();
		$data['page']='komputer.php';
		$this->load->view('Admin/menu', $data);
	}
}
?>