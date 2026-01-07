<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mjabatan extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_jabatan'=> $this->input->post('nama_jabatan'),
			'keterangan_jabatan'=> $this->input->post('keterangan_jabatan'),
		);
		$this->db->insert('jabatan',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('jabatan')->order_by('id_jabatan','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from jabatan where id_jabatan='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_jabatan'=> $this->input->post('nama_jabatan'),
			'keterangan_jabatan'=> $this->input->post('keterangan_jabatan'),
		);
		$where = array('id_jabatan' => $this->input->post('id_jabatan'));
		$this->db->update('jabatan',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_jabatan' => $id);
		$query = $this->db->delete('jabatan',$where);
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
				$nama_jabatan =  strtolower($worksheet->getCellByColumnAndRow(1, $row)->getValue());
				$keterangan_jabatan =  $worksheet->getCellByColumnAndRow(2, $row)->getValue();

				$query = $this->db->select('*')->from('jabatan')->where('nama_jabatan',$nama_jabatan)->get();
				if($query->num_rows() == 0 AND $nama_jabatan != NULL) {
					$data = array('nama_jabatan' => ucwords($nama_jabatan), 'keterangan_jabatan' => $keterangan_jabatan);
					$this->db->insert('jabatan',$data);
				}
			}

			// echo var_dump($highestColumn);
		}
	}
}