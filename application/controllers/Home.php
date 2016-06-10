<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('logged_in')) redirect(base_url('dashboard'));
	}

	public function index()
	{
		$this->load->view('homepage/layout/header');
		$this->load->view('homepage/section-parallax');
		$this->load->view('homepage/section-learn');
		$this->load->view('homepage/layout/footer');
	}
}
