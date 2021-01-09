<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Staff extends CI_Model {

	public function getDataKomen($value='')
	{
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->order_by('id_komen','DESC');
		$query = $this->db->get();
		return $query->result();
	}
#!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	public function countLaboratorium()
	{
		$query = $this->db->query("SELECT COUNT(id_ruang) AS total FROM ruang");
		return $query->result();
	}

	public function countFakultas()
	{
		$query = $this->db->query("SELECT COUNT(id_fakultas) AS total FROM fakultas");
		return $query->result();
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	public function countPemesanan()
	{
		$query = $this->db->query("SELECT COUNT(id_pemesanan) AS total FROM pemesanan");
		return $query->result();
	}

	function getDataPemesanan()
	{
		$id_users=$this->session->userdata['id_users'];
		$query = $this->db->query("SELECT ruang.id_ruang, ruang.kode_lab, ruang.nama_ruang, ruang.nama_gedung, ins.id_instruktur, ins.nama_instruktur, kursus.id_kursus, kursus.nama_kursus, fakultas.id_fakultas, fakultas.nama_fakultas, staff.nama, pesan.* from pemesanan as pesan JOIN ruang as ruang ON pesan.id_ruang = ruang.id_ruang JOIN instruktur as ins ON pesan.id_instruktur = ins.id_instruktur JOIN kursus as kursus ON pesan.id_kursus = kursus.id_kursus JOIN fakultas as fakultas ON pesan.id_fakultas = fakultas.id_fakultas JOIN users as staff ON pesan.id_user = staff.id_users WHERE id_users='$id_users'");
		return $query->result();
	}

	function getDataKasus()
	{
		$query = $this->db->query("SELECT penyakit.id_penyakit, penyakit.nm_penyakit, basis_kasus.* FROM basis_kasus JOIN penyakit ON basis_kasus.fk_penyakit = penyakit.id_penyakit");
		return $query->result();
	}

	function getDataKasusId($id)
	{
		$query = $this->db->query("Select basis_kasus.id_kasus, detail_kasus.*, gejala.id_gejala, gejala.nm_gejala from detail_kasus join basis_kasus on detail_kasus.fk_kasus = basis_kasus.id_kasus join gejala on gejala.id_gejala=detail_kasus.fk_gejala where detail_kasus.fk_kasus='$id'");
		return $query->result();
	}

	// public function getDataPemesanan()
	// {
	// 	$query = $this->db->query("SELECT pemesanan.*, ruang.kode_lab, ruang.nama_ruang, ruang.nama_gedung, pemesanan.tanggal FROM pemesanan INNER JOIN penyakit ON pemesanan.fk_penyakit = penyakit.id_penyakit LEFT JOIN users ON pemesanan.fk_user = users.id_users ORDER BY id_pemesanan DESC");
	// 	return $query->result();
	// }

	public function getDataPemeriksaanRevisi()
	{
		$query = $this->db->query("SELECT pemeriksaan.*, penyakit.id_penyakit, penyakit.nm_penyakit FROM pemeriksaan INNER JOIN penyakit ON pemeriksaan.fk_penyakit = penyakit.id_penyakit WHERE pemeriksaan.hasil < 50 AND pemeriksaan.status = 2 ORDER BY id_pemeriksaan DESC");
		return $query->result();
	}

	function getDataPemeriksaanId($id)
	{
		$query = $this->db->query("Select pemeriksaan.id_pemeriksaan, detail_pemeriksaan.*, gejala.id_gejala,gejala.nm_gejala from detail_pemeriksaan join pemeriksaan on detail_pemeriksaan.fk_pemeriksaan = pemeriksaan.id_pemeriksaan join gejala on gejala.id_gejala=detail_pemeriksaan.fk_gejala where detail_pemeriksaan.fk_pemeriksaan='$id'");
		return $query->result();
	}

	public function ambilPenyakit()
	{
		$query = $this->db->query("SELECT * FROM penyakit");
		return $query->result();
	}

	public function ambilFakultas()
	{
		$query = $this->db->query("SELECT * FROM fakultas");
		return $query->result();
	}

	public function ambilKursus()
	{
		$query = $this->db->query("SELECT * FROM kursus");
		return $query->result();
	}

	public function ambilInstruktur()
	{
		$query = $this->db->query("SELECT * FROM instruktur");
		return $query->result();
	}

	public function ambilRuang()
	{
		$query = $this->db->query("SELECT * FROM ruang");
		return $query->result();
	}
	
	function getdataID($where,$table){		
		return $this->db->get_where($table,$where);
	}

	//proses update pemeriksaan
	public function updatePemeriksaan($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//proses retain, menyimpan kasus baru ke basis_kasus untuk dijadikan solusi baru untuk kasus yang akan datang
	public function addKeBasis($output, $fk_gejala)
	{
		//proses input data ke tabel basis_kasus
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
		}

		$object=array
		(
			'kd_kasus' => $nextId,
			'fk_penyakit'=>$this->input->post('fk_penyakit')
		);
		$this->db->insert('basis_kasus',$object);

		//mengambil id_kasus dari data kasus yang baru disimpan diatas
		$id_kasus = $this->db->insert_id();

		//proses menyimpan data gejala kasus baru ke tabel detail_kasus berdasarkan id_kasus yang baru, kenapa ada proses foreach ? karna data gejala terdapat lebih dari 1 data yang diinputkan dalam 1 proses
		$result = array();
		foreach ($output as $key => $value) {
			$result[] = array(
				'fk_kasus' => $id_kasus,
				'fk_gejala' => $_POST['fk_gejala'][$key],
				'bobot' => $_POST['bobot'][$key]
			);
		}
		//insert_batch merupakan fungsi untuk multiple insert
		$this->db->insert_batch('detail_kasus', $result);
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

	function ubahpassword($data){
		$id_users=$this->session->userdata['id_users'];
        $this->db->where('id_users',$id_users);
        $this->db->update('users', $data);
        return TRUE;
    }

    function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}