<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpermintaan extends CI_Model {

	public function get($dari_tanggal,$sampai_tanggal)
	{
		if ($dari_tanggal!=NULL AND $sampai_tanggal!=NULL) {
			$query = $this->db->select('*')->from('barang_keluar')
			->join('puskesmas','puskesmas.id_puskesmas=barang_keluar.id_puskesmas','LEFT')
			->join('sumber','sumber.id_sumber=barang_keluar.id_sumber','LEFT')

			->where('tanggal_pengajuan>=',$dari_tanggal)
			->where('tanggal_pengajuan<=',$sampai_tanggal)
			->order_by('id_barang_keluar','DESC')->get();
		} else {
			$filter = explode("-",date("Y-m-d"));
			$query = $this->db->select('*')->from('barang_keluar')
			->join('puskesmas','puskesmas.id_puskesmas=barang_keluar.id_puskesmas','LEFT')
			->join('sumber','sumber.id_sumber=barang_keluar.id_sumber','LEFT')
			->where('MONTH(tanggal_pengajuan)',$filter['1'])
			->where('YEAR(tanggal_pengajuan)',$filter['0'])
			->order_by('id_barang_keluar','DESC')->get();
		}

		return $query;
	}

	public function get_permintaan($bulan_tahun)
	{
		if ($bulan_tahun!=NULL) {
			$filter = explode("-",$bulan_tahun);
			$query = $this->db->select('*')->from('barang_keluar')
			->join('puskesmas','puskesmas.id_puskesmas=barang_keluar.id_puskesmas','LEFT')
			->where('keluar_karena','Permintaan PKM')
			->where('MONTH(tanggal_pengajuan)',$filter['1'])
			->where('YEAR(tanggal_pengajuan)',$filter['0'])
			->order_by('id_barang_keluar','DESC')->get();
		} else {
			$filter = explode("-",date("Y-m-d"));
			$query = $this->db->select('*')->from('barang_keluar')
			->join('puskesmas','puskesmas.id_puskesmas=barang_keluar.id_puskesmas','LEFT')
			->where('keluar_karena','Permintaan PKM')
			->where('MONTH(tanggal_pengajuan)',$filter['1'])
			->where('YEAR(tanggal_pengajuan)',$filter['0'])
			->order_by('id_barang_keluar','DESC')->get();
		}

		return $query;
	}

	public function get_puskesmas()
	{
		$query = $this->db->select('*')->from('puskesmas')->order_by('id_puskesmas','DESC')->get();
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

	public function get_edit($id)
	{
		return $this->db->query("SELECT * from barang_keluar where id_barang_keluar='$id'")->row_array();
	}

	public function get_rincian_barang_keluar($id)
	{
		$query = $this->db->select('*')->from('rincian_barang_keluar')
		->join('barang','barang.id_barang=rincian_barang_keluar.id_barang')
		->join('jenis','jenis.id_jenis=barang.id_jenis','LEFT')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->where('rincian_barang_keluar.id_barang_keluar',$id)
		->order_by('rincian_barang_keluar.id_barang','DESC')->get();
		return $query;
	}

	public function update()
	{
		$data = array(
			'keluar_karena'=> $this->input->post('keluar_karena'),
			'tanggal_barang_keluar'=> $this->input->post('tanggal_barang_keluar'),
			'keterangan_barang_keluar'=> $this->input->post('keterangan_barang_keluar'),
			'status_barang_keluar'=> $this->input->post('status_barang_keluar'),
			'id_sumber'=> $this->input->post('id_sumber'),
		);

		if ($this->input->post('keluar_karena')=="Permintaan PKM") {
			$data['id_puskesmas'] = $this->input->post('id_puskesmas');
			$data['no_permintaan'] = $this->input->post('no_permintaan');
		} elseif ($this->input->post('keluar_karena')=="Permintaan Non PKM") {
			$data['no_permintaan'] = $this->input->post('no_permintaan');
			$data['asal_permintaan'] = $this->input->post('asal_permintaan');
		} else {
			$data['no_berita_acara'] = $this->input->post('no_berita_acara');
		};

		$where = array('id_barang_keluar' => $this->input->post('id_barang_keluar'));
		$this->db->update('barang_keluar',$data,$where);

		$this->db->delete('rincian_barang_keluar',$where);
		$id_barang = count($this->input->post('id_barang'));
		for ($i = 0; $i < $id_barang; $i++) {
			$data[$i] = array(
				'id_barang_keluar' => $this->input->post('id_barang_keluar'),
				'id_puskesmas' => $this->input->post('id_puskesmas'),
				'id_barang' => $this->input->post('id_barang['.$i.']'),
				'stok_barang_keluar' => $this->input->post('stok_barang_keluar['.$i.']'),
				'permintaan' => $this->input->post('permintaan['.$i.']'),
				'rincian' => $this->input->post('rincian['.$i.']'),
				'ed_barang_keluar' => $this->input->post('ed_barang_keluar['.$i.']'),
			);
			$this->db->insert('rincian_barang_keluar', $data[$i]);
			if ($this->input->post('keluar_karena')=="Permintaan PKM") {
				$cek_ed = $this->db->select('*')->from('stok_puskesmas')
				->where('id_barang',$this->input->post('id_barang['.$i.']'))->where('id_puskesmas',$this->input->post('id_puskesmas'))
				->like('ed_barang_puskesmas',$this->input->post('ed_barang_keluar['.$i.']'), 'both')->get();

				if ($cek_ed->num_rows()<1) {
					$cek_ed2 = $this->db->select('*')->from('stok_puskesmas')->where('id_barang',$this->input->post('id_barang['.$i.']'))->where('id_puskesmas',$this->input->post('id_puskesmas'))->get();
					foreach ($cek_ed2->result() as $dt) :
						$ed_barang_puskesmas = $dt->ed_barang_puskesmas;
					endforeach;

					$data2['ed_barang_puskesmas'] = $this->input->post('ed_barang_keluar['.$i.']').','.$ed_barang_puskesmas;
					$where = array('id_barang' => $this->input->post('id_barang['.$i.']'), 'id_puskesmas' => $this->input->post('id_puskesmas'));
					$this->db->update('stok_puskesmas',$data2,$where);
				};
			}
		}
	}

	public function kode(){
		$this->db->select('SUBSTRING(no_permintaan, 4, 3) as no_permintaan', FALSE);
		$this->db->order_by('no_permintaan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('barang_keluar');  //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
			//cek kode jika telah tersedia    
			$data = $query->row();      
			$kode = intval($data->no_permintaan) + 1; 
		} else{      
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl=date('M/Y'); 
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		$kodetampil = "NP"."-".$batas."/".$tgl;  //format kode
		return $kodetampil;  
	}
}