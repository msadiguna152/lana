<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbarang extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_barang'=> $this->input->post('nama_barang'),
			'id_sumber'=> $this->input->post('id_sumber'),
			'id_satuan'=> $this->input->post('id_satuan'),
			'stok_barang'=> $this->input->post('stok_barang'),
			'harga_barang'=> $this->input->post('harga_barang'),
			'klasifikasi'=> $this->input->post('klasifikasi'),
		);
		$this->db->insert('barang',$data);
	}
	public function get($id_sumber)
	{
		if ($id_sumber==NULL OR $id_sumber=="Semua") {
			$query = $this->db->select('*')->from('barang')
			->join('sumber','sumber.id_sumber=barang.id_sumber','LEFT')
			->join('satuan','satuan.id_satuan=barang.id_satuan')
			->order_by('sumber.nama_sumber','ASC')->get();
		} else {
			$query = $this->db->select('*')->from('barang')
			->join('sumber','sumber.id_sumber=barang.id_sumber','LEFT')
			->join('satuan','satuan.id_satuan=barang.id_satuan')
			->where('barang.id_sumber',$id_sumber)
			->order_by('nama_barang','ASC')->get();
		};
		return $query;
	}

	public function get_sumber()
	{
		$query = $this->db->select('*')->from('sumber')->order_by('id_sumber','DESC')->get();
		return $query;
	}

	public function get_jenis()
	{
		$query = $this->db->select('*')->from('jenis')->order_by('id_jenis','DESC')->get();
		return $query;
	}

	public function get_satuan()
	{
		$query = $this->db->select('*')->from('satuan')->order_by('id_satuan','DESC')->get();
		return $query;
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from barang where id_barang='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_barang'=> $this->input->post('nama_barang'),
			'id_sumber'=> $this->input->post('id_sumber'),
			'id_satuan'=> $this->input->post('id_satuan'),
			'stok_barang'=> $this->input->post('stok_barang'),
			'ed_barang'=> $this->input->post('ed_barang'),
			'harga_barang'=> $this->input->post('harga_barang'),
			'klasifikasi'=> $this->input->post('klasifikasi'),
		);
		$where = array('id_barang' => $this->input->post('id_barang'));
		$this->db->update('barang',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_barang' => $id);
		$query = $this->db->delete('barang',$where);
		return $query;
	}
}