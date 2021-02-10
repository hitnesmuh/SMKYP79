<?php

class Model_login extends CI_Model{

	function loginGuru($username, $password){
		$query = $this->db->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' AND level = 2");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function selectByUsername($username){
		$query = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'");
		return $query;
	}


	function loginKurikulum($username, $password){
		$query = $this->db->query("SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' AND level = 1");
		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}