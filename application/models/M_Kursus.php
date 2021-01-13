<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kursus extends CI_Model {

	public function getDataKursus($value='')
	{
		$this->db->select('*');
		$this->db->from('kursus');
		$this->db->order_by('id_kursus','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function inputKursus(){
		$query = $this->db->select('nama_kursus')
                      ->from('kursus')
                      ->get();
		$object=array
		(
			'nama_kursus'=>$this->input->post('nama_kursus')
		);
		$this->db->insert('kursus',$object);
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}