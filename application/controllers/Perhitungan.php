<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper('file');
		$this->load->model('M_Perhitungan');
	}

	public function index()
	{
		$this->form_validation->set_rules('check_list[]', 'Anda belum memilih gejala', 'required');

		if($this->form_validation->run()==TRUE){
			$this->load->model('M_Perhitungan');

			$kasus = $this->M_Perhitungan->getPerhitunganQueryObject(); //ngambil gejela tiap kasus

			$data_kasus = [];
			foreach ($kasus as $key => $value) {
				$data_kasus[$value->fk_kasus][$value->fk_gejala] = $value->bobot; //script buat ngambil bobot dari setiap gejala di kasus lama
			}

			$data_kasus_baru = $this->input->post('check_list'); //ini buat nyimpan gejala kasus baru dengan variabel data_kasus_baru


			$data_bobot_kasus_tiap_penyakit = []; //variabel buat nyimpan hasilnya
			foreach ($data_kasus_baru as $gejala) {
				foreach ($data_kasus as $key_kasus => $value) {
					foreach ($value as $key_gejala => $bobot) {
						if ($key_gejala == $gejala) {
							$data_bobot_kasus_tiap_penyakit[$key_kasus][$gejala] = $bobot; //ini buat fungsi S X W nya, kalau antara data gejala kasus baru sama dengan data gejala kasus lama maka nilai data_bobot_kasus_tiap_penyakitnya sama dengan bobot gejala kasus lama yang sama
						} else {
							if (!isset($data_bobot_kasus_tiap_penyakit[$key_kasus][$gejala])) {
								$data_bobot_kasus_tiap_penyakit[$key_kasus][$gejala] = 0; //tapi kalau ternyata beda maka diberi nilai 0
							}
						}
					}
				}
			}

			$sum_kasus_lama = []; //variabel buat nyimpan nilai/hasil
			foreach ($data_kasus as $key => $value) {
				$sum_kasus_lama[$key] = array_sum($value); //ini buat ngejumlah bobot data gejala setiap kasus lama (sum data_kasus yang di script pertama)
			}

			$sum_kasus_baru = []; //variabel buat nyimpan nilai/hasil
			foreach ($data_bobot_kasus_tiap_penyakit as $key => $value) {
				$sum_kasus_baru[$key] = array_sum($value); //kalau ini buat ngejumlah bobot data gejala yang sesuai
			}

			$nilai_sim_untuk_tiap_kasus = []; //variabel buat nyimpan nilai/hasil
			foreach ($sum_kasus_baru as $key => $value) {
				$nilai_sim_untuk_tiap_kasus[$key] = $sum_kasus_baru[$key] / $sum_kasus_lama[$key]; //nah ini proses perhitungan di retrieve yang (S1 X W1 + S2 X W2 + .... + Sn X Wn) / W1 + W2 + .... + Wn, cuma ini disendirikan aja
			}

			$nilai_sim_percent = []; //variabel buat nyimpan nilai/hasil
			// $sum = array_sum($nilai_sim_untuk_tiap_kasus);
			foreach ($nilai_sim_untuk_tiap_kasus as $key => $value) {
				/*menjadikan persen */
				$nilai_sim_percent[$key] = $value * 100;
				// $nilai = number_format($nilai_sim_percent,2);
			}

			#grant varible for view 

			$var_table_perhitungan = [];
			foreach ($data_kasus as $key => $value) { //array ini buat nampilin tabel perhitungan
				$var_table_perhitungan[$key] = [
					'gejala_kasus' => count($value),
					'gejala_dipilih' => count($data_kasus_baru),
					'gejala_cocok' => count(array_filter($data_bobot_kasus_tiap_penyakit[$key])),
					'sum_gejala' => $sum_kasus_baru[$key],
					'pembagi' => $sum_kasus_lama[$key],
					'hasil' => number_format($nilai_sim_untuk_tiap_kasus[$key],2)
				];
			}

			// $db_kasus = $this->db
			// 	->select('gejala.nm_gejala, detail_kasus.fk_kasus, basis_kasus.id_kasus')
			// 	->join('gejala', 'detail_kasus.fk_gejala = gejala.id_gejala')
			// 	->join('basis_kasus', 'detail_kasus.fk_kasus = basis_kasus.id_kasus')
			// 	->get('detail_kasus')->result();
			// $data_kasus_gejala = [];
			// foreach ($db_kasus as $key => $value) {
			// 	$data_kasus_gejala[$value->id_kasus] = $value;
			// }

			// $var_gejala_cocok = [];
			// foreach ($db_kasus as $key => $value) {
			// 	$var_gejala_cocok[$key] = [
			// 		'id' => $data_kasus_baru[$key]
			// 		// 'gejalacocok' => $value->nm_gejala
			// 	];
			// }

			$db_kasus = $this->M_Perhitungan->joinPerhitungan();

			$data_kasus_penyakit = [];
			foreach ($db_kasus as $key => $value) {
				$data_kasus_penyakit[$value->id_kasus] = $value;
			}

			//script buat nampilin hasil analisa penyakitnya beserta besar presentasenya
			$var_hasil_analisa_penyakit = [];
			foreach ($db_kasus as $key => $value) {
				$var_hasil_analisa_penyakit[$key] = [
					'penyakit' => $value->nm_penyakit,
					'persentase' => number_format($nilai_sim_percent[$value->id_kasus],2)
				];
			}

			$var_kemungkinan_penyakit_yang_diderita = [];
			foreach ($db_kasus as $key => $value) {
				$var_kemungkinan_penyakit_yang_diderita[$value->id_kasus] = [
					'penyakit' => $value->nm_penyakit,
					'detail' => $value->detail,
					'solusi' => $value->solusi,
					'persentase' => number_format($nilai_sim_percent[$value->id_kasus],2)
				];
			}

			//nah ini script buat nyeleksi hasil presentase terbesarnya biar data yang ditampilin nanti yang punya presentase terbesar aja
			$max_key_kasus = array_keys($nilai_sim_percent, max($nilai_sim_percent));

			$var_kemungkinan_penyakit_yang_diderita_maxed = [];
			foreach ($max_key_kasus as $key => $value) {
				$var_kemungkinan_penyakit_yang_diderita_maxed[] = $var_kemungkinan_penyakit_yang_diderita[$value];
			}

			##simpan database

			//proses input data ke tabel basis_kasus
			$nextId = '';
			$query = $this->db->select('cetak')
	                      ->from('pemeriksaan')
	                      ->get();
			$row = $query->last_row();
			if($row){
				$idPostfix = (int)substr($row->cetak,1)+1;
				$nextId = 'C'.STR_PAD((string)$idPostfix,3,"0",STR_PAD_LEFT);
			}
			else{
				$nextId = 'C001';
			}

			//hasil presentase terbesar disimpan di database, ini script buat nyimpen ke databasenya
			foreach ($max_key_kasus as $key => $value) {
				$set_pemeriksaan = [
					'tgl_pemeriksaan' => date("Y-m-d"),
					'status' => ($var_kemungkinan_penyakit_yang_diderita[$value]['persentase'] >= 50 ? 1 : 2),
					'fk_penyakit' => $data_kasus_penyakit[$value]->fk_penyakit,
					'hasil' => $var_kemungkinan_penyakit_yang_diderita[$value]['persentase'],
					'fk_user' => null, 
					'cetak' => $nextId
				];

				$this->M_Perhitungan->insertPemeriksaan($set_pemeriksaan);

				//ini buat nyimpan ke database detail_pemeriksaan sesuai sama id_pemeriksaan
				$id_pemerikasaan = $this->db->insert_id();
				foreach ($data_kasus_baru as $key => $value) {
					$set_detail = [
						'fk_pemeriksaan' => $id_pemerikasaan,
						'fk_gejala' => $value,
						'cetak' => $nextId
					];

					$this->M_Perhitungan->insertDetailPemeriksaan($set_detail);
				}
			}

			$db_gejala = $this->db->get('gejala')->result();

			$list_gejala = [];
			foreach ($db_gejala as $key => $value) {
				$list_gejala[$value->id_gejala] = $value;
			}

			$data['table_perhitungan'] = $var_table_perhitungan;
			$data['hasil_analisa_penyakit'] = $var_hasil_analisa_penyakit;
			// $data['gejala_cocok'] = $var_gejala_cocok;
			$data['kemungkinan_penyakit_yang_diderita'] = $var_kemungkinan_penyakit_yang_diderita_maxed;
			$data['gejala'] = $data_kasus_baru;
			$data['list_gejala'] = $list_gejala;
			// $data['kasus'] = number_format($nilai_sim_untuk_tiap_kasus, 2, '.', '');
			$data['kasus'] = $nilai_sim_untuk_tiap_kasus;
			$data['persen'] = $nilai_sim_percent;
			$this->load->view('hasilKonsultasi', $data);
		}else{
			$this->session->set_flashdata('error','Anda belum memilih gejala! Centang minimal 1 data gejala yang sesuai dengan yang anda rasakan.');
			redirect('Welcome/Konsultasi');
		}
	}

	public function cetakPdf(){
	    $this->load->library('dompdf_gen'); 

	    $data['pemeriksaan']=$this->M_Perhitungan->view_row();
	    $data['gejala']=$this->M_Perhitungan->view_gejala();
	    $this->load->view('print', $data);

	    $paper_size='A4'; //paper size
	    $orientation = 'landscape'; //tipe format kertas
	    $html = $this->output->get_output();

	    $this->dompdf->set_paper($paper_size, $orientation); //convert to pdf
	    $dompdf = new DOMPDF();
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $this->dompdf->stream("Hasil Pemeriksaan.pdf", array('Attachment' =>0));
	    // unset($html);
	    // unset($dompdf);
  	}
}
