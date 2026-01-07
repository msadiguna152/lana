<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbarang_keluar extends CI_Model {
	public function insert()
	{
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				'id_pegawai'=> $this->input->post('id_pegawai'),
				'no_berita_acara'=> $this->input->post('no_berita_acara'),
				'no_bukti'=> $this->input->post('no_bukti'),
				'asal_permintaan'=> $this->input->post('asal_permintaan'),
				'tanggal_barang_keluar'=> $this->input->post('tanggal_barang_keluar'),
				'keterangan_barang_keluar'=> $this->input->post('keterangan_barang_keluar'),
				'status_barang_keluar'=> $this->input->post('status_barang_keluar'),
				'status_pimpinan'=> $this->input->post('status_pimpinan'),
			);
		} else {
			$data = array(
				'id_pegawai'=> $this->session->userdata('id_pegawai'),
				'no_berita_acara'=> $this->input->post('no_berita_acara'),
				'no_bukti'=> $this->input->post('no_bukti'),
				'asal_permintaan'=> $this->input->post('asal_permintaan'),
				'keterangan_barang_keluar'=> $this->input->post('keterangan_barang_keluar'),
				'status_pimpinan'=> $this->input->post('status_pimpinan'),
			);
		};
		$this->db->insert('barang_keluar',$data);

		$id_barang_keluar = $this->db->insert_id();
		$id_barang = count($this->input->post('id_barang'));

		for ($i = 0; $i < $id_barang; $i++) {

			$datas[$i] = array(
				'id_barang_keluar' => $id_barang_keluar,
				'id_barang' => $this->input->post('id_barang['.$i.']'),
				'stok_barang_keluar' => $this->input->post('stok_barang_keluar['.$i.']'),
				'permintaan' => $this->input->post('permintaan['.$i.']'),
				'rincian' => $this->input->post('rincian['.$i.']'),
			);
			$this->db->insert('rincian_barang_keluar', $datas[$i]);

		}
	}
	public function get($dari_tanggal,$sampai_tanggal)
	{
		if ($dari_tanggal!=NULL AND $sampai_tanggal!=NULL) {
			$this->db->select('*');
			$this->db->from('barang_keluar');
			$this->db->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai','LEFT');
			$this->db->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan','LEFT');
			if ($this->session->userdata('level') === 'Pengusul') {
				$this->db->where('barang_keluar.id_pegawai', $this->session->userdata('id_pegawai'));
			} elseif ($this->session->userdata('level') === 'Penyetuju') {
				$this->db->where('pegawai.id_bidang', $this->session->userdata('id_bidang'));
			};
			$this->db->where('tanggal_barang_keluar>=',$dari_tanggal);
			$this->db->where('tanggal_barang_keluar<=',$sampai_tanggal);
			$this->db->order_by('id_barang_keluar','DESC');
		} else {
			$filter = explode("-",date("Y-m-d"));
			$this->db->select('*');
			$this->db->from('barang_keluar');
			$this->db->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai','LEFT');
			$this->db->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan');
			if ($this->session->userdata('level') === 'Pengusul') {
				$this->db->where('barang_keluar.id_pegawai', $this->session->userdata('id_pegawai'));
			} elseif ($this->session->userdata('level') === 'Penyetuju') {
				$this->db->where('pegawai.id_bidang', $this->session->userdata('id_bidang'));
			};
			// $this->db->where('MONTH(tanggal_barang_keluar)',$filter['1']);
			// $this->db->where('YEAR(tanggal_barang_keluar)',$filter['0']);
			$this->db->order_by('id_barang_keluar','DESC');
		}
		return $query = $this->db->get();
	}

	public function get_permintaan($bulan_tahun)
	{
		if ($bulan_tahun!=NULL) {
			$filter = explode("-",$bulan_tahun);
			$query = $this->db->select('*')->from('barang_keluar')
			->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai','LEFT')
			->where('keluar_karena','Permintaan PKM')
			->where('MONTH(tanggal_pengajuan)',$filter['1'])
			->where('YEAR(tanggal_pengajuan)',$filter['0'])
			->order_by('id_barang_keluar','DESC')->get();
		} else {
			$filter = explode("-",date("Y-m-d"));
			$query = $this->db->select('*')->from('barang_keluar')
			->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai','LEFT')
			->where('keluar_karena','Permintaan PKM')
			->where('MONTH(tanggal_pengajuan)',$filter['1'])
			->where('YEAR(tanggal_pengajuan)',$filter['0'])
			->order_by('id_barang_keluar','DESC')->get();
		}

		return $query;
	}

	public function get_pegawai()
	{
		$query = $this->db->select('*')->from('pegawai')->order_by('id_pegawai','DESC')->get();
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
		return $this->db->query("SELECT * from barang_keluar JOIN pegawai ON pegawai.id_pegawai=barang_keluar.id_pegawai where id_barang_keluar='$id'")->row_array();
	}

	public function get_rincian_barang_keluar($id)
	{
		$query = $this->db->select('*')->from('rincian_barang_keluar')
		->join('barang','barang.id_barang=rincian_barang_keluar.id_barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan','LEFT')
		->where('rincian_barang_keluar.id_barang_keluar',$id)
		->order_by('rincian_barang_keluar.id_rincian_barang_keluar','DESC')->get();
		return $query;
	}

	public function update()
	{
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				'id_pegawai'=> $this->input->post('id_pegawai'),
				'no_berita_acara'=> $this->input->post('no_berita_acara'),
				'no_bukti'=> $this->input->post('no_bukti'),
				'asal_permintaan'=> $this->input->post('asal_permintaan'),
				'tanggal_barang_keluar'=> $this->input->post('tanggal_barang_keluar'),
				'keterangan_barang_keluar'=> $this->input->post('keterangan_barang_keluar'),
				'status_barang_keluar'=> $this->input->post('status_barang_keluar'),
				'status_pimpinan'=> $this->input->post('status_pimpinan'),
			);
			$where = array('id_barang_keluar' => $this->input->post('id_barang_keluar'));
			$this->db->update('barang_keluar',$data,$where);
			$this->db->delete('rincian_barang_keluar',$where);

			$id_barang = count($this->input->post('id_barang'));
			for ($i = 0; $i < $id_barang; $i++) {
				$data[$i] = array(
					'id_barang_keluar' => $this->input->post('id_barang_keluar'),
					'id_barang' => $this->input->post('id_barang['.$i.']'),
					'stok_barang_keluar' => $this->input->post('stok_barang_keluar['.$i.']'),
					'permintaan' => $this->input->post('permintaan['.$i.']'),
					'rincian' => $this->input->post('rincian['.$i.']'),
				);
				$this->db->insert('rincian_barang_keluar', $data[$i]);
			}
		} elseif ($this->session->userdata('level') === 'Pengusul') {
			$data = array(
				'id_pegawai'=> $this->session->userdata('id_pegawai'),
				'no_berita_acara'=> $this->input->post('no_berita_acara'),
				'no_bukti'=> $this->input->post('no_bukti'),
				'asal_permintaan'=> $this->input->post('asal_permintaan'),
				'keterangan_barang_keluar'=> $this->input->post('keterangan_barang_keluar'),
				'status_pimpinan'=> $this->input->post('status_pimpinan'),
			);
			$where = array('id_barang_keluar' => $this->input->post('id_barang_keluar'));
			$this->db->update('barang_keluar',$data,$where);
			$this->db->delete('rincian_barang_keluar',$where);

			$id_barang = count($this->input->post('id_barang'));
			for ($i = 0; $i < $id_barang; $i++) {
				$data[$i] = array(
					'id_barang_keluar' => $this->input->post('id_barang_keluar'),
					'id_barang' => $this->input->post('id_barang['.$i.']'),
					'stok_barang_keluar' => $this->input->post('stok_barang_keluar['.$i.']'),
					'permintaan' => $this->input->post('permintaan['.$i.']'),
					'rincian' => $this->input->post('rincian['.$i.']'),
				);
				$this->db->insert('rincian_barang_keluar', $data[$i]);
			}
		} else {
			$data = array(
				'status_barang_keluar'=> $this->input->post('status_barang_keluar'),
			);
			$where = array('id_barang_keluar' => $this->input->post('id_barang_keluar'));
			$this->db->update('barang_keluar',$data,$where);
		}
	}

	public function delete($id)
	{
		$where = array('id_barang_keluar' => $id);
		$query = $this->db->delete('barang_keluar',$where);

		return $query;
	}

	public function get_cetak($id)
	{
		return $this->db->query("SELECT * from barang_keluar JOIN pegawai ON pegawai.id_pegawai=barang_keluar.id_pegawai JOIN sumber ON sumber.id_sumber=barang_keluar.id_sumber where barang_keluar.id_barang_keluar='$id'")->row_array();
	}

	public function get_rincian_barang_cetak($id)
	{
		$query = $this->db->select('*')->from('rincian_barang_keluar')
		->join('barang','barang.id_barang=rincian_barang_keluar.id_barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan')
		->where('rincian_barang_keluar.id_barang_keluar',$id)
		->order_by('rincian_barang_keluar.id_barang','DESC')->get();
		return $query;
	}

	public function kodeBA()
	{
		$tahun = date('Y');

    	// Ambil nomor urut terakhir di tahun berjalan
		$this->db->select('SUBSTRING(no_berita_acara, 1, 3) as no_ba', FALSE);
		$this->db->from('barang_keluar');
		$this->db->where('YEAR(tanggal_pengajuan)', $tahun);
		$this->db->order_by('no_berita_acara', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = intval($data->no_ba) + 1;
		} else {
        // Tahun baru → mulai dari 001
			$kode = 1;
		}

    	// Nomor urut 3 digit
		$no_ba = str_pad($kode, 3, '0', STR_PAD_LEFT);

    	// Bulan romawi
		$bulanRomawi = [
			1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
			5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
			9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
		];

		$bulan = $bulanRomawi[(int)date('n')];

    	// Format akhir
		$kode_tampil = $no_ba.'/'.$bulan.'/'.$tahun;

		return $kode_tampil;
	}

	public function kodeUrut()
	{
		$tahun = date('Y');

		$this->db->select('SUBSTRING(no_berita_acara, 1, 3) as no_urut', FALSE);
		$this->db->from('barang_keluar');
		$this->db->where('YEAR(tanggal_pengajuan)', $tahun);
		$this->db->order_by('no_berita_acara','DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = (int) $data->no_urut + 1;
		} else {
        	// Tahun baru / data kosong
			$kode = 1;
		}

    	// Format 3 digit: 001
		return str_pad($kode, 3, '0', STR_PAD_LEFT);
	}

}