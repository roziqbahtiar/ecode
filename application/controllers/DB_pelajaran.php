<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_pelajaran extends CI_Controller {

	private $user_lv, $username, $default;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Crud');
		$session = $this->session->userdata('logged_in');
		if ($session == null) redirect(base_url());
		$this->user_lv = $session->level;
		$this->username = $session->username;
		$this->default = array(
			'user_lv'	=> $this->user_lv,
			'username'	=> $this->username,
			'user'		=> $this->Crud->GetUserDataBy($this->username)->result()[0],
			'menu'		=> $this->Crud->GetMenuLv($this->user_lv)->result()
			);
	}

	public function pelajaran($url_kategori)
	{
		$data = array(
			'username'	=> $this->username,
			'cat'		=> $this->Crud->GetKategoriByURL($url_kategori)->result()[0],
			'posts'		=> $this->Crud->GetMateriByCat($url_kategori, $this->username)->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/pelajaran', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function lihat_p($url_materi)
	{
		$post = $this->Crud->GetMateriByURL($url_materi)->result()[0];
		$data = array(
			'post'	=> $post,
			'score'	=> $this->Crud->GetScoreUser($this->username, $post->id_materi)->result(),
			'soal'	=> $this->Crud->GetSoal($post->id_materi)
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/pelajaran-view', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function lihat_s($url_materi)
	{
		$post = $this->Crud->GetMateriByURL($url_materi)->result()[0];
		$soal = $this->Crud->GetSoal($post->id_materi);
		if ($this->Crud->GetScoreUser($this->username, $post->id_materi)->result() || $soal == null) redirect(base_url('dashboard/pelajaran/' . $post->url_kategori));
		$data = array(
			'post'	=> $post,
			'soal'	=> $soal
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/pelajaran-soal', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function hasil_jawaban()
	{
		$kunci = $this->Crud->KunciJawaban($this->input->post('id_materi'));
		$materi = $this->input->post('nama_materi');
		$jawaban = $this->input->post('jawaban');
		$url = $this->input->post('url_kategori');
		$score_soal = round((100/count($kunci)), 2);
		$nilai = 0;

		foreach ($jawaban as $soal => $jawaban) :
			$nilai = ($kunci[$soal] == $jawaban) ? $nilai += $score_soal : $nilai;
		endforeach;

		$data = array(
			'id_materi'	=> $this->input->post('id_materi'),
			'username'	=> $this->username,
			'score'		=> round($nilai)
			);

		$insert = $this->Crud->InsertData('nilai', $data);

		if ($insert) :
			$msg_content = "Anda mendapat nilai {$data['score']} pada pelajaran {$materi}.";
			$msg_class = "success";
		else :
			$msg_content = "Gagal menyimpan nilai. Nilai anda {$data['score']} pada materi '{$materi}'.";
			$msg_class = "danger";
		endif;

		$pesan = "<div class=\"col-md-12\"><div class=\"alert alert-{$msg_class} alert-dismissible no-radius\" role=\"alert\">";
		$pesan .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$pesan .= "{$msg_content}</div></div>";
		$this->session->set_flashdata('action_msg', $pesan);
		redirect(base_url('dashboard/pelajaran/' . $url));
	}
}
