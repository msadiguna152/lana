<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Puskesmas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mpuskesmas');
		$this->load->model('Mbarang');

		
	}
	public function index(){
		$data = array(
			"menu" => "Daftar PKM",
			"puskesmas" => $this->Mpuskesmas->get(),
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('puskesmas/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Daftar PKM",
			"barang" => $this->Mpuskesmas->get_barang(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('puskesmas/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){
		$nama_puskesmas = $this->input->post('nama_puskesmas');
		$query = $this->db->select('*')->from('puskesmas')->where('nama_puskesmas',$nama_puskesmas)->get();

		if($query->num_rows() == 0) {

			$this->form_validation->set_rules('nama_puskesmas','Nama puskesmas','trim|required');
			$this->form_validation->set_rules('alamat_puskesmas','Alamat puskesmas','trim|required');
			$this->form_validation->set_rules('jumlah_pustu','Jumlah pustu','trim|required|max_length[3]|integer');
			$this->form_validation->set_rules('jumlah_bidan_desa','Jumlah bidan desa','trim|required|max_length[3]|integer');
			$this->form_validation->set_rules('nama_ttd_puskesmas','Nama TTD puskesmas','trim|required');
			$this->form_validation->set_rules('nip_ttd_puskesmas','NIP TTD puskesmas','trim|required|max_length[16]|integer');
			$this->form_validation->set_rules('id_barang[]','Barang','trim|required');
			$this->form_validation->set_rules('stok_puskesmas[]','Stok obat / alkes puskesmas','trim|required|max_length[6]|integer');

			$this->form_validation->set_error_delimiters('- ', '<br>');

			if($this->form_validation->run() == TRUE){
				$this->Mpuskesmas->insert();
				$this->session->set_flashdata('konfirmasi','ditambah');
				redirect('Puskesmas');
			}
			else {
				$this->session->set_flashdata('nama_puskesmas',$this->input->post('nama_puskesmas'));
				$this->session->set_flashdata('alamat_puskesmas',$this->input->post('alamat_puskesmas'));
				$this->session->set_flashdata('jumlah_pustu',$this->input->post('jumlah_pustu'));
				$this->session->set_flashdata('jumlah_bidan_desa',$this->input->post('jumlah_bidan_desa'));
				$this->session->set_flashdata('nama_ttd_puskesmas',$this->input->post('nama_ttd_puskesmas'));
				$this->session->set_flashdata('nip_ttd_puskesmas',$this->input->post('nip_ttd_puskesmas'));
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('Puskesmas/insert');
			}
		} else {
			$this->session->set_flashdata('pesan','Data puskesmas sudah ada!');
			redirect('Puskesmas/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Daftar PKM",
			"dtpuskesmas" => $this->Mpuskesmas->get_edit($id),
			"rincian_barang" => $this->Mpuskesmas->get_rincian_barang($id),
			"barang" => $this->Mpuskesmas->get_barang(),
			"sumber" => $this->Mpuskesmas->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('puskesmas/ubah');
		$this->load->view('tema/footer');
	}

	public function rincian($id){
		$id2 = $this->input->get('id_sumber');
		$data = array(
			"menu" => "Daftar PKM",
			"dtpuskesmas" => $this->Mpuskesmas->get_edit($id),
			"barang" => $this->Mpuskesmas->get_rincian_barang($id,$id2),
			"sumber" => $this->Mbarang->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('puskesmas/rincian');
		$this->load->view('tema/footer');
	}

	public function update_proses(){
		$this->form_validation->set_rules('nama_puskesmas','Nama Puskesmas','trim|required');
		$this->form_validation->set_rules('alamat_puskesmas','Alamat Puskesmas','trim|required');
		$this->form_validation->set_rules('jumlah_pustu','Jumlah Pustu','trim|required|max_length[3]|integer');
		$this->form_validation->set_rules('jumlah_bidan_desa','Jumlah Bidan Desa','trim|required|max_length[3]|integer');
		$this->form_validation->set_rules('nama_ttd_puskesmas','Nama TTD Puskesmas','trim|required');
		$this->form_validation->set_rules('nip_ttd_puskesmas','NIP TTD Puskesmas','trim|required|max_length[16]|integer');
		$this->form_validation->set_rules('id_barang[]','Barang','trim|required');
		$this->form_validation->set_rules('stok_puskesmas[]','Stok Obat / Alkes Puskesmas','trim|required|max_length[6]|integer');

		if($this->form_validation->run() == TRUE){
			$this->Mpuskesmas->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Puskesmas');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Puskesmas/update/'.$this->input->post('id_puskesmas'));
		}
	}
	public function delete($id){
		$this->Mpuskesmas->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');
		redirect('Puskesmas');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */