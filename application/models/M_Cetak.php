<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_Cetak extends CI_Model { 

	public function view(){ 
	 	$query = $this->db->query("SELECT ruang.id_ruang, ruang.kode_lab, ruang.nama_ruang, ruang.nama_gedung, ins.id_instruktur, ins.nama_instruktur, kursus.id_kursus, kursus.nama_kursus, fakultas.id_fakultas, fakultas.nama_fakultas, staff.nama, pesan.* from pemesanan as pesan JOIN ruang as ruang ON pesan.id_ruang = ruang.id_ruang JOIN instruktur as ins ON pesan.id_instruktur = ins.id_instruktur JOIN kursus as kursus ON pesan.id_kursus = kursus.id_kursus JOIN fakultas as fakultas ON pesan.id_fakultas = fakultas.id_fakultas JOIN users as staff ON pesan.id_user = staff.id_users");
		return $query->result();
	} 

	public function view_row(){ 
		$query = $this->db->query("SELECT ruang.id_ruang, ruang.kode_lab, ruang.nama_ruang, ruang.nama_gedung, ins.id_instruktur, ins.nama_instruktur, kursus.id_kursus, kursus.nama_kursus, fakultas.id_fakultas, fakultas.nama_fakultas, staff.nama, pesan.* from pemesanan as pesan JOIN ruang as ruang ON pesan.id_ruang = ruang.id_ruang JOIN instruktur as ins ON pesan.id_instruktur = ins.id_instruktur JOIN kursus as kursus ON pesan.id_kursus = kursus.id_kursus JOIN fakultas as fakultas ON pesan.id_fakultas = fakultas.id_fakultas JOIN users as staff ON pesan.id_user = staff.id_users");
		return $query->result();
	}
}

/* End of file cetak_model.php */ 
/* Location: ./application/models/cetak_model.php */