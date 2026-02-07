<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpegawai extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_pegawai'=> $this->input->post('nama_pegawai'),
			'jenis_register'=> $this->input->post('jenis_register'),
			'nip_no_reg'=> $this->input->post('nip_no_reg'),
			'id_pangkat'=> $this->input->post('id_pangkat'),
			'id_jabatan'=> $this->input->post('id_jabatan'),
			'id_bidang'=> $this->input->post('id_bidang'),
			'status_pegawai'=> $this->input->post('status_pegawai'),
		);
		$this->db->insert('pegawai',$data);
	}
	public function get()
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('pangkat','pangkat.id_pangkat=pegawai.id_pangkat','LEFT');
		$this->db->join('bidang','bidang.id_bidang=pegawai.id_bidang','LEFT');
		$this->db->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan');
		if ($this->session->userdata('level') !== 'Operator') {
			$this->db->where('pegawai.id_pegawai', $this->session->userdata('id_pegawai'));
		}
		$this->db->order_by('pegawai.id_pegawai','DESC');
		
		return $query = $this->db->get();
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from pegawai where id_pegawai='$id'")->row_array();
	}

	public function get_jabatan($id)
	{
		return $this->db->select('id_jabatan,nama_jabatan')->from('jabatan')->where('id_bidang',$id)->order_by('nama_jabatan','ASC')->get();
	}

	public function update()
	{
		$data = array(
			'nama_pegawai'=> $this->input->post('nama_pegawai'),
			'jenis_register'=> $this->input->post('jenis_register'),
			'nip_no_reg'=> $this->input->post('nip_no_reg'),
			'id_pangkat'=> $this->input->post('id_pangkat'),
			'id_jabatan'=> $this->input->post('id_jabatan'),
			'id_bidang'=> $this->input->post('id_bidang'),
			'status_pegawai'=> $this->input->post('status_pegawai'),
		);
		$where = array('id_pegawai' => $this->input->post('id_pegawai'));
		$this->db->update('pegawai',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_pegawai' => $id);
		$query = $this->db->delete('pegawai',$where);
		return $query;
	}
}