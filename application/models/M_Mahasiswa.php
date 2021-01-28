<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model {

	public function getDataMahasiswa()
	{
		$query = $this->db->query("SELECT fakultas.id_fakultas, fakultas.nama_fakultas, mhs.* from mahasiswa as mhs JOIN fakultas as fakultas ON mhs.id_fakultas = fakultas.id_fakultas");
		return $query->result();
	}

		function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function getMahasiswaId()
	{
		$id_mahasiswa=$this->session->userdata['id_mahasiswa'];
		$level=$this->session->userdata['level'];
		$query = $this->db->query("Select * from mahasiswa where id_mahasiswa='$id_mahasiswa' and level='$level'");
		return $query->result();
	}

	public function updateMahasiswa($id_mahasiswa){
		$data = array(
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_mahasiswa',$id_mahasiswa);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("mahasiswa",$data)){
			return "Berhasil";
		}
	}

	function inputMahasiswa(){
		$query = $this->db->select('nama_mahasiswa')
                      ->from('mahasiswa')
                      ->get();
		$object=array
			(
				'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
				'nim'=>$this->input->post('nim'),
				'tgl_lahir'=>$this->input->post('tgl_lahir'),
				'password'=>md5($this->input->post('tgl_lahir')),
				'id_fakultas'=>$this->input->post('id_fakultas'),
			);
		$this->db->insert('mahasiswa',$object);
  	}
	
	function ubahpasswordMahasiswa($data, $id_mahasiswa){
		$this->db->where('id_mahasiswa',$id_mahasiswa);
		$this->db->update('mahasiswa', $data);
		return TRUE;
	}

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}