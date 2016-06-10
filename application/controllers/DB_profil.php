<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_profil extends CI_Controller {

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

	public function profil()
	{
		$data =array(
			'avr_score'	=> $this->Crud->GetAVRScore($this->username)
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/profil', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function user($username)
	{
		$data =array(
			'avr_score'	=> $this->Crud->GetAVRScore($username),
			'user'		=> $this->Crud->GetUserDataBy($username)->result()[0],
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/profil', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function edit_profil()
	{
		$data =array(
			'avr_score'	=> $this->Crud->GetAVRScore($this->username)
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/profil-edit', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function save_profil()
	{
		if (!$this->input->post()) show_404();
		$data = array(
			'fname'	=> $this->input->post('fname'),
			'lname'	=> $this->input->post('lname'),
			'nick'	=> $this->input->post('nick'),
			'email'	=> $this->input->post('email'),
			'phone'	=> $this->input->post('phone'),
			'dob'	=> date('Y-m-d', strtotime($this->input->post('dob')))
			);

		$update = $this->Crud->UpdateData('user', $data, 'username', $this->username);

		if ($update) :
			$msg_class = "success";
			$msg_content = "Update profil berhasil!";
		else :
			$msg_class = "danger";
			$msg_content = "Update profil gagal!";
		endif;

		$pesan = "<div class=\"notification\"><div class=\"alert alert-{$msg_class} alert-dismissible no-radius\" role=\"alert\">";
		$pesan .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$pesan .= "{$msg_content}</div></div>";
		$this->session->set_flashdata('action_msg', $pesan);
		redirect(base_url('dashboard/profil/edit-profil'));
	}

	public function edit_password()
	{
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/profil-edit-password');
		$this->load->view('dashboard/layout/footer');	
	}

	public function save_password()
	{
		if (!$this->input->post()) show_404();
		$username = $this->username;
		$password_lama = $this->input->post('password_lama');
		$password_baru = $this->input->post('password_baru');
		$password_baru_ulang = $this->input->post('password_baru_ulang');
		$db = $this->Crud->AuthCheck($this->username);
		$check = password_verify($password_lama, $db->password);

		if ($password_baru != $password_baru_ulang) :
			$msg = (object) array(
				'pesan' => "Password Baru dan Ulangi Password Baru tidak sama!",
				'class' => "danger"
			);
		elseif ($check == false) :
			$msg = (object) array(
				'pesan' => "Password Lama Salah!",
				'class' => "danger"
			);
		else :
			$data = array(
				'password'	=> $this->encrypt($password_baru)
				);
			$update = $this->Crud->UpdateData('auth', $data, 'username', $username);

			if ($update) :
				$msg = (object) array(
					'pesan' => "Berhasil mengubah password!",
					'class' => "success"
				);
			endif;
		endif;

		$this->session->set_flashdata('msg', $msg);
		redirect(base_url('dashboard/profil/edit-password'));
	}

	/* AJAX Request */
	public function check_password()
	{
		if (!$this->input->post()) return;
		$password = $this->input->post('password_lama');
		$db = $this->Crud->AuthCheck($this->username);
		$check = password_verify($password, $db->password);

		if ($check) :
			$pesan = array(
				'class'	=> 'has-success',
				'icon'	=> 'glyphicon-ok'
				);
		else :
			$pesan = array(
				'class'	=> 'has-error',
				'icon'	=> 'glyphicon-remove'
				);
		endif;

		echo json_encode($pesan);
	}

	/* Other Helper */
	private function encrypt($password)
	{
		$options = array(
			'cost'	=> 10,
			'salt'	=> mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			);
		$hash = password_hash($password, PASSWORD_BCRYPT, $options);

		return $hash;
	}
}
