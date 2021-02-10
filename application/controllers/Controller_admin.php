<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		$login = $this->session->userdata('logged');
		if (empty($login)) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect('login');
		}else if($login == 'guru'){
			redirect('guru');
		}else if ($login == 'kurikulum') {
			redirect('kurikulum');
		}
		
		$this->load->model('Model_admin');
		$this->load->model('Model_kurikulum');
		$this->load->model('Model_guru');
	}

	function index(){
		$data['user'] = $this->Model_admin->getuser();
		$this->load->view('Admin/index', $data);
	}

	//Guru
	function tambahuser(){
		$this->load->view('Admin/View_tambahuser');
	}

	function simpanuser(){
		if ($this->Model_admin->cekusername($this->input->post('username'))) {
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}elseif($this->input->post('pass') != $this->input->post('pass2')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulangi lagi');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('pass');
			$data['nama'] = $this->input->post('nama');
			$data['level'] = $this->input->post('level');
			$this->Model_admin->simpanuser($data);
			$this->session->set_flashdata('message', '<span class="text-success">Pengguna berhasil ditambahkan</span>');
			redirect('admin');
		}
	}

	function hapususer($id){
		$this->Model_admin->hapususer($id);
		$this->session->set_flashdata('message', '<span class="text-success">Pengguna berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function suntinguser($id){
		$data['user'] = $this->Model_admin->userbyId($id);
		$this->load->view('Admin/View_suntinguser', $data);
	}

	function simpansuntinguser($id){
		if ($this->input->post('username') != $this->input->post('cek') && $this->Model_admin->cekusername($this->input->post('username'))){
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}elseif($this->input->post('pass2') != $this->input->post('pass3')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulang lagi');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('pass');
			$data['nama'] = $this->input->post('nama');
			$data['level'] = $this->input->post('level');
			$this->Model_admin->simpansuntinguser($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('admin');
		}
	}

	//Kategori
	function kategori(){
		$data['kategori'] = $this->Model_admin->getkategori();
		$this->load->view('Admin/View_kategori', $data);
	}

	function tambahkategori(){
		$this->load->view('Admin/View_tambahkategori');
	}

	function simpankategori(){
		if ($this->Model_admin->cekkategori($this->input->post('nama'))){
			$this->session->set_flashdata('message', 'Kategori sudah ada');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['nama'] = $this->input->post('nama');
			$this->Model_admin->simpankategori($data);
			$this->session->set_flashdata('message', '<span class="text-success">Kategori berhasil ditambahkan</span>');
			redirect('admin/kategori');
		}
	}

	function hapuskategori($id){
		$this->Model_admin->hapuskategori($id);
		$this->session->set_flashdata('message', '<span class="text-success">Kategori berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function suntingkategori($id){
		$data['kategori'] = $this->Model_admin->kategoribyId($id);
		$this->load->view('Admin/View_suntingkategori', $data);
	}

	function simpansuntingkategori($id){
		if ($this->input->post('nama') != $this->input->post('cek') && $this->Model_admin->cekkategori($this->input->post('nama'))){
			$this->session->set_flashdata('message', 'Kategori sudah ada');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['nama'] = $this->input->post('nama');
			$this->Model_admin->simpansuntingkategori($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('admin/kategori');
		}
	}

	//Modul Pelatihan
	function tampilmodul(){
		$data['modul'] = $this->Model_admin->getmodul();
		$this->load->view('Admin/View_tampilmodul', $data);
	}

	function aksimodul($status, $id){
		if ($status == "acc") {
			$data['status'] = 1;
			$this->session->set_flashdata('messagep', '<span class="text-success">Pelatihan di acc</span>');
		}else{
			$data['status'] = -1;
			$this->session->set_flashdata('messagep', '<span class="text-danger">Pelatihan di tolak</span>');
		}
		$this->Model_admin->aksimodul($data, $id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function hapusmodul($id){
		$this->Model_admin->hapusmodul($id);
		$this->session->set_flashdata('message', '<span class="text-success">Pelatihan berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	//Forum
	function forum(){
		$data['forum'] = $this->Model_admin->getforum();
		$this->load->view('Admin/View_forum', $data);
	}

	function aksiforum($status, $id){
		if ($status == "acc") {
			$data['status'] = 1;
			$this->session->set_flashdata('messagep', '<span class="text-success">Forum di acc</span>');
		}else{
			$data['status'] = -1;
			$this->session->set_flashdata('messagep', '<span class="text-danger">Forum di tolak</span>');
		}
		$this->Model_admin->aksiforum($data, $id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function hapusforum($id){
		$this->Model_admin->hapusforum($id);
		$this->session->set_flashdata('message', '<span class="text-success">Forum berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	//Rapat
	function tampilrapat(){
		$data['rapat'] = $this->Model_admin->getrapat();
		$this->load->view('Admin/View_tampilrapat', $data);
	}

	function katadasar(){
		$data['katadasar'] = $this->Model_admin->getkatadasar();
		$this->load->view('Admin/View_katadasar', $data);
	}

	function hapuskatadasar($id){
		$this->Model_admin->hapuskatadasar($id);
		$this->session->set_flashdata('message', '<span class="text-success">Data berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function tambahkatadasar(){
		$this->load->view('Admin/View_tambahkatadasar');
	}

	function simpankatadasar(){
		if ($this->Model_admin->cekkatadasar($this->input->post('term'), $this->input->post('stem'))) {
			$this->session->set_flashdata('message', '<span class="text-danger">Kata dasar sudah ada</span>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['term'] = $this->input->post('term');
			$data['stem'] = $this->input->post('stem');
			$this->Model_admin->simpankatadasar($data);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('admin/katadasar');
		}
	}

	function suntingkatadasar($id){
		$data['katadasar'] = $this->Model_admin->katadasarbyId($id);
		$this->load->view('Admin/View_suntingkatadasar', $data);
	}

	function simpansuntingkatadasar($id){
		if ($this->input->post('term') != $this->input->post('cek') && $this->Model_admin->cekkatadasar($this->input->post('term'), $this->input->post('stem'))){
			$this->session->set_flashdata('message', '<span class="text-danger">Kata dasar sudah ada</span>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['term'] = $this->input->post('term');
			$data['stem'] = $this->input->post('stem');
			$this->Model_admin->simpansuntingkatadasar($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('admin/katadasar');
		}
	}

	function stopword(){
		$data['stopword'] = $this->Model_admin->getstopword();
		$this->load->view('Admin/View_stopword', $data);
	}

	function hapusstopword($id){
		$this->Model_admin->hapusstopword($id);
		$this->session->set_flashdata('message', '<span class="text-success">Data berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function tambahstopword(){
		$this->load->view('Admin/View_tambahstopword');
	}

	function simpanstopword(){
		if ($this->Model_admin->cekstopword($this->input->post('kata'))) {
			$this->session->set_flashdata('message', '<span class="text-danger"><i>Stopword</i> sudah ada</span>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['kata'] = $this->input->post('kata');
			$this->Model_admin->simpanstopword($data);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('admin/stopword');
		}
	}

	function suntingstopword($id){
		$data['stopword'] = $this->Model_admin->stopwordbyId($id);
		$this->load->view('Admin/View_suntingstopword', $data);
	}

	function simpansuntingstopword($id){
		if ($this->input->post('kata') != $this->input->post('cek') && $this->Model_admin->cekstopword($this->input->post('kata'))){
			$this->session->set_flashdata('message', '<span class="text-danger"><i>Stopword</i> sudah ada</span>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['kata'] = $this->input->post('kata');
			$this->Model_admin->simpansuntingstopword($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Data berhasil disimpan</span>');
			redirect('admin/stopword');
		}
	}

	function matapelajaran(){
		$data['matapelajaran'] = $this->Model_kurikulum->getmatapelajaran();
		$this->load->view('Admin/View_matapelajaran', $data);
	}

	function materi($id){
		$data['matapelajaran'] = $this->Model_guru->matapelajaranbyId($id);
		$data['materi'] = $this->Model_guru->getmateri($id);
		$this->load->view('Admin/View_materi', $data);
	}

	function hitungbobot(){
		$this->load->view('Admin/View_hitungbobot');
	}

	function hitungpelatihan(){
		$this->Model_admin->hapusbobot();
		$pelatihan = $this->Model_admin->getmodulhitung();
		foreach ($pelatihan->result() as $datpelatihan) {
			$tipe = 'pelatihan';
			$id_desc = $datpelatihan->id;
			$desc = $datpelatihan->deskripsi;

			$desc = str_replace("'", " ", $desc);
			$desc = str_replace("-", " ", $desc);
			$desc = str_replace(")", " ", $desc);
			$desc = str_replace("(", " ", $desc);
			$desc = str_replace("\"", " ", $desc);
			$desc = str_replace("/", " ", $desc);
			$desc = str_replace("=", " ", $desc);
			$desc = str_replace(".", " ", $desc);
			$desc = str_replace(",", " ", $desc);
			$desc = str_replace(":", " ", $desc);
			$desc = str_replace(";", " ", $desc);
			$desc = str_replace("!", " ", $desc);
			$desc = str_replace("?", " ", $desc);

			$desc = strtolower(trim($desc));

			$stopword = $this->Model_admin->getstopword();
			foreach ($stopword as $datstop) {
				$desc = str_replace($datstop->kata, "", $desc);
			}

			$stem = $this->Model_admin->getkatadasar();

			foreach ($stem as $datstem) {
				$desc = str_replace($datstem->term, $datstem->stem, $desc);
			}

			$desc1 = strtolower(trim($desc));

			$desc2 = explode(" ", trim($desc1));

			foreach ($desc2 as $datdesc2) {
				if ($datdesc2 != "") {
					$jumlah = $this->Model_admin->hitungkata($datdesc2, $id_desc);
					if ($jumlah->num_rows() > 0) {
						$row = $jumlah->row();
						$total = $row->jumlah;
						$total++;

						$this->Model_admin->tambahjumlahkata($datdesc2, $id_desc, $total);
					}else{
						$data['tipe'] = $tipe;
						$data['term'] = trim($datdesc2);
						$data['id_desc'] = $id_desc;
						$data['jumlah'] = 1;
						$this->Model_admin->simpankebobot($data);
					}
				}
			}
		}

		$jumlahpelatihan = $pelatihan->num_rows();
		$getbobot = $this->Model_admin->getbobot();
		foreach ($getbobot->result() as $datbobot) {
			$term = $datbobot->term;
			$tf = $datbobot->jumlah;
			$id = $datbobot->id;

			$resNterm = $this->Model_admin->Nterm($term);
			$Nterm = $resNterm->N;

			$bobot = $tf * log($jumlahpelatihan/$Nterm);
			$this->Model_admin->simpanbobot($bobot, $id);
		}

		$data['pelatihan'] = $this->Model_admin->getviewbobot('pelatihan');
		$this->load->view('Admin/View_hitungpelatihan', $data);
	}

	function hitungmateri(){
		$this->Model_admin->hapusbobot();
		$materi = $this->Model_admin->getmaterihitung();
		foreach ($materi->result() as $datmateri) {
			$tipe = 'materi';
			$id_desc = $datmateri->id;
			$desc = $datmateri->uraian_singkat;

			$desc = str_replace("'", " ", $desc);
			$desc = str_replace("-", " ", $desc);
			$desc = str_replace(")", " ", $desc);
			$desc = str_replace("(", " ", $desc);
			$desc = str_replace("\"", " ", $desc);
			$desc = str_replace("/", " ", $desc);
			$desc = str_replace("=", " ", $desc);
			$desc = str_replace(".", " ", $desc);
			$desc = str_replace(",", " ", $desc);
			$desc = str_replace(":", " ", $desc);
			$desc = str_replace(";", " ", $desc);
			$desc = str_replace("!", " ", $desc);
			$desc = str_replace("?", " ", $desc);

			$desc = strtolower(trim($desc));

			$stopword = $this->Model_admin->getstopword();
			foreach ($stopword as $datstop) {
				$desc = str_replace($datstop->kata, "", $desc);
			}

			$stem = $this->Model_admin->getkatadasar();

			foreach ($stem as $datstem) {
				$desc = str_replace($datstem->term, $datstem->stem, $desc);
			}

			$desc1 = strtolower(trim($desc));

			$desc2 = explode(" ", trim($desc1));

			foreach ($desc2 as $datdesc2) {
				if ($datdesc2 != "") {
					$jumlah = $this->Model_admin->hitungkata($datdesc2, $id_desc);
					if ($jumlah->num_rows() > 0) {
						$row = $jumlah->row();
						$total = $row->jumlah;
						$total++;

						$this->Model_admin->tambahjumlahkata($datdesc2, $id_desc, $total);
					}else{
						$data['tipe'] = $tipe;
						$data['term'] = trim($datdesc2);
						$data['id_desc'] = $id_desc;
						$data['jumlah'] = 1;
						$this->Model_admin->simpankebobot($data);
					}
				}
			}
		}

		$jumlahmateri = $materi->num_rows();
		$getbobot = $this->Model_admin->getbobot();
		foreach ($getbobot->result() as $datbobot){
			$term = $datbobot->term;
			$tf = $datbobot->jumlah;
			$id = $datbobot->id;

			$resNterm = $this->Model_admin->Nterm($term);
			$Nterm = $resNterm->N;

			$bobot = $tf * log($jumlahmateri/$Nterm);
			$this->Model_admin->simpanbobot($bobot, $id);
		}

		$data['pelatihan'] = $this->Model_admin->getviewbobot('materi');
		$this->load->view('Admin/View_hitungmateri', $data);
	}
}