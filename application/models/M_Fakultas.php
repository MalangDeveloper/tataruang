<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Fakultas extends CI_Model {

	public function getDataFakultas()
	{
		$this->db->select('*');
		$this->db->from('fakultas');
		$this->db->order_by('id_fakultas','DESC');
		$query = $this->db->get();

		
		return $query->result();
	}

		function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function getFakultasId()
	{
		$id_fakultas=$this->session->userdata['id_fakultas'];
		$level=$this->session->userdata['level'];
		$query = $this->db->query("Select * from fakultas where id_fakultas='$id_fakultas' and level='$level'");
		return $query->result();
	}

	public function updateFakultas($id_fakultas){
		$data = array(
			'nama_fakultas'=>$this->input->post('nama_fakultas'),
			'detail'=>$this->input->post('detail'),
			'solusi'=>$this->input->post('solusi'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_fakultas',$id_fakultas);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("fakultas",$data)){
			return "Berhasil";
		}
	}

	function inputfakultas(){
        // $hasil=$this->db->query("INSERT INTO fakultas (nama_fakultas) VALUES ('$nama_fakultas')");
        // return $hasil;
		$query = $this->db->select('nama_fakultas')
                      ->from('fakultas')
                      ->get();
		$object=array
		(
			'nama_fakultas'=>$this->input->post('nama_fakultas')
		);
		$this->db->insert('fakultas',$object);
    }

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}