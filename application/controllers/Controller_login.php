<?php

class Controller_login extends CI_Controller {

	function login(){
		if ($this->input->post('username') == 'sayaadmin' && $this->input->post('password') == 'sayaadmin') {
			$userdata = array(
				'id'		=> 0,
				'logged'	=> 'admin'
			);
			$this->session->set_userdata($userdata);
			redirect('admin');
		}elseif($this->Model_login->loginGuru($this->input->post('username'), $this->input->post('password'))){
			$data = $this->Model_login->selectByUsername($this->input->post('username'))->row_array();
			$userdata = array(
				'id'		=> $data['id'],
				'username'	=> $data['username'],
				'password'	=> $data['password'],
				'nama'		=> $data['nama'],
				'foto'		=> $data['foto'],
				'logged'	=> 'guru'
			);
			$this->session->set_userdata($userdata);
			redirect('guru');
		}elseif ($this->Model_login->loginKurikulum($this->input->post('username'), $this->input->post('password'))){
			$data = $this->Model_login->selectByUsername($this->input->post('username'))->row_array();
			$userdata = array(
				'id'		=> $data['id'],
				'username'	=> $data['username'],
				'password'	=> $data['password'],
				'nama'		=> $data['nama'],
				'foto'		=> $data['foto'],
				'logged'	=> 'kurikulum'
			);
			$this->session->set_userdata($userdata);
			redirect('kurikulum');
		}else{
			$this->session->set_flashdata('message', 'Username atau Password salah');
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function index(){
		$login = $this->session->userdata('logged');
		if ($login == 'admin') {
			redirect('admin');
		}elseif ($login == 'kurikulum') {
			redirect('kurikulum');
		}elseif ($login == 'guru') {
			redirect('guru');
		}else{
			$this->load->view('Login/view_login');
		}
	}

}