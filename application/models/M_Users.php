<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Users extends CI_Model {

	function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}
	
	public function getDataUsers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_users','DESC');
		$query = $this->db->get();

		$query = $this->db->query("SELECT users.*, fakultas.id_fakultas, fakultas.nama_fakultas FROM users INNER JOIN fakultas ON users.id_fakultas = fakultas.id_fakultas ORDER BY id_users DESC");

		
		return $query->result();
	}

	public function getUserId()
	{
		$id_users=$this->session->userdata['id_users'];
		$level=$this->session->userdata['level'];
		$query = $this->db->query("Select * from users where id_users='$id_users' and level='$level'");
		return $query->result();
	}

	public function updateProfile($data){
		try{
    		$id_users=$this->session->userdata['id_users'];
	      	$this->db->where('id_users',$id_users)->limit(1)->update('users', $data);
	      	return true;
	    }catch(Exception $e){}
	}

	public function updateUsers($id){
		$data = array(
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password'),
			'nama'=>$this->input->post('nama'),
			'level'=>$this->input->post('level'),
			'updated_at'=>$this->input->post('updated_at'),
			'id_fakultas'=>$this->input->post('id_fakultas'),
		);
		$data = $this->input->post();
		//mengeset where id=$id
		$this->db->where('id_users',$id);
		/*eksekusi update product set $data from product where id=$id
		jika berhasil return berhasil */
		if($this->db->update("users",$data)){
			return "Berhasil";
		}
	}

	function ubahpassword($data){
		$id_users=$this->session->userdata['id_users'];
        $this->db->where('id_users',$id_users);
        $this->db->update('users', $data);
        return TRUE;
	}
	
	function ubahpasswordUsers($data, $id_users){
        $this->db->where('id_users',$id_users);
        $this->db->update('users', $data);
        return TRUE;
    }

	function inputData(){
		$query = $this->db->select('*')
			->from('users')
			->get();

		date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');



		$object = array(
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'id_fakultas'=>$this->input->post('id_fakultas'),
			'created_at'=>$now,
			'level'=>$this->input->post('level')
		);
		$this->db->insert('users',$object);
    }

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}