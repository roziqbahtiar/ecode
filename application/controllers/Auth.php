<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function login()
	{
		$this->load->model('Crud');
		$session_set_value = $this->session->all_userdata();

		if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") :
			redirect(base_url('dashboard'));
		else :
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$check = $this->Crud->AuthCheck($user);
			$hash = $check ? $check->password : "";

			if ($check && $this->verify($pass, $hash)) :
				$remember = $this->input->post('remember_me');

				if ($remember)
					$this->session->set_userdata('remember_me', TRUE);
				
				$sess_data = (object) array(
					'username'	=> $user,
					'level'		=> $check->level
					);

				$this->session->set_userdata('logged_in', $sess_data);
				redirect(base_url('dashboard'));
			else :
				redirect(base_url());
			endif;
		endif;
	}

	public function daftar()
	{
		if (!$this->input->post()) show_404();
		$this->load->model('Crud');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('re_password');
		$info = (object) array(
			'username'	=> $this->Crud->ValidUsername($username),
			'password'	=> ($password == $repassword) ? true : false
			);

		if ($info->username && $info->password) :
			$dt_auth = array(
				'username'	=> $username,
				'password'	=> $this->encrypt($password),
				'level'		=> 4
				);
			$in_auth = $this->Crud->InsertData('auth', $dt_auth);
			$dt_user = array(
				'username'	=> $username,
				'nick'		=> $username,
				'regdate'	=> date('Y-m-d')
				);
			$in_user = $this->Crud->InsertData('user', $dt_user);

			if ($in_auth && $in_user) :
				$sess_data = (object) array(
					'username'	=> $username,
					'level'		=> 4
					);

				$this->session->set_userdata('logged_in', $sess_data);
				redirect(base_url('dashboard'));
			else :
				redirect(base_url());
			endif;
		else :
			redirect(base_url());
		endif;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	private function encrypt($password)
	{
		$options = array(
			'cost'	=> 10,
			'salt'	=> mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			);
		$hash = password_hash($password, PASSWORD_BCRYPT, $options);

		return $hash;
	}

	private function verify($password, $hash)
	{
		$result = password_verify($password, $hash);

		return $result;
	}
}
