<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mlogin');
	}

	public function index() {
		$this->session->sess_destroy();
		$this->load->view('index');
	}

	public function proses_login(){
		$this->form_validation->set_rules('username','Username','trim|required|max_length[25]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

		if($this->form_validation->run() == TRUE){

			$cek_data = $this->Mlogin->cek_data($this->input->post('username'),md5($this->input->post('password')));

			if($cek_data->num_rows() == 1) {
				foreach($cek_data->result() as $data){
					$data_session['password'] = $data->password;
					$data_session['username'] = $data->username;
					$data_session['foto_pengguna'] = $data->foto_pengguna;
					$data_session['nama_pengguna'] = $data->nama_pengguna;
					$data_session['status_pengguna'] = $data->status_pengguna;
					$data_session['id_pengguna'] = $data->id_pengguna;
					$data_session['level'] = $data->level;
					$data_session['id_pegawai'] = $data->id_pegawai;
					$data_session['id_bidang'] = $data->id_bidang;
					$data_session['nama_pegawai'] = $data->nama_pegawai;
					$data_session['login'] = true;
					$this->session->set_userdata($data_session);
				}
				if ($this->session->userdata('status_pengguna')=="Aktif") {
					if($this->session->userdata('level') == 'Operator' OR 'Pengusul' OR 'Penyetuju') {
						$this->session->set_flashdata('konfirmasi','berhasil_login');
						redirect('Beranda');
					} else {
						$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Username dan password salah!</div>');
						redirect('Login/index');
					};
				} else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Akun tidak aktif!</div>');
					redirect('Login/index');
				};
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Akun tidak ditemukan!</div>');
				redirect('Login/index');
			};
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Login/index');
		}

	}
	public function proses_logout() {
		$this->session->sess_destroy();
		redirect('Login/index');
	}
}