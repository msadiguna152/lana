<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Mberanda');
		$this->load->model('Mbarang_keluar');
		$this->load->model('Mpegawai');
		$this->load->model('Mbarang');
	}
	public function index()
	{
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Beranda",
				"barang_keluar" => $this->Mberanda->get(),
				"levelUser" => $this->session->userdata('level'),
			);
		} else {
			$data = array(
				"menu" => "Beranda",
				"barang_keluar" => $this->Mberanda->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		};

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('beranda/index');
		$this->load->view('tema/footer');
	}

	public function update(){
		$data = array(
			"menu" => "",
			"dtpengguna" => $this->Mberanda->get_edit()
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('beranda/ubah');
		$this->load->view('tema/footer');
	}
	
	public function update_proses(){
		$this->form_validation->set_rules('nama_pengguna','Nama pengguna','required');
		$this->form_validation->set_rules('username','Username','required');

		if($this->form_validation->run() == TRUE){
			$this->Mberanda->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Beranda/update');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Beranda/update');
		}
	}

	public function get_dashboard_data()
	{
		$data = [
			'total_barang'  => $this->db->count_all('barang'),
			'barang_masuk'  => $this->db->count_all('rincian_barang_masuk'),
			'barang_keluar' => $this->db->count_all('rincian_barang_keluar'),
			'stok_menipis'  => $this->db->where('stok_barang <=', 5)->count_all_results('barang')
		];

		echo json_encode($data);
	}
}