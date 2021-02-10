<?php

class Model_admin extends CI_Model{
	
	//User
	function getuser(){
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

	function simpanuser($data = array()){
		$this->db->insert('tb_user', $data);
	}

	function hapususer($id){
		$query = $this->db->query("SELECT * FROM tb_user WHERE id = '$id'");
		$cek = $query->row();

		if ($cek->foto != 'default.png') {
			unlink("./assets/img/profile/$cek->foto");
		}

		$this->db->where('id', $id);
		$this->db->delete('tb_user');
	}

	function userbyId($id){
		$query = $this->db->query("SELECT * FROM tb_user WHERE id = '$id'");
		return $query->row();
	}

	function simpansuntinguser($data = array(), $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_user');
	}

	//Kategori
	function getkategori(){
		$query = $this->db->query("SELECT * FROM tb_kategori");
		return $query->result();
	}

	function cekkategori($nama){
		$query = $this->db->query("SELECT * FROM tb_kategori WHERE nama = '$nama'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function simpankategori($data){
		$this->db->insert('tb_kategori', $data);
	}

	function hapuskategori($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_kategori');
	}

	function kategoribyId($id){
		$query = $this->db->query("SELECT * FROM tb_kategori WHERE id = '$id'");
		return $query->row();
	}

	function simpansuntingkategori($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_kategori');
	}

	//Model Pelatihan
	function getmodul(){
		$query = $this->db->query("SELECT tb_kategori.nama as nama_kategori, tb_modul_pelatihan.id, tb_modul_pelatihan.id_kategori, tb_modul_pelatihan.judul, tb_modul_pelatihan.waktu, tb_modul_pelatihan.file, tb_modul_pelatihan.id_peminta, tb_modul_pelatihan.deskripsi, tb_modul_pelatihan.status, tb_user.nama FROM tb_modul_pelatihan JOIN tb_kategori ON tb_modul_pelatihan.id_kategori = tb_kategori.id JOIN tb_user ON tb_modul_pelatihan.id_peminta = tb_user.id");
		return $query->result();
	}

	function aksimodul($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_modul_pelatihan');
	}

	function hapusmodul($id){
		$query = $this->db->query("SELECT * FROM tb_modul_pelatihan WHERE id = '$id'")->row();
		unlink("./uploads/pelatihan/$query->file");

		$this->db->where('id', $id);
		$this->db->delete('tb_modul_pelatihan');
	}

	//Rapat
	function getrapat(){
		$query = $this->db->query("SELECT * FROM tb_hasil_rapat");
		return $query->result();
	}

	function cekrapat(){
		$query = $this->db->query("SELECT * FROM tb_hasil_rapat WHERE tema_rapat = '$tema_rapat'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function getforum(){
		$query = $this->db->query("SELECT tb_kategori.nama as nama_kategori, tb_list_forum.id, tb_list_forum.id_kategori, tb_list_forum.nama, tb_list_forum.id_pembuat, tb_list_forum.status, tb_user.nama as pembuat FROM tb_list_forum JOIN tb_kategori ON tb_list_forum.id_kategori = tb_kategori.id JOIN tb_user ON tb_list_forum.id_pembuat = tb_user.id");
		return $query->result();
	}

	function aksiforum($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_list_forum');
	}

	function hapusforum($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_list_forum');
	}

	//Kata Dasar
	function getkatadasar(){
		$query = $this->db->query("SELECT * FROM tb_katadasar");
		return $query->result();
	}

	function hapuskatadasar($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_katadasar');
	}

	function cekkatadasar($term, $stem){
		$query = $this->db->query("SELECT * FROM tb_katadasar WHERE term = '$term' AND stem = '$stem'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function simpankatadasar($data){
		$this->db->insert('tb_katadasar', $data);
	}

	function katadasarbyId($id){
		$query = $this->db->query("SELECT * FROM tb_katadasar WHERE id = '$id'");
		return $query->row();
	}

	function simpansuntingkatadasar($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_katadasar');
	}

	//Stop Word
	function getstopword(){
		$query = $this->db->query("SELECT * FROM tb_stopword");
		return $query->result();
	}

	function hapusstopword($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_stopword');
	}

	function cekstopword($kata){
		$query = $this->db->query("SELECT * FROM tb_stopword WHERE kata = '$kata'");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function simpanstopword($data){
		$this->db->insert('tb_stopword', $data);
	}

	function stopwordbyId($id){
		$query = $this->db->query("SELECT * FROM tb_stopword WHERE id = '$id'");
		return $query->row();
	}

	function simpansuntingstopword($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_stopword');
	}

	function hapusbobot(){
		$this->db->truncate('tb_bobot');
	}

	function getviewbobot($tipe){
		if ($tipe == 'pelatihan') {
			$query = $this->db->query("SELECT tb_modul_pelatihan.judul, tb_bobot.id, tb_bobot.tipe, tb_bobot.term, tb_bobot.id_desc, tb_bobot.jumlah, tb_bobot.bobot FROM tb_bobot JOIN tb_modul_pelatihan ON tb_bobot.id_desc = tb_modul_pelatihan.id WHERE tipe = '$tipe'");
		}else{
			$query = $this->db->query("SELECT tb_materi.nama, tb_bobot.id, tb_bobot.tipe, tb_bobot.term, tb_bobot.id_desc, tb_bobot.jumlah, tb_bobot.bobot FROM tb_bobot JOIN tb_materi ON tb_bobot.id_desc = tb_materi.id WHERE tipe = '$tipe'");
		}
		return $query->result();
	}

	function getmaterihitung(){
		$query = $this->db->query("SELECT * FROM tb_materi");
		return $query;
	}

	function getmodulhitung(){
		$query = $this->db->query("SELECT * FROM tb_modul_pelatihan WHERE status = 1");
		return $query;
	}

	function hitungkata($kata, $id_desc){
		$query = $this->db->query("SELECT * FROM tb_bobot WHERE term = '$kata' AND id_desc = '$id_desc'");
		return $query;
	}

	function tambahjumlahkata($kata, $id_desc, $total){
		$this->db->set('jumlah', $total);
		$this->db->where('term', $kata);
		$this->db->where('id_desc', $id_desc);
		$this->db->update('tb_bobot');
	}

	function simpankebobot($data){
		$this->db->insert('tb_bobot', $data);
	}

	function getbobot(){
		$query = $this->db->query("SELECT * FROM tb_bobot");
		return $query;
	}

	function Nterm($term){
		$query = $this->db->query("SELECT Count(*) as N FROM tb_bobot WHERE term = '$term'");
		return $query->row();
	}

	function simpanbobot($bobot, $id){
		$this->db->set('bobot', $bobot);
		$this->db->where('id', $id);
		$this->db->update('tb_bobot');
	}
}