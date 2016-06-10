<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_latihan extends CI_Controller {

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

	public function latihan()
	{
		$data = array(
			'data_post'	=> $this->Crud->GetMateriHaveSoal()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/latihan', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function latihan_baru()
	{
		$data = array(
			'kategori'	=> $this->Crud->GetKategori()->result()
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/latihan-new', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function latihan_view($url_materi)
	{
		$post = $this->Crud->GetMateriByURL($url_materi)->result()[0];
		$soal = $this->Crud->GetSoal($post->id_materi);
		$data = array(
			'post'	=> $post,
			'soal'	=> $soal
			);
		$this->load->view('dashboard/layout/header', $this->default);
		$this->load->view('dashboard/content/latihan-view', $data);
		$this->load->view('dashboard/layout/footer');
	}

	/* AJAX Request Start */
	public function ajax_materi()
	{
		if (!$this->input->post()) return;

		if ($this->input->post('rule') == 'materi') :
			$id_kategori = $this->input->post('id_kategori');
			$data = $this->Crud->GetAjaxMateri($id_kategori)->result();
			echo "\n<option value=\"0\">- Select Materi -</option>\n";
			foreach ($data as $item) :
				echo "<option value=\"{$item->id_materi}\">{$item->title}</option>\n";
			endforeach;
		elseif ($this->input->post('rule') == 'num_soal') :
			$id_materi = $this->input->post('id_materi');
			$data = $this->Crud->GetRowSoal($id_materi);
			echo "Q : {$data}";
		endif;
	}

	public function ajax_insert_latihan()
	{
		if (!$this->input->post()) return;

		$data = array(
			'id_materi' => $this->input->post('id_materi'),
			'soal'		=> $this->input->post('soal')
			);
		$insert_id = $this->Crud->InsertGetID('soal', $data);
		$data = array(
			'info'		=> $insert_id ? "success" : "error",
			'num_soal'	=> $this->Crud->GetRowSoal($this->input->post('id_materi')),
			'id_soal'	=> $insert_id
			);
		echo json_encode($data);
	}

	public function ajax_insert_jawaban()
	{
		if (!$this->input->post()) return;

		$batch = json_decode($this->input->post('jawaban'));
		$id_soal = $this->input->post('id_soal');
		$insert = $this->Crud->InsertDataBatch('jawaban', $batch);
		$data = array(
			'info'		=> $insert ? "success" : "error",
			'jawaban'	=> $this->Crud->GetJawaban($id_soal)->result()
			);
		echo json_encode($data);
	}

	public function ajax_insert_jawaban_soal()
	{
		if (!$this->input->post()) return;

		$data = array(
			'id_jawaban'	=> $this->input->post('jawaban')
			);
		$id_soal = $this->input->post('id_soal');
		$update = $this->Crud->UpdateData('soal', $data, 'id_soal', $id_soal);

		if ($update) :
			$class = 'success';
			$msg = 'Berhasil menambahkan soal baru dan jawabannya!';
		else :
			$class = 'danger';
			$msg = 'Gagal menambahkan soal baru dan jawabannya!';
		endif;

		$pesan = "<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\"><div class=\"alert alert-{$class} alert-dismissible no-radius\" role=\"alert\">";
		$pesan .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$pesan .= "{$msg}</div></div>";
		echo $pesan;
	}

	public function latihan_delete()
	{
		if (!$this->input->post()) show_404();
		$id_materi = $this->input->post('id_materi');
		$tables = array('soal', 'jawaban', 'nilai');
		$delete = $this->Crud->DeleteData($tables, 'id_materi', $id_materi);
	}
	/* AJAX Request End */
}
