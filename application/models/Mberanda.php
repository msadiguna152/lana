<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mberanda extends CI_Model {

	public function get_edit()
	{
		$id = $this->session->userdata('id_pengguna');
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

		if ($password==NULL OR $password=="") {
			$data = array(
				'nama_pengguna'=> $nama_pengguna,
				'username'=> $username,
			);
		} else {
			$data = array(
				'nama_pengguna'=> $nama_pengguna,
				'username'=> $username,
				'password'=> md5($password),
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

		$where = array('id_pengguna' => $this->session->userdata('id_pengguna'));
		$this->db->update('pengguna',$data,$where);
	}

	public function get()
	{
		$filter = explode("-",date("Y-m-d"));
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai','LEFT');
		$this->db->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan');
		if ($this->session->userdata('level') !== 'Operator') {
			$this->db->where('pegawai.id_bidang', $this->session->userdata('id_bidang'));
		};
		$this->db->where('barang_keluar.status_barang_keluar', 'Menunggu');
		$this->db->order_by('id_barang_keluar','DESC');
		return $query = $this->db->get();
	}
}