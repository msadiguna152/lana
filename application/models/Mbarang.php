<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbarang extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_barang'=> $this->input->post('nama_barang'),
			'kode_barang'=> $this->input->post('kode_barang'),
			'id_satuan'=> $this->input->post('id_satuan'),
			'stok_barang'=> $this->input->post('stok_barang'),
			// 'harga_barang'=> $this->input->post('harga_barang'),
			'deskripsi'=> $this->input->post('deskripsi'),
		);
		$this->db->insert('barang',$data);
	}
	public function get()
	{
		$query = $this->db
		->select('barang.id_barang, barang.kode_barang, barang.nama_barang, barang.deskripsi, barang.stok_barang, satuan.nama_satuan')
		->from('barang')
		->join('satuan', 'satuan.id_satuan = barang.id_satuan', 'left')
		->order_by('barang.id_barang', 'DESC')
		->get();
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
			'kode_barang'=> $this->input->post('kode_barang'),
			'id_satuan'=> $this->input->post('id_satuan'),
			'stok_barang'=> $this->input->post('stok_barang'),
			// 'harga_barang'=> $this->input->post('harga_barang'),
			'deskripsi'=> $this->input->post('deskripsi'),
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

	public function insert_excel()
	{
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_name = $_FILES['file']['name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
        // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

		$object = PHPExcel_IOFactory::load($file_tmp);

		foreach($object->getWorksheetIterator() as $worksheet){

			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();

			for($row=2; $row<=$highestRow; $row++){
				$kode_barang =  $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$nama_barang =  strtolower($worksheet->getCellByColumnAndRow(2, $row)->getValue());
				$nama_satuan =  ucwords($worksheet->getCellByColumnAndRow(3, $row)->getValue());
				$stok_barang =  $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$deskripsi =  $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$cek_satuan = $this->db->select('*')->from('satuan')->where('nama_satuan',$nama_satuan)->get();
				if($cek_satuan->num_rows() == 0 AND $nama_barang != NULL) { 
					$data = array(
						'nama_satuan'=> $nama_satuan,
					);
					$this->db->insert('satuan',$data);
					$id_satuan = $this->db->insert_id();
					$query = $this->db->select('*')->from('barang')->where('kode_barang',$kode_barang)->get();
					if($query->num_rows() == 0 AND $nama_barang != NULL) {
						$data = array(
							'kode_barang' => $kode_barang,
							'nama_barang' => ucwords($nama_barang),
							'id_satuan' => $id_satuan,
							'stok_barang' => $stok_barang,
							'deskripsi' => $deskripsi,
						);
						$this->db->insert('barang',$data);
					}
				} elseif ($cek_satuan->num_rows() > 0 AND $nama_barang != NULL) {
					$id_satuan = $cek_satuan->row()->id_satuan;
					$query = $this->db->select('*')->from('barang')->where('kode_barang',$kode_barang)->get();
					if($query->num_rows() == 0 AND $nama_barang != NULL) {
						$data = array(
							'kode_barang' => $kode_barang,
							'nama_barang' => ucwords($nama_barang),
							'id_satuan' => $id_satuan,
							'stok_barang' => $stok_barang,
							'deskripsi' => $deskripsi,
						);
						$this->db->insert('barang',$data);
					}
				}
			}
		}
	}

	public function getCetak($dari, $sampai)
	{
		$dari   = $this->db->escape($dari);
		$sampai = $this->db->escape($sampai);

		$this->db->select('b.id_barang,b.kode_barang,b.nama_barang,b.deskripsi,s.nama_satuan,COALESCE(m.total_masuk,0) AS total_masuk,COALESCE(k.total_keluar,0) AS total_keluar,(COALESCE(m.total_masuk,0)-COALESCE(k.total_keluar,0)) AS stok_akhir', false);

		$this->db->from('barang b');
		$this->db->join('satuan s','b.id_satuan=s.id_satuan','left');

		$this->db->join('(SELECT rbm.id_barang,SUM(rbm.stok_barang_masuk) AS total_masuk FROM rincian_barang_masuk rbm JOIN barang_masuk bm ON rbm.id_barang_masuk=bm.id_barang_masuk WHERE bm.tanggal_barang_masuk BETWEEN '.$dari.' AND '.$sampai.' GROUP BY rbm.id_barang) m','b.id_barang=m.id_barang','left',false);

		$this->db->join('(SELECT rbk.id_barang,SUM(rbk.stok_barang_keluar) AS total_keluar FROM rincian_barang_keluar rbk JOIN barang_keluar bk ON rbk.id_barang_keluar=bk.id_barang_keluar WHERE bk.tanggal_barang_keluar BETWEEN '.$dari.' AND '.$sampai.' GROUP BY rbk.id_barang) k','b.id_barang=k.id_barang','left',false);

		$this->db->order_by('b.id_barang','ASC');
		$this->db->having('stok_akhir >',0);

		$sql = $this->db->get();

		$this->session->set_userdata('last_query', $this->db->last_query());
		return $sql;
	}

	public function get_barang($id_barang)
	{
		return $this->db
		->select('barang.*, satuan.nama_satuan')
		->from('barang')
		->join('satuan', 'barang.id_satuan = satuan.id_satuan', 'left')
		->where('barang.id_barang', $id_barang)
		->get()
		->row();
	}

	public function get_rincian_transaksi($id_barang, $dari, $sampai)
	{
	    // =======================
	    // BARANG MASUK
	    // =======================
		$masuk = $this->db->select('barang_masuk.tanggal_barang_masuk AS tanggal, "Masuk" AS jenis, barang_masuk.no_bukti, rincian_barang_masuk.stok_barang_masuk AS jumlah, rincian_barang_masuk.rincian AS keterangan', false)
		->from('rincian_barang_masuk')
		->join('barang_masuk', 'rincian_barang_masuk.id_barang_masuk = barang_masuk.id_barang_masuk', 'inner')
		->where('rincian_barang_masuk.id_barang', $id_barang)
		->where('barang_masuk.tanggal_barang_masuk >=', $dari)
		->where('barang_masuk.tanggal_barang_masuk <=', $sampai)
		->get()
		->result_array();

	    // =======================
	    // BARANG KELUAR
	    // =======================
		$keluar = $this->db->select('barang_keluar.tanggal_barang_keluar AS tanggal, "Keluar" AS jenis, barang_keluar.no_bukti, pegawai.nama_pegawai, rincian_barang_keluar.stok_barang_keluar AS jumlah, rincian_barang_keluar.rincian AS keterangan', false)
		->from('rincian_barang_keluar')
		->join('barang_keluar', 'rincian_barang_keluar.id_barang_keluar = barang_keluar.id_barang_keluar', 'inner')
		->join('pegawai', 'pegawai.id_pegawai = barang_keluar.id_pegawai', 'left')
		->where('rincian_barang_keluar.id_barang', $id_barang)
		->where('barang_keluar.tanggal_barang_keluar >=', $dari)
		->where('barang_keluar.tanggal_barang_keluar <=', $sampai)
		->get()
		->result_array();

	    // =======================
	    // GABUNG & SORT
	    // =======================
		$hasil = array_merge($masuk, $keluar);

		usort($hasil, function ($a, $b) {
			return strtotime($a['tanggal']) <=> strtotime($b['tanggal']);
		});

		return $hasil;
	}


}