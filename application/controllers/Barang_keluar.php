<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_keluar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mbarang_keluar');
		$this->load->model('Mpegawai');
		$this->load->model('Mbarang');
		
	}
	public function index(){
		$dari_tanggal = $this->input->get('dari_tanggal');
		$sampai_tanggal = $this->input->get('sampai_tanggal');

		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Barang Keluar",
				"barang_keluar" => $this->Mbarang_keluar->get($dari_tanggal,$sampai_tanggal),
				"dari_tanggal" => $dari_tanggal,
				"sampai_tanggal" => $sampai_tanggal,
			);
		} else {
			$data = array(
				"menu" => "Permintaan Barang",
				"barang_keluar" => $this->Mbarang_keluar->get($dari_tanggal,$sampai_tanggal),
				"dari_tanggal" => $dari_tanggal,
				"sampai_tanggal" => $sampai_tanggal,
				"levelUser" => $this->session->userdata('level'),
			); 
		}

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_keluar/index');
		$this->load->view('tema/footer');
	}

	public function rincian($id){
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Barang Keluar",
				"dtbarang_keluar" => $this->Mbarang_keluar->get_edit($id),
				"rincian_barang_keluar" => $this->Mbarang_keluar->get_rincian_barang_keluar($id),
				"pegawai" => $this->Mpegawai->get(),
				"barang" => $this->Mbarang->get(),
				"levelUser" => $this->session->userdata('level'),
			);
		} else {
			$data = array(
				"menu" => "Permintaan Barang",
				"dtbarang_keluar" => $this->Mbarang_keluar->get_edit($id),
				"rincian_barang_keluar" => $this->Mbarang_keluar->get_rincian_barang_keluar($id),
				"barang" => $this->Mbarang->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		}

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_keluar/rincian');
		$this->load->view('tema/footer');
	}

	public function insert(){
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Barang Keluar",
				"kodeUrut" => $this->Mbarang_keluar->kodeUrut(),
				"kodeBA" => $this->Mbarang_keluar->kodeBA(),
				"pegawai" => $this->Mpegawai->get($this->session->userdata('id_pegawai')),
				"barang" => $this->Mbarang->get(),
				"levelUser" => $this->session->userdata('level'),
			);
		} else {
			$data = array(
				"menu" => "Permintaan Barang",
				"kodeUrut" => $this->Mbarang_keluar->kodeUrut(),
				"kodeBA" => $this->Mbarang_keluar->kodeBA(),
				"barang" => $this->Mbarang->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		}

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_keluar/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){
		$no_berita_acara = $this->input->post('no_berita_acara');
		$tanggal_barang_keluar = $this->input->post('tanggal_barang_keluar');
		$query = $this->db->select('*')->from('barang_keluar')->where('no_berita_acara',$no_berita_acara)->where('tanggal_barang_keluar',$tanggal_barang_keluar)->get();
		
		if($query->num_rows() == 0) {
			if ($this->session->userdata('level') === 'Operator') {
				$this->form_validation->set_rules('id_pegawai','Pemohon','trim|required');
				$this->form_validation->set_rules('no_berita_acara','No. berita acara','trim|required');
				$this->form_validation->set_rules('no_bukti','No. bukti','trim|required');
				$this->form_validation->set_rules('asal_permintaan','Asal permintaan','trim|required');
				$this->form_validation->set_rules('tanggal_barang_keluar','Tanggal barang keluar','trim|required');
				// $this->form_validation->set_rules('keterangan_barang_keluar','Keterangan barang keluar','trim|required');
				$this->form_validation->set_rules('id_barang[]','Barang','trim|required');
				$this->form_validation->set_rules('stok_barang_keluar[]','Stok Keluar','trim|required|max_length[6]|integer');
				$this->form_validation->set_rules('permintaan[]','Permintaan','trim|required');
				// $this->form_validation->set_rules('rincian[]','Rincian','trim|required');
				$this->form_validation->set_error_delimiters('- ', '<br>');
			} elseif ($this->session->userdata('level') === 'Pengusul') {
				// $this->form_validation->set_rules('keterangan_barang_keluar','Keterangan barang keluar','trim|required');
				$this->form_validation->set_rules('id_barang[]','Barang','trim|required');
				$this->form_validation->set_rules('permintaan[]','Permintaan','trim|required');
				// $this->form_validation->set_rules('rincian[]','Rincian','trim|required');
				$this->form_validation->set_error_delimiters('- ', '<br>');
			} else {
				$this->form_validation->set_rules('status_barang_keluar','Statu barang keluar','trim|required');
				$this->form_validation->set_error_delimiters('- ', '<br>');
			}

			if($this->form_validation->run() == TRUE){
				$this->Mbarang_keluar->insert();
				$this->session->set_flashdata('konfirmasi','ditambah');
				redirect('Barang_keluar');
			}
			else {
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('Barang_keluar/insert');
			};
		} else {
			$this->session->set_flashdata('pesan','Data sudah ada!');
			redirect('Barang_keluar/insert');
		};
	}
	public function update($id){
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Barang Keluar",
				"dtbarang_keluar" => $this->Mbarang_keluar->get_edit($id),
				"rincian_barang_keluar" => $this->Mbarang_keluar->get_rincian_barang_keluar($id),
				"pegawai" => $this->Mpegawai->get(),
				"barang" => $this->Mbarang->get(),
				"levelUser" => $this->session->userdata('level'),
			);
		} else {
			$data = array(
				"menu" => "Permintaan Barang",
				"dtbarang_keluar" => $this->Mbarang_keluar->get_edit($id),
				"rincian_barang_keluar" => $this->Mbarang_keluar->get_rincian_barang_keluar($id),
				"barang" => $this->Mbarang->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		}

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_keluar/ubah');
		$this->load->view('tema/footer');
	}

	public function update_proses(){
		if ($this->session->userdata('level') === 'Operator') {
				$this->form_validation->set_rules('id_pegawai','Pemohon','trim|required');
				$this->form_validation->set_rules('no_berita_acara','No. berita acara','trim|required');
				$this->form_validation->set_rules('no_bukti','No. bukti','trim|required');
				$this->form_validation->set_rules('asal_permintaan','Asal permintaan','trim|required');
				$this->form_validation->set_rules('tanggal_barang_keluar','Tanggal barang keluar','trim|required');
				// $this->form_validation->set_rules('keterangan_barang_keluar','Keterangan barang keluar','trim|required');
				$this->form_validation->set_rules('id_barang[]','Barang','trim|required');
				$this->form_validation->set_rules('stok_barang_keluar[]','Stok Keluar','trim|required|max_length[6]|integer');
				$this->form_validation->set_rules('permintaan[]','Permintaan','trim|required');
				// $this->form_validation->set_rules('rincian[]','Rincian','trim|required');
				$this->form_validation->set_error_delimiters('- ', '<br>');
			} elseif ($this->session->userdata('level') === 'Pengusul') {
				// $this->form_validation->set_rules('keterangan_barang_keluar','Keterangan barang keluar','trim|required');
				$this->form_validation->set_rules('id_barang[]','Barang','trim|required');
				$this->form_validation->set_rules('permintaan[]','Permintaan','trim|required');
				// $this->form_validation->set_rules('rincian[]','Rincian','trim|required');
				$this->form_validation->set_error_delimiters('- ', '<br>');
			} else {
				$this->form_validation->set_rules('status_barang_keluar','Statu barang keluar','trim|required');
				$this->form_validation->set_error_delimiters('- ', '<br>');
			}

		if($this->form_validation->run() == TRUE){
			$this->Mbarang_keluar->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Barang_keluar');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Barang_keluar/update/'.$this->input->post('id_barang_keluar'));
		}
	}
	public function delete($id){
		$this->Mbarang_keluar->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Barang_keluar');
	}

	public function cetak($id){
		$data = array(
			"dtbarang_keluar" => $this->Mbarang_keluar->get_cetak($id),
			"rincian_barang_keluar" => $this->Mbarang_keluar->get_rincian_barang_cetak($id),
		);
		$this->load->view('barang_keluar/cetak', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */