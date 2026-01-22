<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbarang_masuk extends CI_Model {

	public function get($dari_tanggal,$sampai_tanggal)
	{
		if ($dari_tanggal!=NULL AND $sampai_tanggal!=NULL) {
			$query = $this->db->select('')->from('barang_masuk')
			->where('tanggal_barang_masuk>=',$dari_tanggal)
			->where('tanggal_barang_masuk<=',$sampai_tanggal)
			->order_by('id_barang_masuk','DESC')->get();
		} else {
			$filter = explode("-",date("Y-m-d"));
			$query = $this->db->select('*')->from('barang_masuk')
			->where('MONTH(tanggal_barang_masuk)',$filter['1'])
			->where('YEAR(tanggal_barang_masuk)',$filter['0'])
			->order_by('id_barang_masuk','DESC')->get();
		}
		
		return $query;
	}

	public function get_barang($id2)
	{
		$query = $this->db->select('*')->from('barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->where('no_bukti',$id2)
		->order_by('id_barang','DESC')->get();
		return $query;
	}

	public function get_barang2($id)
	{
		$hasil=$this->db->query("SELECT * FROM barang JOIN satuan ON satuan.id_satuan=barang.id_satuan WHERE barang.no_bukti='$id'");
		return $hasil->result();
	}

	public function insert()
	{
		$data = array(
			'no_barang_masuk'=> $this->input->post('no_barang_masuk'),
			'no_bukti'=> $this->input->post('no_bukti'),
			'tanggal_barang_masuk'=> $this->input->post('tanggal_barang_masuk'),
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
				// 'harga_barang_masuk' => $this->input->post('harga_barang_masuk['.$i.']'),
			);

			$this->db->insert('rincian_barang_masuk', $datas[$i]);
		}
	}

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from barang_masuk where barang_masuk.id_barang_masuk='$id'")->row_array();
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
			'no_barang_masuk'=> $this->input->post('no_barang_masuk'),
			'no_bukti'=> $this->input->post('no_bukti'),
			'tanggal_barang_masuk'=> $this->input->post('tanggal_barang_masuk'),
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
				// 'harga_barang_masuk' => $this->input->post('harga_barang_masuk['.$i.']'),
			);
			$this->db->insert('rincian_barang_masuk', $datas[$i]);
		}
	}

	public function delete($id)
	{
		$where = array('id_barang_masuk' => $id);
		$query = $this->db->delete('barang_masuk',$where);
		return $query;
	}

	public function kode()
	{
		$tahun = date('Y');

		$this->db->select('SUBSTRING(no_barang_masuk, 1, 3) as no_urut', FALSE);
		$this->db->from('barang_masuk');
		$this->db->where('YEAR(tanggal_barang_masuk)', $tahun);
		$this->db->order_by('no_urut', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() <> 0){        
			$data = $query->row();      
			$kode = intval($data->no_urut) + 1; 
		} else{      
			$kode = 1;
		}
		$kodetampil = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		return $kodetampil;  
	}

	public function getCetak($dari, $sampai)
	{
		$this->db->select('
			b.kode_barang,
			bm.no_barang_masuk,
			bm.no_bukti,
			bm.tanggal_barang_masuk,
			b.nama_barang,
			rbm.stok_barang_masuk AS jumlah_masuk,
			b.stok_barang AS stok_akhir,
			s.nama_satuan,
			b.deskripsi
			');
		$this->db->from('rincian_barang_masuk rbm');
		$this->db->join('barang_masuk bm', 'bm.id_barang_masuk = rbm.id_barang_masuk');
		$this->db->join('barang b', 'b.id_barang = rbm.id_barang');
		$this->db->join('satuan s', 's.id_satuan = b.id_satuan', 'left');
		$this->db->where('bm.tanggal_barang_masuk >=', $dari);
		$this->db->where('bm.tanggal_barang_masuk <=', $sampai);
		$this->db->order_by('bm.tanggal_barang_masuk', 'ASC');
		$this->db->order_by('bm.no_barang_masuk', 'ASC');

		$sql = $this->db->get();

		$this->session->set_userdata('last_query', $this->db->last_query());
		return $sql;
	}
}