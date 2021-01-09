<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penyakit extends CI_Model {

	
	function getDataPenyakit()
	{
		$query = $this->db->query("Select * from penyakit");
		return $query->result();
	}

	//edit
	function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function ambilPenyakit()
	{
		$query = $this->db->query("SELECT * FROM penyakit");
		return $query->result();
	}

	public function updatePenyakit($id){
		$data = array(
			'nm_penyakit'=>$this->input->post('nm_penyakit'),
			'detail'=>$this->input->post('detail'),
			'solusi'=>$this->input->post('solusi'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_penyakit',$id);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("penyakit",$data)){
			return "Berhasil";
		}
	}

	public function inputPenyakit()
	{
		$nextId = '';
		$query = $this->db->select('kd_penyakit')
                      ->from('penyakit')
                      ->get();
		$row = $query->last_row();
		if($row){
			$idPostfix = (int)substr($row->kd_penyakit,1)+1;
			$nextId = 'P'.STR_PAD((string)$idPostfix,3,"0",STR_PAD_LEFT);
		}
		else{
			$nextId = 'P001';
		} // For the first time
		$object=array
		(
			'kd_penyakit' => $nextId,
			'nm_penyakit'=>$this->input->post('nm_penyakit'),
			'detail'=>$this->input->post('detail'),
			'solusi'=>$this->input->post('solusi')
		);
		$this->db->insert('penyakit', $object);
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}