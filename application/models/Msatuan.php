<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msatuan extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_satuan'=> $this->input->post('nama_satuan'),
		);
		$this->db->insert('satuan',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('satuan')->order_by('id_satuan','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from satuan where id_satuan='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_satuan'=> $this->input->post('nama_satuan'),
		);
		$where = array('id_satuan' => $this->input->post('id_satuan'));
		$this->db->update('satuan',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_satuan' => $id);
		$query = $this->db->delete('satuan',$where);
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
				$nama_satuan =  $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$query = $this->db->select('*')->from('satuan')->where('nama_satuan',$nama_satuan)->get();
				if($query->num_rows() == 0 AND $nama_satuan != NULL) {
					$data = array('nama_satuan' => ucwords($nama_satuan));
					$this->db->insert('satuan',$data);
				} else {

				}
			}

			// echo var_dump($highestColumn);
		}
	}

}