<?php

class Model_guru extends CI_Model{
	
	//Guru
	function getguru(){
		$query = $this->db->query("SELECT * FROM tb_user");
		return $query->result();
	}

	function cekusername($username){
		$query = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	//Rapat/Forum
	function getforum(){
		$query = $this->db->query("SELECT * FROM tb_hasil_rapat");
		return $query->result();
	}

	function cekforum(){
		$query = $this->db->query("SELECT * FROM tb_hasil_rapat WHERE tema_rapat = '$tema_rapat'");
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
		$this->db->insert('tb_hasil_rapat', $data);
	}

	function simpansuntingforum($data = array(), $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_hasil_rapat');
	}

	function matapelajaranbyId($id){
		$query = $this->db->query("SELECT * FROM tb_mata_pelajaran WHERE id = '$id'");
		return $query->row();
	}

	//Materi Guru
	function getmateri($id){
		$query = $this->db->query("SELECT tb_materi.id, tb_materi.id_mapel, tb_materi.nama, tb_materi.uraian_singkat, tb_materi.file, tb_materi.id_pembuat, tb_user.nama as nama_guru FROM tb_materi JOIN tb_user ON tb_materi.id_pembuat = tb_user.id WHERE tb_materi.id_mapel = '$id'");
		return $query->result();
	}

	function materibyId($id){
		$query = $this->db->query("SELECT * FROM tb_materi WHERE id = '$id'");
		return $query->row();
	}

	function simpanmateri($data){
		$this->db->insert('tb_materi', $data);
	}

	function hapusmateri($id){
		$query = $this->db->query("SELECT * FROM tb_materi WHERE id = '$id'")->row();
		unlink("./uploads/materi/$query->file");

		$this->db->where('id', $id);
		$this->db->delete('tb_materi');
	}
	
	function cekmateri($nama, $id_mapel){
		$query = $this->db->query("SELECT * FROM tb_materi WHERE nama = '$nama' AND id_mapel = '$id_mapel'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	/*
	function simpansuntingmateri($data = arrya(), $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_materi');
	}
	*/
}