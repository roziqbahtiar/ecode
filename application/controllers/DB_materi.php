<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_materi extends CI_Controller {

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

	public function materi()
	{
		$data = array(
			'data_post'	=> $this->Crud->GetDataMateri()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/materi', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function materi_baru()
	{
		$data = array(
			'kategori'	=> $this->Crud->GetKategori()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/materi-new', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function materi_edit($url_materi)
	{
		$data = array(
			'post'		=> $this->Crud->GetMateriByURL($url_materi)->result()[0],
			'kategori'	=> $this->Crud->GetKategori()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/materi-edit', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function materi_insert()
	{
		if (!$this->input->post()) show_404();
		$post = (object) array(
			'author'	=> $this->username,
			'title'		=> $this->input->post('post_title'),
			'content'	=> $this->input->post('post_content'),
			'category'	=> $this->input->post('post_category'),
			'datetime'	=> date('Y-m-d H:i:s', strtotime($this->input->post('post_date') . ' ' . $this->input->post('post_time'))),
			'status'	=> $this->input->post('post_status'),
			'url'		=> url_title($this->input->post('post_title'), 'dash', true)
			);
		$data = array(
			"author_materi"		=> $post->author,
			"title_materi"		=> $post->title,
			"content_materi"	=> $post->content,
			"datetime_materi"	=> $post->datetime,
			"id_kategori"		=> $post->category,
			"status_materi"		=> $post->status,
			"url_materi"		=> $post->url
			);
		$insert = $this->Crud->InsertData('materi', $data);

		if ($insert) :
			$msg_class = "success";
			$msg_content = "Berhasil membuat materi baru!";
		else :
			$msg_class = "danger";
			$msg_content = "Gagal membuat materi baru!";
		endif;

		$pesan = "<div class=\"col-md-12\"><div class=\"alert alert-{$msg_class} alert-dismissible no-radius\" role=\"alert\">";
		$pesan .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$pesan .= "{$msg_content}</div></div>";
		$this->session->set_flashdata('action_msg', $pesan);
		redirect(base_url('dashboard/materi/baru'));
	}

	public function materi_update()
	{
		if (!$this->input->post()) show_404();
		$post = (object) array(
			'id'		=> $this->input->post('post_id'),
			'title'		=> $this->input->post('post_title'),
			'content'	=> $this->input->post('post_content'),
			'category'	=> $this->input->post('post_category'),
			'datetime'	=> date('Y-m-d H:i:s', strtotime($this->input->post('post_date') . ' ' .$this->input->post('post_time'))),
			'status'	=> $this->input->post('post_status'),
			'url'		=> $this->input->post('post_url')
			);
		$data = array(
			"title_materi"		=> $post->title,
			"content_materi"	=> $post->content,
			"datetime_materi"	=> $post->datetime,
			"id_kategori"		=> $post->category,
			"status_materi"		=> $post->status
			);
		$update = $this->Crud->UpdateData('materi', $data, 'id_materi', $post->id);

		if ($update) :
			$msg_class = "success";
			$msg_content = "Berhasil Update materi!";
		else :
			$msg_class = "danger";
			$msg_content = "Gagal Update materi!";
		endif;

		$pesan = "<div class=\"col-md-12\"><div class=\"alert alert-{$msg_class} alert-dismissible no-radius\" role=\"alert\">";
		$pesan .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$pesan .= "{$msg_content}</div></div>";
		$this->session->set_flashdata('action_msg', $pesan);
		redirect(base_url('dashboard/materi/edit/' . $post->url));
	}

	public function materi_delete()
	{
		if (!$this->input->post()) show_404();
		$id_materi = $this->input->post('id_materi');
		$tables = array('materi', 'soal', 'jawaban');
		$delete = $this->Crud->DeleteData($tables, 'id_materi', $id_materi);
	}
}
