<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class M_Cetak extends CI_Model { 

	public function view(){ 
	 	$query = $this->db->query("SELECT pemeriksaan.*, penyakit.id_penyakit, penyakit.nm_penyakit, users.id_users, users.nama FROM pemeriksaan INNER JOIN penyakit ON pemeriksaan.fk_penyakit = penyakit.id_penyakit LEFT JOIN users ON pemeriksaan.fk_user = users.id_users ORDER BY id_pemeriksaan DESC");
		return $query->result();
	} 

	public function view_row(){ 
		$query = $this->db->query("SELECT pemeriksaan.*, penyakit.id_penyakit, penyakit.nm_penyakit, users.id_users, users.nama FROM pemeriksaan INNER JOIN penyakit ON pemeriksaan.fk_penyakit = penyakit.id_penyakit LEFT JOIN users ON pemeriksaan.fk_user = users.id_users ORDER BY id_pemeriksaan DESC");
		return $query->result();
	}
}

/* End of file cetak_model.php */ 
/* Location: ./application/models/cetak_model.php */