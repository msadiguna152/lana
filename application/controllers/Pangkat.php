<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pangkat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mpangkat');
		
	}
	public function index(){
		$data = array(
			"menu" => "Pangkat",
			"pangkat" => $this->Mpangkat->get()
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pangkat/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Pangkat",
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pangkat/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){

		$this->form_validation->set_rules('nama_pangkat','Nama pangkat','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mpangkat->insert();
			$this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Pangkat');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Pangkat/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Pangkat",
			"dtpangkat" => $this->Mpangkat->get_edit($id)
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pangkat/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_pangkat','Nama pangkat','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mpangkat->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Pangkat');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Pangkat/update/'.$this->input->post('id_pangkat'));
		}
	}
	public function delete($id){
		$this->Mpangkat->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Pangkat');
	}

	public function import_excel()
	{
		if(isset($_FILES["file"]["name"])){
            $this->Mpangkat->insert_excel();
            $this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Pangkat');
		}
		else
		{
			$this->session->set_flashdata('konfirmasi','gagal');
			redirect('Pangkat');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */