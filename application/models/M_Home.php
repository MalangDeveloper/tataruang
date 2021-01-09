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

	public function countPenyakit()
	{
		$query = $this->db->query("SELECT COUNT(id_penyakit) AS total FROM penyakit");
		return $query->result();
	}

	public function countKasus()
	{
		$query = $this->db->query("SELECT COUNT(id_kasus) AS total FROM basis_kasus");
		return $query->result();
	}

	public function countPemeriksaan()
	{
		$query = $this->db->query("SELECT COUNT(id_pemeriksaan) AS total FROM pemeriksaan");
		return $query->result();
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}