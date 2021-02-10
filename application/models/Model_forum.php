<?php

class Model_forum extends CI_Model{
	
	function forumbyId($id){
		$query = $this->db->query("SELECT * FROM tb_list_forum WHERE id = '$id'");
		return $query->row();
	}

	function listposting($limit, $start){
		$this->db->distinct();
		$this->db->select('tb_forum.id as id_posting, tb_forum.id_kategori, tb_forum.id_user, tb_forum.isi as isi_posting, tb_forum.waktu as waktu_posting, tb_forum.status as status_posting, tb_user.id, tb_user.nama as nama_user, tb_user.foto as foto_user');
		$this->db->from('tb_forum');
		$this->db->join('tb_user', 'tb_forum.id_user = tb_user.id', 'inner');
		$this->db->where('status', 0);
		$this->db->order_by('id_posting', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}

	function jumlahpost(){
		$query = $this->db->query("SELECT count(id) as hasil FROM tb_forum where status = 0");
		return $query->row();
	}

	function editpost($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);

		if ($this->db->update('tb_forum')) {
			return true;
		}else{
			return false;
		}
	}

	function deletepost($id){
		$query = $this->db->query("SELECT * FROM tb_forum WHERE id = '$id'")->row();
		$this->db->where('id', $id);
		if ($this->db->delete('tb_forum')) {
			$this->db->where('status', $id);
			$this->db->delete('tb_forum');
			return true;
		}else{
			return false;
		}
	}

	/*function reportpost($data){
		$user = $data['id_user'];
		$id = $data['id_posting'];

		$report = $this->db->query("SELECT * FROM reported_post WHERE id_posting = '$id'");
		$reporter = $this->db->query("SELECT * FROM reporter_post WHERE id_user = '$user' AND id_posting = '$id'");

		if ($report->num_rows() == 0) {
			$this->db->query("INSERT INTO reported_post SELECT * FROM home WHERE id_posting = '$id'");
			$this->db->insert('reporter_post', $data);
			return true;
		}elseif ($reporter->num_rows() == 0) {
			if ($this->db->insert('reporter_post', $data)) {
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}*/

	function listcomment($id/*, $limit, $start*/){
		$this->db->select('tb_forum.id as id_posting, tb_forum.status as status_posting, tb_forum.id_user, tb_forum.isi as isi_posting, tb_forum.waktu as waktu_posting, tb_user.id, tb_user.nama as nama_user, tb_user.foto as foto_user');
		$this->db->from('tb_forum');
		$this->db->join('tb_user', 'tb_forum.id_user = tb_user.id', 'inner');
		if ($id != 0) {
			$this->db->where('status', $id);
			/*$this->db->limit($limit, $start);*/
		}
		$query = $this->db->get();
		return $query;
	}

	function deletecomment($id){
		$this->db->where('id', $id);
		if ($this->db->delete('tb_forum')){
			return true;
		}else{
			return false;
		}
	}

	/*function reportcomment($data){
		$user = $data['id_user'];
		$id = $data['id_posting'];

		$report = $this->db->query("SELECT * FROM reported_post WHERE id_posting = '$id'");
		$reporter = $this->db->query("SELECT * FROM reporter_post WHERE id_user = '$user' AND id_posting = '$id'");
		$count = $this->db->query("SELECT * FROM reporter_post WHERE id_posting = '$id'");

		if($count->num_rows() >= 9) {
			$this->db->where('id_posting', $id);
			if ($this->db->delete('home')){
				$this->db->where('id_posting', $id);
				return true;
			}
		}elseif ($report->num_rows() == 0) {
			$this->db->query("INSERT INTO reported_post SELECT * FROM home WHERE id_posting = '$id'");
			$this->db->insert('reporter_post', $data);
			return true;
		}elseif($reporter->num_rows() == 0) {
			$this->db->insert('reporter_post', $data);
			return true;
		}else{
			return true;
		}
	}*/

	function posting($data = array()){
		$this->db->insert('tb_forum', $data);
	}

	function suntingprofile($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tb_user');
	}
}