<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_home extends CI_Controller {

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

	public function index()
	{
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/home');
		$this->load->view('dashboard/layout/footer');
	}
}
