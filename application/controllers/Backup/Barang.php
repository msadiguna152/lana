<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mbarang');
		
	}
	public function index(){
		$id_sumber = $this->input->get('id_sumber');
		$data = array(
			"menu" => "Barang",
			"barang" => $this->Mbarang->get($id_sumber),
			"sumber" => $this->Mbarang->get_sumber(),
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Barang",
			"satuan" => $this->Mbarang->get_satuan(),
			"sumber" => $this->Mbarang->get_sumber()
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){
		$nama_barang = $this->input->post('nama_barang');
		$id_sumber = $this->input->post('id_sumber');
		$klasifikasi = $this->input->post('klasifikasi');

		$query = $this->db->select('*')->from('barang')->where('nama_barang',$nama_barang)->where('id_sumber',$id_sumber)->where('klasifikasi',$klasifikasi)->get();

		if($query->num_rows() == 0) {

			$this->form_validation->set_rules('nama_barang','Nama barang','trim|required');
			$this->form_validation->set_rules('id_sumber','Sumber Barang','trim|required');
			$this->form_validation->set_rules('id_satuan','Satuan Barang','trim|required');
			$this->form_validation->set_rules('harga_barang','Harga Barang','trim|required');
			$this->form_validation->set_rules('stok_barang','Stok Barang','trim|required|max_length[6]|integer');
			$this->form_validation->set_rules('klasifikasi','Klasifikasi barang','trim|required');

			$this->form_validation->set_error_delimiters('- ', '<br>');

			if($this->form_validation->run() == TRUE){
				$this->Mbarang->insert();
				$this->session->set_flashdata('konfirmasi','ditambah');
				redirect('Barang');
			}
			else {
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('Barang/insert');
			}
		} else {
			$this->session->set_flashdata('pesan','Data barang sudah ada!');
			redirect('Barang/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Barang",
			"dtbarang" => $this->Mbarang->get_edit($id),
			"satuan" => $this->Mbarang->get_satuan(),
			"sumber" => $this->Mbarang->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_barang','Nama barang','trim|required');
		$this->form_validation->set_rules('id_sumber','Sumber Barang','trim|required');
		$this->form_validation->set_rules('id_satuan','Satuan Barang','trim|required');
		$this->form_validation->set_rules('harga_barang','Harga Barang','trim|required');
		$this->form_validation->set_rules('stok_barang','Stok Barang','trim|required|max_length[6]|integer');
		$this->form_validation->set_rules('ed_barang','Expired Date Barang','trim|required');
		$this->form_validation->set_rules('klasifikasi','Klasifikasi barang','trim|required');

		if($this->form_validation->run() == TRUE){
			$this->Mbarang->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Barang');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Barang/update/'.$this->input->post('id_barang'));
		}
	}
	public function delete($id){
		$this->Mbarang->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Barang');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */