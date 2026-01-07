<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mpengguna');
		
	}
	public function index(){
		$data = array(
			"menu" => "Pengguna",
			"pengguna" => $this->Mpengguna->get()
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pengguna/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Pengguna",
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pengguna/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){

		$this->form_validation->set_rules('nama_pengguna','Nama pengguna','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if (empty($_FILES['foto_pengguna']['name']))
		{
			$this->form_validation->set_rules('foto_pengguna','Foto pengguna','required');
		}
		$this->form_validation->set_rules('level','Level','required');
		$this->form_validation->set_rules('status_pengguna','Status pengguna','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mpengguna->insert();
			$this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Pengguna');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Pengguna/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Pengguna",
			"dtpengguna" => $this->Mpengguna->get_edit($id)
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pengguna/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_pengguna','Nama pengguna','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('level','Level','required');
		$this->form_validation->set_rules('status_pengguna','Status Pengguna','required');

		if($this->form_validation->run() == TRUE){
			$this->Mpengguna->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Pengguna');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Pengguna/update/'.$this->input->post('id_pengguna'));
		}
	}
	public function delete($id){
		$this->Mpengguna->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');
		redirect('Pengguna');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */