<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mbarang_masuk');
		
	}
	public function index(){
		$dari_tanggal = $this->input->get('dari_tanggal');
		$sampai_tanggal = $this->input->get('sampai_tanggal');

		$data = array(
			"menu" => "Barang_masuk",
			"barang_masuk" => $this->Mbarang_masuk->get($dari_tanggal,$sampai_tanggal),
			"dari_tanggal" => $dari_tanggal,
			"sampai_tanggal" => $sampai_tanggal,
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_masuk/index');
		$this->load->view('tema/footer');
	}

	public function rincian($id){
		$data = array(
			"menu" => "Barang_masuk",
			"dtbarang_masuk" => $this->Mbarang_masuk->get_edit($id),
			"rincian_barang_masuk" => $this->Mbarang_masuk->get_rincian_barang_masuk($id),
			"asal" => $this->Mbarang_masuk->get_asal(),
			"sumber" => $this->Mbarang_masuk->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_masuk/rincian');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Barang_masuk",
			"asal" => $this->Mbarang_masuk->get_asal(),
			"sumber" => $this->Mbarang_masuk->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_masuk/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){
		$no_dokumen = $this->input->post('no_dokumen');
		$tanggal_barang_masuk = $this->input->post('tanggal_barang_masuk');
		$query = $this->db->select('*')->from('barang_masuk')->where('no_dokumen',$no_dokumen)->where('tanggal_barang_masuk',$tanggal_barang_masuk)->get();

		if($query->num_rows() == 0) {
			$this->form_validation->set_rules('no_dokumen','No. Dokumen / Faktur','trim|required');
			$this->form_validation->set_rules('nama_penyalur','Nama PBF / Penyalur','trim|required');
			$this->form_validation->set_rules('id_asal','Asal Barang','trim|required');
			$this->form_validation->set_rules('id_sumber','Sumber Barang','trim|required');
			$this->form_validation->set_rules('tanggal_barang_masuk','Nama Pabrik','trim|required');
			$this->form_validation->set_rules('nama_pabrik','Keterangan','trim|required');
			$this->form_validation->set_rules('stok_barang_masuk[]','Stok Barang Masuk','trim|required|max_length[6]|integer');
			$this->form_validation->set_rules('no_batch[]','No. Batch','trim|required');
			$this->form_validation->set_rules('expire_date[]','No. Bacth','trim|required');

			$this->form_validation->set_error_delimiters('- ', '<br>');

			if($this->form_validation->run() == TRUE){
				$this->Mbarang_masuk->insert();
				$this->session->set_flashdata('konfirmasi','ditambah');
				redirect('Barang_masuk');
			}
			else {
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('Barang_masuk/insert');
			}
		} else {
			$this->session->set_flashdata('pesan','Data sudah ada!');
			redirect('Barang_masuk/insert');
		}
	}
	public function update($id,$id2){
		$data = array(
			"menu" => "Barang_masuk",
			"dtbarang_masuk" => $this->Mbarang_masuk->get_edit($id),
			"rincian_barang_masuk" => $this->Mbarang_masuk->get_rincian_barang_masuk($id),
			"barang" => $this->Mbarang_masuk->get_barang($id2),
			"asal" => $this->Mbarang_masuk->get_asal(),
			"sumber" => $this->Mbarang_masuk->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('barang_masuk/ubah');
		$this->load->view('tema/footer');
	}


	public function update_proses(){
		$this->form_validation->set_rules('no_dokumen','No. Dokumen / Faktur','trim|required');
		$this->form_validation->set_rules('nama_penyalur','Nama PBF / Penyalur','trim|required');
		$this->form_validation->set_rules('id_asal','Asal Barang','trim|required');
		$this->form_validation->set_rules('id_sumber','Sumber Barang','trim|required');
		$this->form_validation->set_rules('tanggal_barang_masuk','Tanggal Penerimaan','trim|required');
		$this->form_validation->set_rules('tanggal_barang_masuk','Nama Pabrik','trim|required');
		$this->form_validation->set_rules('stok_barang_masuk[]','Stok Barang Masuk','trim|required|max_length[6]|integer');
		$this->form_validation->set_rules('no_batch[]','No. Batch','trim|required');
		$this->form_validation->set_rules('expire_date[]','No. Bacth','trim|required');

		if($this->form_validation->run() == TRUE){
			$this->Mbarang_masuk->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Barang_masuk');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Barang_masuk/update/'.$this->input->post('id_barang_masuk'));
		}
	}
	public function delete($id){
		$this->Mbarang_masuk->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Barang_masuk');
	}

	public function get_barang(){
		$id=$this->input->post('id');
		$data=$this->Mbarang_masuk->get_barang2($id);
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */