<?php

class Model_kurikulum extends CI_Model{

	function simpanpelatihan($data){
		$this->db->insert('tb_modul_pelatihan', $data);
	}

	//Mata Pelajaran
	function getmatapelajaran(){
		$query = $this->db->query("SELECT * FROM tb_mata_pelajaran");
		return $query->result();
	}

	function getmateri(){
		$query = $this->db->query("SELECT * FROM tb_materi");
		return $query->result();
	}

	function cekmata_pelajaran($mata_pelajaran){
		$query = $this->db->query("SELECT * FROM tb_mata_pelajaran WHERE nama = '$mata_pelajaran'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function simpanmatapelajaran($data = array()){
		$this->db->insert('tb_mata_pelajaran', $data);
	}

	function matapelajaranbyId($id){
		$query = $this->db->query("SELECT * FROM tb_mata_pelajaran WHERE id = '$id'");
		return $query->row();
	}

	function simpansuntingmatapelajaran($data = array(), $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_mata_pelajaran');
	}

	function hapusmatapelajaran($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_mata_pelajaran');
	}

	//Forum
	function cekforum($nama, $kategori){
		$query = $this->db->query("SELECT * FROM tb_list_forum WHERE id_pembuat = '$nama' AND id_kategori = '$kategori'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function forumbyId($id){
		$query = $this->db->query("SELECT * FROM tb_hasil_rapat WHERE id = '$id'");
		return $query->row();
	}

	function simpanforum($data = array()){
		$this->db->insert('tb_list_forum', $data);
	}

	function simpansuntingforum($data = array(), $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_hasil_rapat');
	}

	//Pelatihan (Modul Pelatihan)
	function getmodul(){
		$query = $this->db->query("SELECT * FROM tb_modul_pelatihan");
		return $query->result();
	}
}