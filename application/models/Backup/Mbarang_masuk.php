<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbarang_masuk extends CI_Model {

	public function get($dari_tanggal,$sampai_tanggal)
	{
		if ($dari_tanggal!=NULL AND $sampai_tanggal!=NULL) {
			$query = $this->db->select('*,')->from('barang_masuk')
			->join('asal','asal.id_asal=barang_masuk.id_asal', 'LEFT')
			->join('sumber','sumber.id_sumber=barang_masuk.id_sumber')
			->where('tanggal_barang_masuk>=',$dari_tanggal)
			->where('tanggal_barang_masuk<=',$sampai_tanggal)
			->order_by('id_barang_masuk','DESC')->get();
		} else {
			$filter = explode("-",date("Y-m-d"));
			$query = $this->db->select('*')->from('barang_masuk')
			->join('asal','asal.id_asal=barang_masuk.id_asal')
			->join('sumber','sumber.id_sumber=barang_masuk.id_sumber', 'LEFT')
			->where('MONTH(tanggal_barang_masuk)',$filter['1'])
			->where('YEAR(tanggal_barang_masuk)',$filter['0'])
			->order_by('id_barang_masuk','DESC')->get();
		}
		
		return $query;
	}

	public function get_asal()
	{
		$query = $this->db->select('*')->from('asal')->order_by('id_asal','DESC')->get();
		return $query;
	}

	public function get_sumber()
	{
		$query = $this->db->select('*')->from('sumber')->order_by('id_sumber','DESC')->get();
		return $query;
	}

	public function get_barang($id2)
	{
		$query = $this->db->select('*')->from('barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->where('id_sumber',$id2)
		->order_by('id_barang','DESC')->get();
		return $query;
	}

	public function get_barang2($id)
	{
		$hasil=$this->db->query("SELECT * FROM barang JOIN satuan ON satuan.id_satuan=barang.id_satuan WHERE barang.id_sumber='$id'");
		return $hasil->result();
	}

	public function insert()
	{
		$data = array(
			'id_asal'=> $this->input->post('id_asal'),
			'id_sumber'=> $this->input->post('id_sumber'),
			'no_dokumen'=> $this->input->post('no_dokumen'),
			'nama_penyalur'=> $this->input->post('nama_penyalur'),
			'tanggal_barang_masuk'=> $this->input->post('tanggal_barang_masuk'),
			'nama_pabrik'=> $this->input->post('nama_pabrik'),
		);
		$this->db->insert('barang_masuk',$data);

		$id_barang_masuk = $this->db->insert_id();
		$id_barang = count($this->input->post('id_barang'));

		echo var_dump($id_barang);
		
		for ($i = 0; $i < $id_barang; $i++) {
			$datas[$i] = array(
				'id_barang_masuk' => $id_barang_masuk,
				'id_barang' => $this->input->post('id_barang['.$i.']'),
				'stok_barang_masuk' => $this->input->post('stok_barang_masuk['.$i.']'),
				'expire_date' => $this->input->post('expire_date['.$i.']'),
				'no_batch' => $this->input->post('no_batch['.$i.']'),
				'harga_barang_masuk' => $this->input->post('harga_barang_masuk['.$i.']'),
			);

			$this->db->insert('rincian_barang_masuk', $datas[$i]);

			$id_ed = $this->input->post('id_barang['.$i.']');
			$expire_date = $this->input->post('expire_date['.$i.']');

			$cek_ed = $this->db->select('*')->from('barang')
			->where('id_barang',$id_ed)
			->like('ed_barang',$expire_date, 'both')->get();

			if ($cek_ed->num_rows()<1) {
				$cek_ed2 = $this->db->select('*')->from('barang')
				->where('id_barang',$id_ed)->get();

				foreach ($cek_ed2->result() as $dt) :
					$ed_barang = $dt->ed_barang;
				endforeach;

				$data2['ed_barang'] = $expire_date.','.$ed_barang;
				$where = array('id_barang' => $id_ed);
				$this->db->update('barang',$data2,$where);
			};
		}
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from barang_masuk JOIN asal ON asal.id_asal=barang_masuk.id_asal JOIN sumber ON sumber.id_sumber=barang_masuk.id_sumber where barang_masuk.id_barang_masuk='$id'")->row_array();
	}

	public function get_rincian_barang_masuk($id)
	{
		$query = $this->db->select('*')->from('rincian_barang_masuk')
		->join('barang','barang.id_barang=rincian_barang_masuk.id_barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->where('rincian_barang_masuk.id_barang_masuk',$id)
		->order_by('rincian_barang_masuk.id_rincian_barang_masuk','ASC')->get();
		return $query;
	}

	public function update()
	{
		$data = array(
			'id_asal'=> $this->input->post('id_asal'),
			'id_sumber'=> $this->input->post('id_sumber'),
			'no_dokumen'=> $this->input->post('no_dokumen'),
			'nama_penyalur'=> $this->input->post('nama_penyalur'),
			'tanggal_barang_masuk'=> $this->input->post('tanggal_barang_masuk'),
			'nama_pabrik'=> $this->input->post('nama_pabrik'),
		);
		$where = array('id_barang_masuk' => $this->input->post('id_barang_masuk'));
		$this->db->update('barang_masuk',$data,$where);

		$this->db->delete('rincian_barang_masuk',$where);
		$id_barang = count($this->input->post('id_barang'));
		for ($i = 0; $i < $id_barang; $i++) {
			$datas[$i] = array(
				'id_barang_masuk' => $this->input->post('id_barang_masuk'),
				'id_barang' => $this->input->post('id_barang['.$i.']'),
				'stok_barang_masuk' => $this->input->post('stok_barang_masuk['.$i.']'),
				'expire_date' => $this->input->post('expire_date['.$i.']'),
				'no_batch' => $this->input->post('no_batch['.$i.']'),
				'harga_barang_masuk' => $this->input->post('harga_barang_masuk['.$i.']'),
			);
			$this->db->insert('rincian_barang_masuk', $datas[$i]);

			$id_ed = $this->input->post('id_barang['.$i.']');
			$expire_date = $this->input->post('expire_date['.$i.']');

			$cek_ed = $this->db->select('*')->from('barang')
			->where('id_barang',$id_ed)
			->like('ed_barang',$expire_date, 'both')->get();

			if ($cek_ed->num_rows()<1) {
				$cek_ed2 = $this->db->select('*')->from('barang')
				->where('id_barang',$id_ed)->get();

				foreach ($cek_ed2->result() as $dt) :
					$ed_barang = $dt->ed_barang;
				endforeach;

				$data2['ed_barang'] = $expire_date.','.$ed_barang;
				$where = array('id_barang' => $id_ed);
				$this->db->update('barang',$data2,$where);
			};
		}
	}

	public function delete($id)
	{
		$where = array('id_barang_masuk' => $id);
		$query = $this->db->delete('barang_masuk',$where);
		return $query;
	}
}