<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Komputer extends CI_Model {

	//proses simpan/cetak
	function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}
	
	public function getDataKomputer($value='')
	{
		$query = $this->db->query("SELECT komputer.*, ruang.id_ruang, ruang.nama_ruang FROM komputer JOIN ruang ON komputer.id_ruang = ruang.id_ruang");
		return $query->result();
	}

	public function inputKomputer(){
		$query = $this->db->select('*')
                      ->from('komputer')
                      ->get();
		$object=array
		(
			'merk'=>$this->input->post('merk'),
			'processor'=>$this->input->post('processor'),
			'merk'=>$this->input->post('merk'),
			'processor'=>$this->input->post('processor'),
			'memori'=>$this->input->post('memori'),
			'hardisk'=>$this->input->post('hardisk'),
			'foto'=>$this->input->post('foto'),
			'id_ruang'=>$this->input->post('id_ruang'),
			'keterangan'=>$this->input->post('keterangan'),
		);
		$this->db->insert('komputer',$object);
	}

	public function updateKomputer($id){
		$data = array(
			'merk'=>$this->input->post('merk'),
			'processor'=>$this->input->post('processor'),
			'merk'=>$this->input->post('merk'),
			'processor'=>$this->input->post('processor'),
			'memori'=>$this->input->post('memori'),
			'hardisk'=>$this->input->post('hardisk'),
			'foto'=>$this->input->post('foto'),
			'id_ruang'=>$this->input->post('id_ruang'),
			'keterangan'=>$this->input->post('keterangan'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_komputer',$id);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("komputer",$data)){
			return "Berhasil";
		}
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function view_row(){ 
		$query = $this->db->query("SELECT * FROM ruang)");
		return $query->result();
	}

	//proses simpan/cetak
	public function view_komputer(){ 
		$query = $this->db->query("SELECT detail_pemeriksaan.*, gejala.id_gejala, gejala.nm_gejala FROM detail_pemeriksaan INNER JOIN gejala ON detail_pemeriksaan.fk_gejala = gejala.id_gejala WHERE detail_pemeriksaan.fk_pemeriksaan = (SELECT MAX(fk_pemeriksaan) FROM detail_pemeriksaan)");
		// $query = $this->db->query("SELECT detail_pemeriksaan.*, gejala.id_gejala, gejala.nm_gejala FROM detail_pemeriksaan INNER JOIN gejala ON detail_pemeriksaan.fk_gejala = gejala.id_gejala WHERE MAX(detail_pemeriksaan.cetak)");
		return $query->result();
	}
}