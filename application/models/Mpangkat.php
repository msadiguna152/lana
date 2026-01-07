<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpangkat extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_pangkat'=> $this->input->post('nama_pangkat'),
		);
		$this->db->insert('pangkat',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('pangkat')->order_by('id_pangkat','DESC')->get();
		return $query;
	}
	public function get_edit($id)
	{
		return $this->db->query("SELECT * from pangkat where id_pangkat='$id'")->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_pangkat'=> $this->input->post('nama_pangkat'),
		);
		$where = array('id_pangkat' => $this->input->post('id_pangkat'));
		$this->db->update('pangkat',$data,$where);
	}

	public function delete($id)
	{
		$where = array('id_pangkat' => $id);
		$query = $this->db->delete('pangkat',$where);
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
				$nama_pangkat =  $worksheet->getCellByColumnAndRow(1, $row)->getValue();

				$query = $this->db->select('*')->from('pangkat')->where('nama_pangkat',$nama_pangkat)->get();

				if($query->num_rows() == 0 AND $nama_pangkat != NULL) {
					$data = array('nama_pangkat' => $nama_pangkat);
					$this->db->insert('pangkat',$data);
					//echo var_dump($highestRow);
				}
			}
			
		}
	}
}