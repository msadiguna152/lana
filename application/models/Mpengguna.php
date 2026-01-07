<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengguna extends CI_Model {
	public function insert()
	{
		$config['upload_path'] = 'profil/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 3000;
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto_pengguna');
		$file = $this->upload->data();
		$foto_pengguna = $file['file_name'];

		$nama_pengguna = $this->input->post('nama_pengguna');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$status_pengguna = $this->input->post('status_pengguna');

		$data = array(
			'nama_pengguna'=> $nama_pengguna,
			'username'=> $username,
			'password'=> md5($password),
			'level'=> $level,
			'foto_pengguna'=> $foto_pengguna,
			'status_pengguna'=> $status_pengguna,
		);
		$this->db->insert('pengguna',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('pengguna')->order_by('id_pengguna','DESC')->get();
		return $query;
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from pengguna where id_pengguna='$id'")->row_array();
	}
	public function update()
	{
		$config['upload_path'] = 'profil/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 3000;

		$nama_pengguna = $this->input->post('nama_pengguna');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$status_pengguna = $this->input->post('status_pengguna');

		if ($password==NULL OR $password=="") {
			$data = array(
				'nama_pengguna'=> $nama_pengguna,
				'username'=> $username,
				'level'=> $level,
				'status_pengguna'=> $status_pengguna,
			);
		} else {
			$data = array(
				'nama_pengguna'=> $nama_pengguna,
				'username'=> $username,
				'password'=> md5($password),
				'level'=> $level,
				'status_pengguna'=> $status_pengguna,

			);
		}
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_pengguna')) {
			echo "";
		} else {
			$result = $this->upload->data();
			$foto_pengguna = $result['file_name'];
			$data['foto_pengguna'] = $foto_pengguna;
		};

		$where = array('id_pengguna' => $this->input->post('id_pengguna'));
		$this->db->update('pengguna',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_pengguna' => $id);
		$query = $this->db->delete('pengguna',$where);
		return $query;
	}
}