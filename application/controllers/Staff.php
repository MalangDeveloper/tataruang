<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_Staff');
		$this->load->model('M_Pemesanan');
		if(!$this->session->userdata('level'))
		{
			redirect('Welcome');
		}
	}

	public function index()
	{
		$data['totalFakultas'] = $this->M_Staff->countFakultas();
		$data['totalLaboratorium'] = $this->M_Staff->countLaboratorium();
		$data['totalPemesanan'] = $this->M_Staff->countPemesanan();
		$data['page']='homeStaff.php';
		$this->load->view('Staff/menu', $data);
	}

	public function DataPemesanan()
	{
		$data['pemesanan'] = $this->M_Staff->getDataPemesanan();
		$data['page']='pemesanan.php';
		$this->load->view('Staff/menu',$data);
	}

	public function editProfil(){
		$data['user']= $this->M_Staff->getUserId();
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		$data['page']='editProfile.php';
		$this->load->view('Staff/menu',$data);
	}

	public function updateProfile()
	{
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');

		$data['email'] = set_value('email');
	    $data['nama'] = set_value('nama');
		$data['level'] = set_value('level');
		$data['updated_at'] = $now;
	    $this->session->set_userdata($data);
	    $this->M_Staff->updateProfile($data); //memasukan data ke database
	    $this->session->set_flashdata('success','Profile Berhasil Diubah');
	    redirect('Staff/editProfil'); //mengalihkan halaman
	}

	function ubahpass(){
		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');

        $data = array(
			'password'=>md5($this->input->post('password')),
			'updated_at' => $now
        );
        $this->M_Staff->ubahpassword($data);
        $this->session->set_userdata($data);
        redirect('Staff/editProfil');
    }

    public function ubahPemesanan($id){
		$where = array('id_pemesanan' => $id);
		$data['pesan'] = $this->M_Pemesanan->getDataPemesanan();
		$data['pemesanan'] = $this->M_Staff->getdataID($where,'pemesanan')->result();
		$data['fakultas']=$this->M_Staff->ambilFakultas();
		$data['kursus']=$this->M_Staff->ambilKursus();
		$data['instruktur']=$this->M_Staff->ambilInstruktur();
		$data['ruang']=$this->M_Staff->ambilRuang();
		$data['page']='editPemesanan.php';
		$this->load->view('Staff/menu',$data);
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
					print($jam_mulai_cek);
					print_r("&nbsp;");
					$jam_akhir_cek= strtotime($row[$i]['jam_akhir']);
					print($jam_akhir_cek);
					print_r("<br>");

				if (($jam_mulai_cek <= $jam1 && $jam1 >= $jam_akhir_cek && $jam_mulai_cek <= $jam2 && $jam2 >= $jam_akhir_cek)
					||	($jam_mulai_cek >= $jam1 && $jam1 <= $jam_akhir_cek && $jam_mulai_cek >= $jam2 && $jam2 <= $jam_akhir_cek))
				{
					echo "dapat Updatee";	
				}
				else {
					$jumlah++;
					echo "gagal Update";
					$this->session->set_flashdata('error','Pemesanan Gagal Update');
					redirect(base_url()."Staff/ubahPemesanan/".$id);
					return;
				}
				
			}
			if($jumlah == 0){
				$this->M_Pemesanan->updatePemesanan($id);
				print(" DAPAT Update");
				$this->session->set_flashdata('success','Pemesanan Berhasil Update');
				redirect('Staff/DataPemesanan','refresh');
			}
		}
		else{
			$this->M_Pemesanan->updatePemesanan($id);
			print("bisa Update ");
			$this->session->set_flashdata('success','Pemesanan Berhasil Update');
			redirect('Staff/DataPemesanan','refresh');
			return;
		}


		// $this->M_Staff->updatePemesanan($id);
		// $this->session->set_flashdata('success','Pemesanan Berhasil Diubah');
		// redirect('Staff/DataPemesanan','refresh');
	}

	public function DataRuang()
	{
		$data['ruang'] = $this->M_Staff->view_ruang();
		$data['page']='ruang.php';
		$this->load->view('Staff/menu', $data);
	}

	public function DataKomputer()
	{
		$data['komputer'] = $this->M_Staff->view_komputer();
		$data['page']='komputer.php';
		$this->load->view('Staff/menu', $data);
	}
}
?>