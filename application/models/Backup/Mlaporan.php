<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MLaporan extends CI_Model {

	public function get()
	{
		$query = $this->db->select('*')->from('barang')
		->join('sumber','sumber.id_sumber=barang.id_sumber')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->order_by('sumber.nama_sumber','ASC')->get();

		return $query;
	}

	public function get_puskesmas()
	{
		$query = $this->db->select('*')->from('puskesmas')->order_by('puskesmas.id_puskesmas','ASC')->get();
		return $query;
	}
}