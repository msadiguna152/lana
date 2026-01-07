<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mjabatan');
		
	}
	public function index(){
		$data = array(
			"menu" => "Jabatan",
			"jabatan" => $this->Mjabatan->get()
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('jabatan/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Jabatan",
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('jabatan/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){
		$this->form_validation->set_rules('nama_jabatan','Nama jabatan','required');
		$this->form_validation->set_rules('keterangan_jabatan','Keterangan jabatan','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mjabatan->insert();
			$this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Jabatan');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Jabatan/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Jabatan",
			"dtjabatan" => $this->Mjabatan->get_edit($id)
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('jabatan/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_jabatan','Nama jabatan','required');
		$this->form_validation->set_rules('keterangan_jabatan','Keterangan jabatan','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mjabatan->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Jabatan');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Jabatan/update/'.$this->input->post('id_jabatan'));
		}
	}
	public function delete($id){
		$this->Mjabatan->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Jabatan');
	}

	public function import_excel()
	{
		if(isset($_FILES["file"]["name"])){
            $this->Mjabatan->insert_excel();
            $this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Jabatan');
		}
		else
		{
			$this->session->set_flashdata('konfirmasi','gagal');
			redirect('Jabatan');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */