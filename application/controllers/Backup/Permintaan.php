<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permintaan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mpermintaan');
		
	}
	public function index(){
		$dari_tanggal = $this->input->get('dari_tanggal');
		$sampai_tanggal = $this->input->get('sampai_tanggal');
		$data = array(
			"menu" => "Permintaan",
			"barang_keluar" => $this->Mpermintaan->get_permintaan($dari_tanggal,$sampai_tanggal),
			"dari_tanggal" => $dari_tanggal,
			"sampai_tanggal" => $sampai_tanggal,
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('permintaan/index');
		$this->load->view('tema/footer');
	}

	public function rincian($id){
		$data = array(
			"menu" => "Permintaan",
			"dtbarang_keluar" => $this->Mpermintaan->get_edit($id),
			"rincian_barang_keluar" => $this->Mpermintaan->get_rincian_barang_keluar($id),
			"puskesmas" => $this->Mpermintaan->get_puskesmas(),
			"sumber" => $this->Mpermintaan->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('permintaan/rincian');
		$this->load->view('tema/footer');
	}

	public function update($id){
		$data = array(
			"menu" => "Permintaan",
			"dtbarang_keluar" => $this->Mpermintaan->get_edit($id),
			"rincian_barang_keluar" => $this->Mpermintaan->get_rincian_barang_keluar($id),
			"puskesmas" => $this->Mpermintaan->get_puskesmas(),
			"sumber" => $this->Mpermintaan->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('permintaan/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){

		if ($this->input->post('keluar_karena')=="Permintaan PKM") {
			$this->form_validation->set_rules('id_puskesmas','Puskesmas','trim|required');
			$this->form_validation->set_rules('no_permintaan','No. Permintaan','trim|required');
			$this->form_validation->set_rules('permintaan[]','Permintaan','trim|required|max_length[6]|integer');
		} elseif ($this->input->post('keluar_karena')=="Permintaan Non PKM") {
			$this->form_validation->set_rules('asal_permintaan','Asal Permintaan','trim|required');
			$this->form_validation->set_rules('no_permintaan','No. Permintaan','trim|required');
			$this->form_validation->set_rules('permintaan[]','Permintaan','trim|required|max_length[6]|integer');
		} else {
			$this->form_validation->set_rules('no_berita_acara','No. Berita Acara','trim|required');
		};

		$this->form_validation->set_rules('tanggal_barang_keluar','Tanggal keluar','trim|required');
		$this->form_validation->set_rules('keterangan_barang_keluar','Keterangan','trim|required');
		$this->form_validation->set_rules('status_barang_keluar','Status','trim|required');
		$this->form_validation->set_rules('stok_barang_keluar[]','Pemberian / Stok Keluar','trim|required|max_length[6]|integer');
		$this->form_validation->set_rules('rincian[]','Rincian','trim|required');;

		if($this->form_validation->run() == TRUE){
			$this->Mpermintaan->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Permintaan');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Permintaan/update/'.$this->input->post('id_barang_keluar'));
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */