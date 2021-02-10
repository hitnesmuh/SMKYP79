<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_kurikulum extends CI_Controller{

	function __construct(){
		parent::__construct();

		$login = $this->session->userdata('logged');
		if (empty($login)) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect('login');
		}else if($login == 'admin'){
			redirect('admin');
		}else if ($login == 'guru') {
			redirect('guru');
		}

		$this->load->model('Model_admin');
		$this->load->model('Model_kurikulum');
		$this->load->model('Model_guru');
	}

	function index(){
		$this->load->view('Kurikulum/index');
	}

	function tampilpelatihan(){
		$data['modul'] = $this->Model_admin->getmodul();
		$this->load->view('Kurikulum/View_tampilpelatihan', $data);
	}

	function tambahpelatihan(){
		$data['kategori'] = $this->Model_admin->getkategori();
		$this->load->view('Kurikulum/View_tambahpelatihan', $data);
	}

	function simpanpelatihan(){
		$input = $_FILES['file']['tmp_name'];
		$temp = explode(".", $_FILES["file"]["name"]);
		$judul = str_replace(' ', '', $this->input->post('judul'));
		$name = "pelatihan". $judul . $this->session->userdata('username');
		$output = $name. '.' . end($temp);

		$folder = "uploads/pelatihan/";
		$terupload = move_uploaded_file($input, $folder.$output);

		if ($terupload) {
			$data['id_kategori'] = $this->input->post('kategori');
			$data['judul'] = $this->input->post('judul');
			$data['waktu'] = $this->input->post('waktu');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['file'] = $output;
			$data['id_peminta'] = $this->session->userdata('id');
			$this->Model_kurikulum->simpanpelatihan($data);
		}
	}

	function profilekurikulum(){
		$this->load->view('Kurikulum/View_profilekurikulum');
	}

	//Mata Pelajaran
	function tampilmatapelajaran(){
		$data['matapelajaran'] = $this->Model_kurikulum->getmatapelajaran();
		$this->load->view('Kurikulum/View_tampilmatapelajaran', $data);
	}

	function tampilmateri($id){
		$data['matapelajaran'] = $this->Model_guru->matapelajaranbyId($id);
		$data['materi'] = $this->Model_guru->getmateri($id);
		$this->load->view('Kurikulum/View_tampilmateri', $data);
	}

	function tambahmatapelajaran(){
		$this->load->view('Kurikulum/View_tambahmatapelajaran');
	}

	function simpanmatapelajaran(){
		if ($this->Model_kurikulum->cekmata_pelajaran($this->input->post('nama'))) {
			$this->session->set_flashdata('message', '<span class="text-danger">Mata Pelajaran sudah ada</span>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['nama'] = $this->input->post('nama');
			$this->Model_kurikulum->simpanmatapelajaran($data);
			$this->session->set_flashdata('message', '<span class="text-success">Mata Pelajaran berhasil ditambahkan</span>');
			redirect('kurikulum/tampilmatapelajaran');
		}
	}

	function hapusmatapelajaran($id){
		$this->Model_kurikulum->hapusmatapelajaran($id);
		$this->session->set_flashdata('message', '<span class="text-success">Mata Pelajaran berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function suntingmatapelajaran($id){
		$data['matapelajaran'] = $this->Model_kurikulum->matapelajaranbyId($id);
		$this->load->view('Kurikulum/View_suntingmatapelajaran', $data);
	}

	function simpansuntingmatapelajaran($id){
		if ($this->input->post('nama') != $this->input->post('cek') && $this->Model_kurikulum->cekmata_pelajaran($this->input->post('nama'))){
			$this->session->set_flashdata('message', 'Mata Pelajaran sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['nama'] = $this->input->post('nama');
			$this->Model_kurikulum->simpansuntingmatapelajaran($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('kurikulum/tampilmatapelajaran');
		}
	}

	//Forum
	function tampilforum(){
		$data['forum'] = $this->Model_admin->getforum();
		$this->load->view('Kurikulum/View_forum', $data);
	}

	function tambahforum(){
		$data['kategori'] = $this->Model_admin->getkategori();
		$this->load->view('Kurikulum/View_tambahforum', $data);
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
			redirect('kurikulum/tampilforum');
		}
	}

	function hapusforum($id){
		$this->Model_admin->hapusforum($id);
		$this->session->set_flashdata('message', '<span class="text-success">Forum berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function suntingforum($id){
		$data['forumkurikulum'] = $this->Model_kurikulum->forumbyId($id);
		$this->load->view('Kurikulum/View_suntingforumkurikulum', $data);
	}

	function simpansuntingforum($id){
		if ($this->input->post('tema_rapat') != $this->input->post('cek') && $this->Model_kurikulum->cekforum($this->input->post('tema_rapat'))){
			$this->session->set_flashdata('message', 'Forum sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['tema_rapat'] = $this->input->post('tema_rapat');
			$data['tanggal_rapat'] = $this->input->post('tanggal_rapat');
			$data['isi_rapat'] = $this->input->post('isi_rapat');
			$this->Model_admin->simpansuntingforum($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('kurikulum/forumkurikulum');
		}
	}

	//Pelatihan (Modul Pelatihan)
	function tampilmodul(){
		$data['modul'] = $this->Model_kurikulum->getmodul();
		$this->load->view('Kurikulum/View_pelatihankurikulum', $data);
	}

	function hapusmodul($id){
		$this->Model_admin->hapusmodul($id);
		$this->session->set_flashdata('message', '<span class="text-success">Pelatihan berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}