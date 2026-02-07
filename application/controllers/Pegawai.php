<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Mpegawai');
		$this->load->model('Mjabatan');
		$this->load->model('Mpangkat');
		$this->load->model('Mbidang');
	}
	public function index(){
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Pegawai",
				"pegawai" => $this->Mpegawai->get(),
			); 
		} else {
			$data = array(
				"menu" => "Biodata",
				"pegawai" => $this->Mpegawai->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		}
		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pegawai/index');
		$this->load->view('tema/footer');
	}

	public function insert(){
		$data = array(
			"menu" => "Pegawai",
			"pangkat" => $this->Mpangkat->get(),
			"bidang" => $this->Mbidang->get(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pegawai/tambah');
		$this->load->view('tema/footer');
	}
	public function insert_proses(){
		$nip_no_reg = $this->input->post('nip_no_reg');
		$query = $this->db->select('*')->from('pegawai')->where('nip_no_reg',$nip_no_reg)->get();

		if($query->num_rows() == 0) {

			$this->form_validation->set_rules('nama_pegawai','Nama pegawai','trim|required');
			$this->form_validation->set_rules('jenis_register','Jenis register pegawai','trim|required');
			$this->form_validation->set_rules('nip_no_reg','NIP / No. Reg pegawai','trim|required');
			$this->form_validation->set_rules('id_pangkat','Pangkat/Golongan pegawai','trim|required');
			$this->form_validation->set_rules('id_jabatan','Jabatan pegawai','trim|required');
			$this->form_validation->set_rules('status_pegawai','Status pegawai','trim|required');
			$this->form_validation->set_rules('id_bidang','Bidang pegawai','trim|required');
			$this->form_validation->set_error_delimiters('- ', '<br>');

			if($this->form_validation->run() == TRUE){
				$this->Mpegawai->insert();
				$this->session->set_flashdata('konfirmasi','ditambah');
				redirect('Pegawai');
			}
			else {
				$this->session->set_flashdata('nama_pegawai',$this->input->post('nama_pegawai'));
				$this->session->set_flashdata('jenis_register',$this->input->post('jenis_register'));
				$this->session->set_flashdata('nip_no_reg',$this->input->post('nip_no_reg'));
				$this->session->set_flashdata('id_pangkat',$this->input->post('id_pangkat'));
				$this->session->set_flashdata('id_jabatan',$this->input->post('id_jabatan'));
				$this->session->set_flashdata('status_pegawai',$this->input->post('status_pegawai'));
				$this->form_validation->set_rules('id_bidang','Bidang pegawai','trim|required');
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('Pegawai/insert');
			}
		} else {
			$this->session->set_flashdata('pesan','Data pegawai sudah ada!');
			redirect('Pegawai/insert');
		}
	}
	public function update($id){
		if ($this->session->userdata('level') === 'Operator') {
			$data = array(
				"menu" => "Pegawai",
				"dtpegawai" => $this->Mpegawai->get_edit($id),
				"jabatan" => $this->Mpegawai->get_jabatan($id),
				"pangkat" => $this->Mpangkat->get(),
				"bidang" => $this->Mbidang->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		} else {
			$data = array(
				"menu" => "Biodata",
				"dtpegawai" => $this->Mpegawai->get_edit($id),
				"jabatan" => $this->Mpegawai->get_jabatan($id),
				"pangkat" => $this->Mpangkat->get(),
				"bidang" => $this->Mbidang->get(),
				"levelUser" => $this->session->userdata('level'),
			); 
		}

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pegawai/ubah');
		$this->load->view('tema/footer');
	}

	public function rincian($id){
		$id2 = $this->input->get('id_sumber');
		$data = array(
			"menu" => "Pegawai",
			"dtpegawai" => $this->Mpegawai->get_edit($id),
			"jabatan" => $this->Mpegawai->get_rincian_jabatan($id,$id2),
			"sumber" => $this->Mjabatan->get_sumber(),
		);

		$this->load->view('tema/head',$data);
		$this->load->view('tema/menu');
		$this->load->view('pegawai/rincian');
		$this->load->view('tema/footer');
	}

	public function update_proses(){
		$this->form_validation->set_rules('nama_pegawai','Nama pegawai','trim|required');
		$this->form_validation->set_rules('jenis_register','Jenis register pegawai','trim|required');
		$this->form_validation->set_rules('nip_no_reg','NIP / No. Reg pegawai','trim|required');
		$this->form_validation->set_rules('id_pangkat','Pangkat/Golongan pegawai','trim|required');
		$this->form_validation->set_rules('id_jabatan','Jabatan pegawai','trim|required');
		$this->form_validation->set_rules('status_pegawai','Status pegawai','trim|required');
		$this->form_validation->set_rules('id_bidang','Bidang pegawai','trim|required');
		$this->form_validation->set_error_delimiters('- ', '<br>');

		if($this->form_validation->run() == TRUE){
			$this->Mpegawai->update();
			$this->session->set_flashdata('konfirmasi','diubah');
			redirect('Pegawai');
		}
		else {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect('Pegawai/update/'.$this->input->post('id_pegawai'));
		}
	}
	public function delete($id){
		$this->Mpegawai->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');
		redirect('Pegawai');
	}

	public function get_by_bidang()
	{
		$id_bidang = $this->input->post('id_bidang', true);

		$data = $this->db->select('id_jabatan,nama_jabatan')->from('jabatan')->where('id_bidang', $id_bidang)->order_by('nama_jabatan', 'ASC')->get()->result();

		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */