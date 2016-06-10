<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model
{
	public function AuthCheck($username)
	{
		$this->db->where('username', $username);
		$result = $this->db->get('auth')->result_object()[0];

		return $result;
	}

	public function ValidUsername($username)
	{
		$this->db->where('username', $username);
		$this->db->from('auth');
		$result = $this->db->count_all_results();

		return ($result >= 1) ? false : true;
	}

	public function InsertData($table, $data)
	{
		$insert = $this->db->insert($table, $data);

		return $insert;
	}

	public function InsertDataBatch($table, $data)
	{
		$insert = $this->db->insert_batch($table, $data);

		return $insert;
	}

	public function InsertGetID($table, $data)
	{
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	public function UpdateData($table, $data, $where, $value)
	{
		$this->db->where($where, $value);
		$update = $this->db->update($table, $data);

		return $update;
	}

	public function DeleteData($table, $where, $value)
	{
		$this->db->where($where, $value);
		$result = $this->db->delete($table);

		return $result;
	}

	public function GetUsers($username)
	{
		$this->db->select('user.username, user.email, user.regdate, user_lv.lv_nama, auth.level');
		$this->db->from('user');
		$this->db->join('auth', 'auth.username = user.username');
		$this->db->join('user_lv', 'user_lv.level = auth.level');
		$this->db->where('user.username !=', $username);
		$this->db->order_by('user.regdate', 'DESC');
		$result = $this->db->get();

		return $result;
	}

	public function GetUserDataBy($username)
	{
		$this->db->where('username', $username);
		$result = $this->db->get('user');

		return $result;
	}

	public function GetLvData($level)
	{
		$this->db->where('level >=', $level);
		$this->db->order_by('lv_nama', 'ASC');
		$result = $this->db->get('user_lv');

		return $result;
	}

	public function GetDataMateri()
	{
		$this->db->select('materi.id_materi, materi.author_materi as author, materi.title_materi as title, materi.content_materi as content, materi.datetime_materi as datetime, materi.id_kategori as id_kategori, kategori.nama_kategori as kategori, materi.status_materi as status, materi.url_materi as url');
		$this->db->from('materi');
		$this->db->join('kategori', 'kategori.id_kategori = materi.id_kategori');
		$this->db->order_by('datetime_materi', 'DESC');
		$result = $this->db->get();

		return $result;
	}

	public function GetMateriByURL($url)
	{
		$this->db->select('materi.id_materi, materi.author_materi as author, materi.title_materi as title, materi.content_materi as content, materi.datetime_materi as datetime, materi.id_kategori as id_kategori, kategori.nama_kategori as kategori, materi.status_materi as status, materi.url_materi as url, kategori.url_kategori');
		$this->db->from('materi');
		$this->db->join('kategori', 'kategori.id_kategori = materi.id_kategori');
		$this->db->where('materi.url_materi', $url);
		$result = $this->db->get();

		return $result;
	}

	public function GetMateriByCat($cat, $username)
	{
		$this->db->select('materi.id_materi, materi.title_materi as title, materi.url_materi as url');
		$this->db->from('materi');
		$this->db->join('kategori', 'kategori.id_kategori = materi.id_kategori');
		$this->db->where('kategori.url_kategori', $cat);
		$this->db->where('materi.status_materi', 'publish');
		$result = $this->db->get();

		return $result;
	}

	public function GetAjaxMateri($id_kategori)
	{
		$this->db->select('materi.id_materi, materi.title_materi as title');
		$this->db->from('materi');
		$this->db->join('kategori', 'kategori.id_kategori = materi.id_kategori');
		$this->db->order_by('materi.datetime_materi', 'DESC');
		$this->db->where('materi.id_kategori', $id_kategori);
		$result = $this->db->get();

		return $result;
	}

	public function GetKategori()
	{
		$this->db->select('id_kategori as id, nama_kategori as nama');
		$result = $this->db->get('kategori');

		return $result;
	}

	public function GetKategoriByURL($url)
	{
		$this->db->where('url_kategori', $url);
		$result = $this->db->get('kategori');

		return $result;
	}

	public function GetKategoriByID($id)
	{
		$this->db->where('id_kategori', $id);
		$result = $this->db->get('kategori');

		return $result;
	}

	public function GetRowSoal($id_materi)
	{
		$this->db->where('id_materi', $id_materi);
		$result = $this->db->count_all_results('soal');

		return $result;
	}

	public function GetJawaban($id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		$result = $this->db->get('jawaban');

		return $result;
	}

	public function GetMenuLv($lv_id)
	{
		$this->db->like('level', $lv_id);
		$this->db->order_by('order', 'ASC');
		$result = $this->db->get('menu');

		return $result;
	}

	public function GetChildMenu($id_parent)
	{
		$this->db->where('id_parent', $id_parent);
		$this->db->order_by('order', 'ASC');
		$this->db->order_by('name', 'ASC');
		$result = $this->db->get('child_menu');

		return $result;
	}

	public function GetMateriHaveSoal()
	{
		$this->db->select('materi.id_materi, materi.author_materi as author, materi.title_materi as title, materi.id_kategori as id_kategori, kategori.nama_kategori as kategori, materi.datetime_materi as datetime, materi.url_materi as url, count(soal.id_soal) as num_soal');
		$this->db->from('materi');
		$this->db->join('kategori', 'kategori.id_kategori = materi.id_kategori');
		$this->db->join('soal', 'soal.id_materi = materi.id_materi');
		$this->db->group_by('soal.id_materi');
		$this->db->order_by('materi.datetime_materi', 'DESC');
		$result = $this->db->get();

		return $result;
	}

	public function GetSoalRandom($id_materi)
	{
		$this->db->where('id_materi', $id_materi);
		$this->db->order_by('id_soal', 'RANDOM');
		$result = $this->db->get('soal');

		return $result;
	}

	public function GetJawabanRandom($id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		$this->db->order_by('id_jawaban', 'RANDOM');
		$result = $this->db->get('jawaban');

		return $result;
	}

	public function GetSoal($id_materi)
	{
		$soal = $this->GetSoalRandom($id_materi)->result();
		$num = 0;

		if ($soal) :
			foreach ($soal as $item) :
				$data[$num] = array(
					'soal'		=> $item,
					'pilihan'	=> $this->GetJawabanRandom($item->id_soal)->result()
					);
				$num++;
			endforeach;
		else :
			$data = null;
		endif;

		return $data;
	}

	public function KunciJawaban($id_materi)
	{
		$data = $this->GetSoalRandom($id_materi)->result();

		foreach ($data as $key) :
			$kunci[$key->id_soal] = $key->id_jawaban;
		endforeach;

		return $kunci;
	}

	public function GetScoreUser($username, $id_materi)
	{
		$this->db->where('username', $username);
		$this->db->where('id_materi', $id_materi);
		$result = $this->db->get('nilai');

		return $result;
	}

	public function GetAllScore($username)
	{
		$this->db->select('count(*) as jumlah, sum(score) as score');
		$this->db->where('username', $username);
		$result = $this->db->get('nilai');

		return $result;
	}

	public function GetAVRScore($username)
	{
		$data = $this->GetAllScore($username)->result()[0];

		if ($data->jumlah == 0) :
			return 0;
		else :
			$result = $data->score / $data->jumlah;
			return round($result);
		endif;
	}
}
