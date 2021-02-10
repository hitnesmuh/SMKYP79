<?php 
date_default_timezone_set('Asia/Jakarta');

class Controller_guru extends CI_Controller{

	function __construct(){
		parent::__construct();

	$login = $this->session->userdata('logged');
		if (empty($login)) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect('login');
		}else if($login == 'admin'){
			redirect('admin');
		}else if ($login == 'kurikulum') {
			redirect('kurikulum');
		}

		$this->load->model('Model_admin');
		$this->load->model('Model_kurikulum');
		$this->load->model('Model_guru');
	}

	function index(){
		$this->load->view('Guru/index');
	}

	//Pelatihan
	function pelatihanguru(){
		$data['modul'] = $this->Model_admin->getmodul();
		$this->load->view('Guru/View_pelatihanguru', $data);
	}

	function matapelajaranguru(){
		$data['matapelajaran'] = $this->Model_kurikulum->getmatapelajaran();
		$this->load->view('Guru/View_matapelajaranguru', $data);
	}

	function tampilmateri($id){
		$data['matapelajaran'] = $this->Model_guru->matapelajaranbyId($id);
		$data['materi'] = $this->Model_guru->getmateri($id);
		$this->load->view('Guru/View_tampilmateri', $data);
	}

	function tambahmateri($id){
		$data['matapelajaran'] = $this->Model_guru->matapelajaranbyId($id);
		$this->load->view('Guru/View_tambahmateri', $data);
	}

	function simpanmateri($id_mapel){
		if ($this->Model_guru->cekmateri($this->input->post('nama'), $id_mapel)) {
			$this->session->set_flashdata('message', '<span class="text-danger">Materi sudah ada</span>');
		}else{
			$input = $_FILES['file']['tmp_name'];
			$temp = explode(".", $_FILES["file"]["name"]);
			$materi = str_replace(' ', '', $this->input->post('nama'));
			$name = "materi". $materi . $this->session->userdata('username');
			$output = $name. '.' . end($temp);

			$folder = "uploads/materi/";
			$terupload = move_uploaded_file($input, $folder.$output);

			if ($terupload) {
				$data['id_mapel'] = $this->input->post('id_mapel');
				$data['nama'] = $this->input->post('nama');
				$data['uraian_singkat'] = $this->input->post('uraian');
				$data['file'] = $output;
				$data['id_pembuat'] = $this->session->userdata('id');
				$this->Model_guru->simpanmateri($data);
				$this->session->set_flashdata('message', '<span class="text-success">Materi berhasil ditambahkan</span>');
			}
		}
	}

	function suntingmateri($id, $id_mapel){
		$data['matapelajaran'] = $this->Model_guru->matapelajaranbyId($id_mapel);
		$data['materi'] = $this->Model_guru->materibyId($id);
		$this->load->view('Guru/View_suntingmateri', $data);
	}

	function simpansuntingmateri($id, $id_mapel){
		if ($this->input->post('nama') != $this->input->post('cek') && $this->Model_guru->cekmateri($this->input->post('nama'), $id_mapel)) {
			$this->session->set_flashdata('message', '<span class="text-danger">Materi sudah ada</span>');	
		}else{
			$input = $_FILES['file']['tmp_name'];
			$temp = explode(".", $_FILES["file"]["name"]);
			$materi = str_replace(' ', '', $this->input->post('nama'));
			$name = "materi". $materi . $this->session->userdata('username');
			$output = $name. '.' . end($temp);

			$folder = "uploads/materi/";
			$terupload = move_uploaded_file($input, $folder.$output);

			if ($terupload) {
				$data['id_mapel'] = $this->input->post('id_mapel');
				$data['nama'] = $this->input->post('nama');
				$data['uraian_singkat'] = $this->input->post('uraian');
				$data['file'] = $output;
				$data['id_pembuat'] = $this->session->userdata('id');
				$this->Model_guru->simpansuntingmateri($data, $id);
			}
		}
	}

	function hapusmateri($id){
		$this->Model_guru->hapusmateri($id);
		$this->session->set_flashdata('message', '<span class="text-success">Materi berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function forumguru(){
		$this->load->view('Guru/View_forumguru');
	}
	/*
	//Materi
	function tambahmatapelajaran(){
		$this->load->view('Guru/View_tambahmatapelajaran');
	}

	function simpanmatapelajaran(){
		if ($this->Model_guru->cekmatapelajaran($this->input->post('mata_pelajaran'))) {
			$this->session->set_flashdata('message', 'Mata Pelajaran sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['mata_pelajaran'] = $this->input->post('mata_pelajaran');
			$data['tanggal_upload'] = $this->input->post('tanggal_upload');
			$data['file_mata_pelajaran'] = $this->input->post('file_mata_pelajaran');
			$this->Model_guru->simpanmatapelajaran($data);
			$this->session->set_flashdata('message', '<span class="text-success">Mata Pelajaran berhasil ditambahkan</span>');
			redirect('guru/tampilmatapelajaran');
		}
	}

	function hapusmatapelajaran($id){
		$this->Model_guru->hapusmatapelajaran($id);
		$this->session->set_flashdata('message', '<span class="text-success">Mata Pelajaran berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function simpansuntingmatapelajaran($id){
		if ($this->input->post('mata_pelajaran') != $this->input->post('cek') && $this->Model_guru->cekmatapelajaran($this->input->post('mata_pelajaran'))){
			$this->session->set_flashdata('message', 'Mata Pelajaran sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['mata_pelajaran'] = $this->input->post('mata_pelajaran');
			$data['tanggal_upload'] = $this->input->post('tanggal_upload');
			$data['file_mata_pelajaran'] = $this->input->post('file_mata_pelajaran');
			$this->Model_admin->simpansuntingmatapelajaran($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('guru/tampilmatapelajaran');
		}
	}
	*/

	//Rapat/Forum
	function tampilforum(){
		$data['forum'] = $this->Model_admin->getforum();
		$this->load->view('Guru/View_forum', $data);
	}

	function tambahforum(){
		$data['kategori'] = $this->Model_admin->getkategori();
		$this->load->view('Guru/View_tambahforum', $data);
	}

	function simpanforum(){
		if ($this->Model_kurikulum->cekforum($this->input->post('nama'), $this->input->post('kategori'))) {
			$this->session->set_flashdata('messagep', 'Nama forum dalam kategori ini sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['nama'] = $this->input->post('nama');
			$data['id_kategori'] = $this->input->post('kategori');
			$data['id_pembuat'] = $this->session->userdata('id');
			$this->Model_kurikulum->simpanforum($data);
			$this->session->set_flashdata('messagep', '<span class="text-success">Forum berhasil ditambahkan</span>');
			redirect('guru/tampilforum');
		}
	}

	function hapusforum($id){
		$this->Model_admin->hapusforum($id);
		$this->session->set_flashdata('message', '<span class="text-success">Forum berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function suntingforum($id){
		$data['forumguru'] = $this->Model_guru->forumbyId($id);
		$this->load->view('Guru/View_suntingforumguru', $data);
	}

	function simpansuntingforum($id){
		if ($this->input->post('tema_rapat') != $this->input->post('cek') && $this->Model_guru->cekforum($this->input->post('tema_rapat'))){
			$this->session->set_flashdata('message', 'Forum sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['tema_rapat'] = $this->input->post('tema_rapat');
			$data['tanggal_rapat'] = $this->input->post('tanggal_rapat');
			$data['isi_rapat'] = $this->input->post('isi_rapat');
			$this->Model_admin->simpansuntingforum($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('guru/forumguru');
		}
	}

}