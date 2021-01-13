<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model {

	public function getDataKomen($value='')
	{
		// $query = $this->db->query("Select * from kamera");
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->order_by('id_komen','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function countLaboratorium()
	{
		$query = $this->db->query("SELECT COUNT(id_ruang) AS total FROM ruang");
		return $query->result();
	}

	public function countFakultas()
	{
		$query = $this->db->query("SELECT COUNT(id_fakultas) AS total FROM fakultas");
		return $query->result();
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	public function countPemesanan()
	{
		$query = $this->db->query("SELECT COUNT(id_pemesanan) AS total FROM pemesanan");
		return $query->result();
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}