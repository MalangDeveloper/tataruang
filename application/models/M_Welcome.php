<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Welcome extends CI_Model {

	public function getDataGejala($value='')
	{
		$this->db->select('*');
		$this->db->from('gejala');
		$this->db->order_by('id_gejala');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDataPenyakit($value='')
	{
		$this->db->select('*');
		$this->db->from('penyakit');
		$this->db->order_by('id_penyakit');
		$query = $this->db->get();
		return $query->result();
	}

	function cek_login($email, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		return $this->db->get()->row();
	}

	//untuk tambah data komentar
	function input_datakomentar($data,$table){
		$this->db->insert($table,$data);
	}
}