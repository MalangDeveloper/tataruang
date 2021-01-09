<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gejala extends CI_Model {

	public function getDataGejala($value='')
	{
		$this->db->select('*');
		$this->db->from('gejala');
		$this->db->order_by('id_gejala','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function inputGejala(){
		$nextId = '';
		$query = $this->db->select('kd_gejala')
                      ->from('gejala')
                      ->get();
		$row = $query->last_row();
		if($row){
			$idPostfix = (int)substr($row->kd_gejala,1)+1;
			$nextId = 'G'.STR_PAD((string)$idPostfix,3,"0",STR_PAD_LEFT);
		}
		else{
			$nextId = 'G001';
		} // For the first time
		$object=array
		(
			'kd_gejala' => $nextId,
			'nm_gejala'=>$this->input->post('nm_gejala')
		);
		$this->db->insert('gejala',$object);
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}