<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpuskesmas extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_puskesmas'=> $this->input->post('nama_puskesmas'),
			'alamat_puskesmas'=> $this->input->post('alamat_puskesmas'),
			'jumlah_pustu'=> $this->input->post('jumlah_pustu'),
			'jumlah_bidan_desa'=> $this->input->post('jumlah_bidan_desa'),
			'nama_ttd_puskesmas'=> $this->input->post('nama_ttd_puskesmas'),
			'nip_ttd_puskesmas'=> $this->input->post('nip_ttd_puskesmas'),
		);
		$this->db->insert('puskesmas',$data);

		$id_puskesmas = $this->db->insert_id();

		$id_barang = count($this->input->post('id_barang'));
		for ($i = 0; $i < $id_barang; $i++) {
			$datas[$i] = array(
				'id_puskesmas' => $id_puskesmas,
				'id_barang' => $this->input->post('id_barang['.$i.']'),
				'stok_puskesmas' => $this->input->post('stok_puskesmas['.$i.']'),
				'ed_barang_puskesmas' => $this->input->post('ed_barang_puskesmas['.$i.']'),
			);

			$this->db->insert('stok_puskesmas', $datas[$i]);
		}
	}
	public function get()
	{
		$query = $this->db->select('*')->from('puskesmas')->order_by('id_puskesmas','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from puskesmas where id_puskesmas='$id'")->row_array();
	}

	public function get_rincian_barang($id,$id2)
	{
		if ($id2==NULL OR $id2=="Semua") {
			$query = $this->db->select('*')->from('stok_puskesmas')
			->join('barang','barang.id_barang=stok_puskesmas.id_barang')
			->join('satuan','satuan.id_satuan=barang.id_satuan')
			->join('sumber','sumber.id_sumber=barang.id_sumber')
			->where('stok_puskesmas.id_puskesmas',$id)
			->order_by('stok_puskesmas.id_barang','DESC')->get();
		} else {
			$query = $this->db->select('*')->from('stok_puskesmas')
			->join('barang','barang.id_barang=stok_puskesmas.id_barang')
			->join('satuan','satuan.id_satuan=barang.id_satuan')
			->join('sumber','sumber.id_sumber=barang.id_sumber')
			->where('stok_puskesmas.id_puskesmas',$id)
			->where('sumber.id_sumber',$id2)
			->order_by('stok_puskesmas.id_barang','DESC')->get();
		}
		return $query;
	}

	public function get_barang()
	{
		$query = $this->db->select('*')->from('barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->join('sumber','sumber.id_sumber=barang.id_sumber')
		->order_by('id_barang','DESC')->get();
		return $query;
	}

	public function get_sumber()
	{
		$query = $this->db->select('*')->from('sumber')->order_by('id_sumber','DESC')->get();
		return $query;
	}

	public function update()
	{
		$data = array(
			'nama_puskesmas'=> $this->input->post('nama_puskesmas'),
			'alamat_puskesmas'=> $this->input->post('alamat_puskesmas'),
			'jumlah_pustu'=> $this->input->post('jumlah_pustu'),
			'jumlah_bidan_desa'=> $this->input->post('jumlah_bidan_desa'),
			'nama_ttd_puskesmas'=> $this->input->post('nama_ttd_puskesmas'),
			'nip_ttd_puskesmas'=> $this->input->post('nip_ttd_puskesmas'),
		);
		$where = array('id_puskesmas' => $this->input->post('id_puskesmas'));
		$this->db->update('puskesmas',$data,$where);

		$id_barang = count($this->input->post('id_barang'));
		for ($i = 0; $i < $id_barang; $i++) {
			$datas[$i] = array(
				'id_puskesmas' => $this->input->post('id_puskesmas'),
				'id_barang' => $this->input->post('id_barang['.$i.']'),
				'stok_puskesmas' => $this->input->post('stok_puskesmas['.$i.']'),
				'ed_barang_puskesmas' => $this->input->post('ed_barang_puskesmas['.$i.']'),
			);

			$this->db->insert('stok_puskesmas', $datas[$i]);
		}
	}

	public function delete($id)
	{
		$where = array('id_puskesmas' => $id);
		$query = $this->db->delete('puskesmas',$where);
		return $query;
	}
}