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
		// if ($kode_barang==NULL OR $kode_barang=="Semua") {
		// 	$query = $this->db->select('*')->from('barang')
		// 	->join('sumber','sumber.kode_barang=barang.kode_barang','LEFT')
		// 	->join('satuan','satuan.id_satuan=barang.id_satuan')
		// 	->order_by('sumber.nama_sumber','ASC')->get();
		// } else {
		// 	$query = $this->db->select('*')->from('barang')
		// 	->join('sumber','sumber.kode_barang=barang.kode_barang','LEFT')
		// 	->join('satuan','satuan.id_satuan=barang.id_satuan')
		// 	->where('barang.kode_barang',$kode_barang)
		// 	->order_by('nama_barang','ASC')->get();
		// };

		$query = $this->db->select('*')->from('barang')
		->join('satuan','satuan.id_satuan=barang.id_satuan','LEFT')
		->order_by('barang.id_barang','DESC')->get();
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
				$harga_barang =  $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$stok_barang =  $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$deskripsi =  $worksheet->getCellByColumnAndRow(5, $row)->getValue();

				$query = $this->db->select('*')->from('barang')->where('kode_barang',$kode_barang)->get();
				if($query->num_rows() == 0 AND $nama_barang != NULL) {
					$data = array(
						'kode_barang' => $kode_barang,
						'nama_barang' => ucwords($nama_barang),
						'harga_barang' => $harga_barang,
						'stok_barang' => $stok_barang,
						'deskripsi' => $deskripsi,

					);
					$this->db->insert('barang',$data);
				}
			}

			// echo var_dump($highestColumn);
		}
	}
}