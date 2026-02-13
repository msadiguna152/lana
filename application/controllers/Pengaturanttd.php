<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturanttd extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mpengaturanttd');	
	}

	public function index(){
		$data = array(
			"menu" => "Pengaturan TTD",
			"dtedit" => $this->Mpengaturanttd->get_edit()
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pengaturanttd/index');
		$this->load->view('tema/footer');
	}
	public function update_proses(){
		$this->form_validation->set_rules('nama_mengetahui', 'Nama Mengetahui', 'required|trim');
		$this->form_validation->set_rules('nip_mengetahui', 'NIP Mengetahui', 'required|trim');
		$this->form_validation->set_rules('jabatan_mengetahui_b1', 'Jabatan Mengetahui B1', 'required|trim');
		$this->form_validation->set_rules('nama_diserahkan', 'Nama Diserahkan', 'required|trim');
		$this->form_validation->set_rules('nip_diserahkan', 'NIP Diserahkan', 'required|trim');
		$this->form_validation->set_rules('jabatan_diserahkan_b1', 'Jabatan Diserahkan B1', 'required|trim');

		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mpengaturanttd->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Pengaturanttd');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Pengaturanttd');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */