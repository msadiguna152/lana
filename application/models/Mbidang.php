<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbidang extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_bidang'=> $this->input->post('nama_bidang'),
		);
		$this->db->insert('bidang',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('bidang')->order_by('id_bidang','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from bidang where id_bidang='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_bidang'=> $this->input->post('nama_bidang'),
		);
		$where = array('id_bidang' => $this->input->post('id_bidang'));
		$this->db->update('bidang',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_bidang' => $id);
		$query = $this->db->delete('bidang',$where);
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
				$nama_bidang =  $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$query = $this->db->select('*')->from('bidang')->where('nama_bidang',$nama_bidang)->get();
				if($query->num_rows() == 0 AND $nama_bidang != NULL) {
					$data = array('nama_bidang' => ucwords($nama_bidang));
					$this->db->insert('bidang',$data);
				} else {

				}
			}

			// echo var_dump($highestColumn);
		}
	}

}