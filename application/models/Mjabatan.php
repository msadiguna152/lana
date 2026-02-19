<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mjabatan extends CI_Model {
	public function insert()
	{
		$data = array(
			'nama_jabatan'=> $this->input->post('nama_jabatan'),
			'id_bidang'=> $this->input->post('id_bidang'),
			'keterangan_jabatan'=> $this->input->post('keterangan_jabatan'),
		);
		$this->db->insert('jabatan',$data);
	}
	public function get()
	{
		$query = $this->db->select('*')->from('jabatan j')->join('bidang b','j.id_bidang=b.id_bidang','left')->order_by('id_jabatan','DESC')->get();
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
			'id_bidang'=> $this->input->post('id_bidang'),
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
		if (!isset($_FILES['file']['tmp_name'])) return false;
		$object = PHPExcel_IOFactory::load($_FILES['file']['tmp_name']);
    	$this->db->trans_start();

    	foreach ($object->getWorksheetIterator() as $worksheet) {

    		$highestRow = $worksheet->getHighestRow();

    		for ($row = 2; $row <= $highestRow; $row++) {

    			$nama_jabatan = ucwords(trim($worksheet->getCellByColumnAndRow(1, $row)->getValue()));
    			$nama_bidang  = ucwords(trim($worksheet->getCellByColumnAndRow(2, $row)->getValue()));

    			if (empty($nama_jabatan) || empty($nama_bidang)) continue;

    			/* ====== CEK / INSERT BIDANG ====== */
    			$bidang = $this->db->where('nama_bidang', ucwords($nama_bidang))->get('bidang')->row_array();

    			if ($bidang) {
    				$id_bidang = $bidang['id_bidang'];
    			} else {
    				$this->db->insert('bidang', [
    					'nama_bidang' => ucwords($nama_bidang)
    				]);
    				$id_bidang = $this->db->insert_id();
    			}

    			/* ====== CEK JABATAN ====== */
    			$exists = $this->db->where('nama_jabatan', ucwords($nama_jabatan))->where('id_bidang', $id_bidang)->get('jabatan')->num_rows();

    			if ($exists == 0) {
    				$this->db->insert('jabatan', [
    					'nama_jabatan'       => ucwords($nama_jabatan),
    					'keterangan_jabatan' => $keterangan,
    					'id_bidang'          => $id_bidang
    				]);
    			}
    		}
    	}

    	$this->db->trans_complete();
    	return $this->db->trans_status();
    }

}