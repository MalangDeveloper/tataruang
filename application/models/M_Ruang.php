<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ruang extends CI_Model {

	//proses simpan/cetak
	function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}
	
	public function getDataRuang($value='')
	{
		$this->db->select('*');
		$this->db->from('ruang');
		$this->db->order_by('id_ruang','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function inputRuang(){
		$query = $this->db->select('*')
                      ->from('ruang')
                      ->get();
		$object=array
		(
			'nama_ruang'=>$this->input->post('nama_ruang'),
			'kode_lab'=>$this->input->post('kode_lab'),
			'nama_gedung'=>$this->input->post('nama_gedung'),
			'total_kapasitas'=>$this->input->post('total_kapasitas'),
			'internet'=>$this->input->post('internet'),
			'catatan'=>$this->input->post('catatan'),
		);
		$this->db->insert('ruang',$object);
	}

	public function updateRuang($id){
		$data = array(
			'nama_ruang'=>$this->input->post('nama_ruang'),
			'kode_lab'=>$this->input->post('kode_lab'),
			'nama_gedung'=>$this->input->post('nama_gedung'),
			'total_kapasitas'=>$this->input->post('total_kapasitas'),
			'internet'=>$this->input->post('internet'),
			'catatan'=>$this->input->post('catatan'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_ruang',$id);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("ruang",$data)){
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
	public function view_gejala(){ 
		$query = $this->db->query("SELECT detail_pemeriksaan.*, gejala.id_gejala, gejala.nm_gejala FROM detail_pemeriksaan INNER JOIN gejala ON detail_pemeriksaan.fk_gejala = gejala.id_gejala WHERE detail_pemeriksaan.fk_pemeriksaan = (SELECT MAX(fk_pemeriksaan) FROM detail_pemeriksaan)");
		// $query = $this->db->query("SELECT detail_pemeriksaan.*, gejala.id_gejala, gejala.nm_gejala FROM detail_pemeriksaan INNER JOIN gejala ON detail_pemeriksaan.fk_gejala = gejala.id_gejala WHERE MAX(detail_pemeriksaan.cetak)");
		return $query->result();
	}
}