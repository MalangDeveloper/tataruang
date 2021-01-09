<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ruang extends CI_Model {

	//proses simpan/cetak
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