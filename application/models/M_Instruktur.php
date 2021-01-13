<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Instruktur extends CI_Model {

	public function getDataInstruktur()
	{
		$this->db->select('*');
		$this->db->from('instruktur');
		$this->db->order_by('id_instruktur','DESC');
		$query = $this->db->get();

		
		return $query->result();
	}

		function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function getInstrukturId()
	{
		$id_instruktur=$this->session->userdata['id_instruktur'];
		$level=$this->session->userdata['level'];
		$query = $this->db->query("Select * from instruktur where id_instruktur='$id_instruktur' and level='$level'");
		return $query->result();
	}

	public function updateInstruktur($id_instruktur){
		$data = array(
			'nama_instruktur'=>$this->input->post('nama_instruktur'),
			'detail'=>$this->input->post('detail'),
			'solusi'=>$this->input->post('solusi'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_instruktur',$id_instruktur);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("instruktur",$data)){
			return "Berhasil";
		}
	}

	function ubahpassword($data){
		$id_instruktur=$this->session->userdata['id_instruktur'];
        $this->db->where('id_instruktur',$id_instruktur);
        $this->db->update('instruktur', $data);
        return TRUE;
    }

	function inputInstruktur(){
        // $hasil=$this->db->query("INSERT INTO instruktur (nama_instruktur) VALUES ('$nama_instruktur')");
        // return $hasil;
		$query = $this->db->select('nama_instruktur')
                      ->from('instruktur')
                      ->get();
		$object=array
		(
			'nama_instruktur'=>$this->input->post('nama_instruktur')
		);
		$this->db->insert('instruktur',$object);
    }

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}