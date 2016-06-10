<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_kategori extends CI_Controller {

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

	public function kategori()
	{
		$data = array(
			'data_kategori'	=> $this->Crud->GetKategori()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/kategori', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function kategori_baru()
	{
		$data = array(
			'kategori'	=> $this->Crud->GetKategori()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/kategori-new');
		$this->load->view('dashboard/layout/footer');
	}

	public function kategori_simpan()
	{
		if (!$this->input->post()) show_404();
		$data = array(
			'nama_kategori'	=> $this->input->post('kategori'),
			'url_kategori'	=> url_title($this->input->post('kategori'), 'dash', true)
			);
		$simpan = $this->Crud->InsertData('kategori', $data);
		$child = array(
			'id_parent'	=> 7,
			'name'		=> $data['nama_kategori'],
			'url'		=> 'dashboard/pelajaran/' . $data['url_kategori'],
			'icon'		=> 'tag',
			'order'		=> 0
			);
		$simpan_child = $this->Crud->InsertData('child_menu', $child);

		if ($simpan && $simpan_child) :
			$msg_class = "success";
			$msg_content = "Berhasil membuat kategori baru!";
		else :
			$msg_class = "danger";
			$msg_content = "Gagal membuat kategori baru!";
		endif;

		$pesan = "<div class=\"col-md-12\"><div class=\"alert alert-{$msg_class} alert-dismissible no-radius\" role=\"alert\">";
		$pesan .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$pesan .= "{$msg_content}</div></div>";
		$this->session->set_flashdata('action_msg', $pesan);
		redirect(base_url('dashboard/kategori/baru'));
	}

	public function kategori_view($url_kategori)
	{
		
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/kategori-view');
		$this->load->view('dashboard/layout/footer');
	}

	public function kategori_delete()
	{
		if (!$this->input->post()) show_404();
		$id_kategori = $this->input->post('id_kategori');
		$kategori = $this->Crud->GetKategoriByID($id_kategori)->result()[0];
		$delete = $this->Crud->DeleteData('kategori', 'id_kategori', $id_kategori);
		$delete_child = $this->Crud->DeleteData('child_menu', 'name', $kategori->nama_kategori);
	}
	
}
