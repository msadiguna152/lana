<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpengaturanttd extends CI_Model {
	public function get_edit()
	{
		return $this->db->where('id_pengaturanttd', 1)->get('pengaturanttd')->row_array();
	}
	public function update()
	{
		$data = array(
			'nama_mengetahui'        => $this->input->post('nama_mengetahui'),
			'nip_mengetahui'         => $this->input->post('nip_mengetahui'),
			'jabatan_mengetahui_b1'  => $this->input->post('jabatan_mengetahui_b1'),
			'jabatan_mengetahui_b2'  => $this->input->post('jabatan_mengetahui_b2'),
			'nama_diserahkan'        => $this->input->post('nama_diserahkan'),
			'nip_diserahkan'         => $this->input->post('nip_diserahkan'),
			'jabatan_diserahkan_b1'  => $this->input->post('jabatan_diserahkan_b1'),
			'jabatan_diserahkan_b2'  => $this->input->post('jabatan_diserahkan_b2'),
		);
		$where = array('id_pengaturanttd' => $this->input->post('id_pengaturanttd'));
		$this->db->update('pengaturanttd',$data,$where);
	}
}