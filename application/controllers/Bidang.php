<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mbidang');
		
	}
	public function index(){
		$data = array(
			"menu" => "Seksi",
			"bidang" => $this->Mbidang->get()
		);
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('bidang/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Seksi",
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('bidang/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){

		$this->form_validation->set_rules('nama_bidang','Nama bidang','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mbidang->insert();
			$this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Bidang');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Bidang/insert');
		}
	}
	public function update($id){
		$data = array(
			"menu" => "Seksi",
			"dtbidang" => $this->Mbidang->get_edit($id)
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('bidang/ubah');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_bidang','Nama bidang','required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mbidang->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Bidang');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Bidang/update/'.$this->input->post('id_bidang'));
		}
	}

	public function delete($id){
		$this->Mbidang->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');

		redirect('Bidang');
	}

	public function import_excel()
	{
		if(isset($_FILES["file"]["name"])){
            $this->Mbidang->insert_excel();
            $this->session->set_flashdata('konfirmasi','ditambah');
			redirect('Bidang');
		}
		else
		{
			$this->session->set_flashdata('konfirmasi','gagal');
			redirect('Bidang');
		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */