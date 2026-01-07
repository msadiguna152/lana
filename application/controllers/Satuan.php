<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Satuan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Msatuan');
		
	}
	public function index(){
		$data = array(
			"menu" => "Satuan",
			"satuan" => $this->Msatuan->get()
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('satuan/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Satuan",
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('satuan/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){

		$this->form_validation->set_rules('nama_satuan','Nama satuan','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Msatuan->insert();
			$this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Satuan');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Satuan/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Satuan",
			"dtsatuan" => $this->Msatuan->get_edit($id)
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('satuan/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_satuan','Nama satuan','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Msatuan->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Satuan');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Satuan/update/'.$this->input->post('id_satuan'));
		}
	}

	public function delete($id){
		$this->Msatuan->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Satuan');
	}

	public function import_excel()
	{
		if(isset($_FILES["file"]["name"])){
            $this->Msatuan->insert_excel();
            $this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Satuan');
		}
		else
		{
			$this->session->set_flashdata('konfirmasi','gagal');
			redirect('Satuan');
		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */