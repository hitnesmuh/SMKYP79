<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_forum extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$this->load->model('Model_admin');
		$this->load->model('Model_forum');
	}

	function index($id, $id_forum){
		$data['kategori'] = $this->Model_admin->kategoribyId($id);
		$data['forum'] = $this->Model_forum->forumbyId($id_forum);
		$data['jumlah'] = $this->Model_forum->jumlahpost();
		$this->load->view('Forum/index', $data);
	}

	function hitungpostbaru(){
		$jumlahbaru = $this->Model_forum->jumlahpost()->hasil;
		$jumlahlama = $this->input->post('postlama');
		$kirim = $jumlahbaru-$jumlahlama;
		$dat = array(
			'error' => '',
			'jumlah' => $kirim
		);
		echo json_encode($dat);
	}

	function load_data($id){
		$data['posting'] = $this->Model_forum->listposting($this->input->post('limit'), $this->input->post('start'));
		/*$data['comment'] = $this->Model_home->listcomment(0, 0, 0);*/

		if ($data['posting']->num_rows() > 0){
			$dat['posting'] = $data['posting']->result();
			$dat['kategori'] = $this->Model_admin->kategoribyId($id);
			/*$dat['comment'] = $data['comment']->result();*/
			$this->load->view('Forum/load_data', $dat);
		}
	}
	
	function posting(){
		$data['status'] = 0;
		$data['id_kategori'] = $this->input->post('id_kategori');
		if ($this->session->userdata('logged') == 'admin') {
			$data['id_user'] = 0;
		}else{
			$data['id_user'] = $this->session->userdata('id');
		}
		$data['isi'] = $this->input->post('isi');
		$data['waktu'] = date('Y-m-d H:i:s');
		
		$this->Model_forum->posting($data);
		echo json_encode(['error' => '']);
	}

	function editpost($id){
		$data['isi'] = $this->input->post('isiedit');
		$data['edit_status'] = 1;
		if ($this->Model_forum->editpost($data, $id)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function hapuspost(){
		$id = $this->input->post('id');
		if ($this->Model_forum->deletepost($id)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function reportpost(){
		$data['id_posting'] = $this->input->post('id_posting');
		$data['id_user'] = $this->input->post('id_user');
		if ($this->Model_forum->reportpost($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function hapuscomment(){
		$id = $this->input->post('id');
		if ($this->Model_forum->deletecomment($id)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function reportcomment(){
		$data['id_posting'] = $this->input->post('id_posting');
		$data['id_user'] = $this->input->post('id_user');
		if ($this->Model_forum->reportcomment($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function comment(){
		$data['status'] = $this->input->post('status');
		$data['id_kategori'] = $this->input->post('id_kategori');
		if ($this->session->userdata('logged') == 'admin') {
			$data['id_user'] = 0;
		}else{
			$data['id_user'] = $this->session->userdata('id');
		}
		
		$data['isi'] = $this->input->post('isi');
		$data['waktu'] = date('Y-m-d H:i:s');
		/*$offset = $this->input->post('offset');*/


		$this->Model_forum->posting($data);
		$dat = array(
			'error' => '',
			/*'offset' => $offset,*/
			'id' => $this->input->post('status')
		);
		echo json_encode($dat);
	}

	function load_comment($id){
		$data = $this->Model_forum->listcomment($this->input->post('id')/*, $this->input->post('limit'), $this->input->post('offset')*/);

		if ($data->num_rows() > 0) {
			$dat['comment'] = $data->result();
			$dat['kategori'] = $this->Model_admin->kategoribyId($id);
			$this->load->view('Forum/load_comment', $dat);
		}
	}

	function profile(){
		$this->load->view("Forum/View_profile");
	}

	function suntingprofile(){
		$this->load->view("Forum/View_suntingprofile");
	}

	function simpansuntingprofile($id){
		if ($this->input->post('username') != $this->session->userdata('username') && $this->Model_admin->cekusername($this->input->post('username'))) {
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect('suntingprofile');
		}else{
			if (empty($_FILES['gambar']['name'])){
				$data['username'] = $this->input->post('username');
				$data['nama'] = $this->input->post('nama');
				$this->session->set_flashdata('message', '<span class="text-success mt-2">Berhasil disimpan</span>');
			}else{
				$input = $_FILES['gambar']['tmp_name'];
				$temp = explode(".", $_FILES["gambar"]["name"]);
				$output = $this->input->post('username') . '.' . end($temp);
				$folder = "assets/img/profile/";

				if ($this->session->userdata('foto') != 'default.png') {
					$foto = $this->session->userdata('foto');
					unlink("./assets/img/profile/$foto");
				}

				$terupload = move_uploaded_file($input, $folder.$output);

				if ($terupload) {
					$this->session->set_flashdata('message', '<span class="text-success mt-2">Berhasil disimpan</span>');
					$this->session->set_userdata('foto', $output);
				}else{
					$this->session->set_flashdata('message', '<span class="text-danger mt-2">Foto gagal diunggah</span>');
				}

				$data['username'] = $this->input->post('username');
				$data['nama'] = $this->input->post('nama');
				$data['foto'] = $output;
			}

			$userdata = array(
				'username'    => $data['username'], 
				'nama'        => $data['nama'],
			);
			$this->session->set_userdata($userdata);
			$this->Model_forum->suntingprofile($data, $id);
		}
	}

	function ubahpassword(){
		$this->load->view('Forum/View_ubahpassword');
	}

	function simpanubahpassword($id){
		if ($this->input->post('pass') != $this->session->userdata('password')) {
			$this->session->set_flashdata('message', 'Password lama Anda salah');
			redirect('ubahpassword');
		}else if($this->input->post('pass2') != $this->input->post('pass3')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulang lagi');
			redirect('ubahpassword');
		}else{
			$data['password'] = $this->input->post('pass2');
			$this->session->set_flashdata('message', '<span class="text-success mt-2">Berhasil disimpan</span>');
			$this->Model_forum->suntingprofile($data, $id);
		}

		$userdata = array(
			'password'    => $data['password'], 
		);
		$this->session->set_userdata($userdata);
		redirect('profile');
	}
}