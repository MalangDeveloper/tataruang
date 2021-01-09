<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Basis extends CI_Model {

	
	function getDataKasus()
	{
		$query = $this->db->query("SELECT penyakit.id_penyakit, penyakit.nm_penyakit, basis_kasus.* FROM basis_kasus JOIN penyakit ON basis_kasus.fk_penyakit = penyakit.id_penyakit ORDER BY id_kasus ASC");
		return $query->result();
	}

	public function ambilPenyakit()
	{
		$query = $this->db->query("SELECT * FROM penyakit");
		return $query->result();
	}

	function getDataKasusId($id)
	{
		$query = $this->db->query("Select basis_kasus.id_kasus, detail_kasus.*, gejala.id_gejala, gejala.nm_gejala from detail_kasus join basis_kasus on detail_kasus.fk_kasus = basis_kasus.id_kasus join gejala on gejala.id_gejala=detail_kasus.fk_gejala where detail_kasus.fk_kasus='$id'");
		return $query->result();
	}

	public function ambilGejala($id)
	{
		$query = $this->db->query("SELECT * FROM gejala WHERE id_gejala NOT IN (SELECT fk_gejala FROM detail_kasus WHERE fk_kasus='$id')");
		return $query->result();
	}

	public function inputDataKasus()
	{
		$nextId = '';
		$query = $this->db->select('kd_kasus')
                      ->from('basis_kasus')
                      ->get();
		$row = $query->last_row();
		if($row){
			$idPostfix = (int)substr($row->kd_kasus,1)+1;
			$nextId = 'K'.STR_PAD((string)$idPostfix,3,"0",STR_PAD_LEFT);
		}
		else{
			$nextId = 'K001';
		} // For the first time
		$object=array
		(
			'kd_kasus' => $nextId,
			'fk_penyakit'=>$this->input->post('id_penyakit')
		);
		$this->db->insert('basis_kasus',$object);
	}

	public function inputDataDetail()
	{
		$data = array(
		'fk_kasus'=>$this->input->post('id_kasus'),
		'fk_gejala'=>$this->input->post('id_gejala'),
		'bobot'=>$this->input->post('bobot'));
		$this->db->insert('detail_kasus', $data);
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}