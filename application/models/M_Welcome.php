<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Welcome extends CI_Model {

	function cek_login($email, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		return $this->db->get()->row();
	}

	function cek_login_mhs($nim, $password)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$nim);
		$this->db->where('password',md5($password));
		return $this->db->get()->row();
	}

	function getDataPemesanan()
	{
		$query = $this->db->query("SELECT ruang.id_ruang, ruang.kode_lab, ruang.nama_ruang, ruang.nama_gedung, ins.id_instruktur, ins.nama_instruktur, kursus.id_kursus, kursus.nama_kursus, fakultas.id_fakultas, fakultas.nama_fakultas, staff.nama, pesan.* from pemesanan as pesan JOIN ruang as ruang ON pesan.id_ruang = ruang.id_ruang JOIN instruktur as ins ON pesan.id_instruktur = ins.id_instruktur JOIN kursus as kursus ON pesan.id_kursus = kursus.id_kursus JOIN fakultas as fakultas ON pesan.id_fakultas = fakultas.id_fakultas JOIN users as staff ON pesan.id_user = staff.id_users ORDER BY pesan.tanggal DESC");
		return $query->result();
	}

	//untuk tambah data komentar
	function input_datakomentar($data,$table){
		$this->db->insert($table,$data);
	}
}