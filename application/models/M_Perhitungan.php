<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Perhitungan extends CI_Model {

	public function getPerhitunganQueryObject()
	{
		$query = $this->db->query("SELECT * FROM detail_kasus");
		return $query->result();
	}

	public function joinPerhitungan()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
			->select('*')
			->join('penyakit', 'basis_kasus.fk_penyakit = penyakit.id_penyakit')
			->get('basis_kasus');
		return $db_kasus->result();
	}

	public function insertPemeriksaan($data)
	{
		//ini buat nyimpan ke database pemeriksaan
		$this->db->insert('pemeriksaan', $data);
	}

	public function insertDetailPemeriksaan($data)
	{
		//ini buat nyimpan ke database detail pemeriksaan
		$this->db->insert('detail_pemeriksaan', $data);
	}

	//proses simpan/cetak
	public function view_row(){ 
		$query = $this->db->query("SELECT pemeriksaan.*, penyakit.id_penyakit, penyakit.nm_penyakit, penyakit.detail, penyakit.solusi FROM pemeriksaan INNER JOIN penyakit ON pemeriksaan.fk_penyakit = penyakit.id_penyakit WHERE pemeriksaan.cetak = (SELECT MAX(cetak) FROM pemeriksaan)");
		return $query->result();
	}

	//proses simpan/cetak
	public function view_gejala(){ 
		$query = $this->db->query("SELECT detail_pemeriksaan.*, gejala.id_gejala, gejala.nm_gejala FROM detail_pemeriksaan INNER JOIN gejala ON detail_pemeriksaan.fk_gejala = gejala.id_gejala WHERE detail_pemeriksaan.fk_pemeriksaan = (SELECT MAX(fk_pemeriksaan) FROM detail_pemeriksaan)");
		// $query = $this->db->query("SELECT detail_pemeriksaan.*, gejala.id_gejala, gejala.nm_gejala FROM detail_pemeriksaan INNER JOIN gejala ON detail_pemeriksaan.fk_gejala = gejala.id_gejala WHERE MAX(detail_pemeriksaan.cetak)");
		return $query->result();
	}
}