<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_member extends CI_Controller {

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

	public function member()
	{
		$data = array(
			'users'		=> $this->Crud->GetUsers($this->username)->result(),
			'lv_data'	=> $this->Crud->GetLvData($this->user_lv)->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/member', $data);
		$this->load->view('dashboard/layout/footer');
	}

	/* AJAX Request */
	public function edit_lv()
	{
		if (!$this->input->post()) return;

		$username = $this->input->post('username');
		$new_lv = $this->input->post('new_lv');
		$data = array(
			'level'	=> $new_lv
			);
		$update = $this->Crud->UpdateData('auth', $data, 'username', $username);
		echo $update ? "Berhasil" : "Gagal"; 
	}
}
