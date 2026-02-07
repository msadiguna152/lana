<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_keluar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model([
			'Mbarang_keluar',
			'Mpegawai',
			'Mbarang'
		]);
	}

	/* ===================== INDEX ===================== */
	public function index(){
		$dari   = $this->input->get('dari_tanggal');
		$sampai = $this->input->get('sampai_tanggal');

		$data = [
			'menu'          => $this->_menuTitle(),
			'barang_keluar' => $this->Mbarang_keluar->get($dari, $sampai),
			'dari_tanggal'  => $dari,
			'sampai_tanggal'=> $sampai,
			'levelUser'     => $this->session->userdata('level')
		];

		$this->_loadView('barang_keluar/index', $data);
	}

	/* ===================== RINCIAN ===================== */
	public function rincian($id){
		$data = [
			'menu'                     => $this->_menuTitle(),
			'dtbarang_keluar'          => $this->Mbarang_keluar->get_edit($id),
			'rincian_barang_keluar'    => $this->Mbarang_keluar->get_rincian_barang_keluar($id),
			'barang'                   => $this->Mbarang->get(),
			'levelUser'                => $this->session->userdata('level')
		];

		if ($this->_isOperator()) {
			$data['pegawai'] = $this->Mpegawai->get();
		}

		$this->_loadView('barang_keluar/rincian', $data);
	}

	/* ===================== INSERT ===================== */
	public function insert(){
		$data = [
			'menu'      => $this->_menuTitle(),
			'kodeUrut'  => $this->Mbarang_keluar->kodeUrut(),
			'kodeBA'    => $this->Mbarang_keluar->kodeBA(),
			'barang'    => $this->Mbarang->get(),
			'levelUser' => $this->session->userdata('level')
		];

		if ($this->_isOperator()) {
			$data['pegawai'] = $this->Mpegawai->get($this->session->userdata('id_pegawai'));
		}

		$this->_loadView('barang_keluar/tambah', $data);
	}

	public function insert_proses(){
		$this->_setValidationInsert();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Barang_keluar/insert');
		}

		$cek = $this->db->where([
			'no_berita_acara'       => $this->input->post('no_berita_acara'),
			'tanggal_barang_keluar'=> $this->input->post('tanggal_barang_keluar')
		])->get('barang_keluar');

		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('pesan', 'Data sudah ada!');
			redirect('Barang_keluar/insert');
		}

		$this->Mbarang_keluar->insert();
		$this->session->set_flashdata('konfirmasi', 'ditambah');
		redirect('Barang_keluar');
	}

	/* ===================== UPDATE ===================== */
	public function update($id){
		$data = [
			'menu'                   => $this->_menuTitle(),
			'dtbarang_keluar'        => $this->Mbarang_keluar->get_edit($id),
			'rincian_barang_keluar'  => $this->Mbarang_keluar->get_rincian_barang_keluar($id),
			'barang'                 => $this->Mbarang->get(),
			'levelUser'              => $this->session->userdata('level')
		];

		if ($this->_isOperator()) {
			$data['pegawai'] = $this->Mpegawai->get();
		}

		$this->_loadView('barang_keluar/ubah', $data);
	}

	public function update_proses(){
		$this->_setValidationInsert();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Barang_keluar/update/'.$this->input->post('id_barang_keluar'));
		}

		$this->Mbarang_keluar->update();
		$this->session->set_flashdata('konfirmasi', 'diubah');
		redirect('Barang_keluar');
	}

	/* ===================== DELETE ===================== */
	public function delete($id){
		$this->Mbarang_keluar->delete($id);
		$this->session->set_flashdata('konfirmasi','dihapus');
		redirect('Barang_keluar');
	}

	/* ===================== CETAK ===================== */
	public function cetak(){
		$dari   = $this->input->get('dari_tanggal');
		$sampai = $this->input->get('sampai_tanggal');

		$data = [
			'menu'          => 'Barang Keluar',
			'dari_tanggal'  => $dari,
			'sampai_tanggal'=> $sampai,
			'barang_keluar' => $this->Mbarang_keluar->getCetak($dari, $sampai)
		];

		$this->_loadView('barang_keluar/cetak', $data);
	}

	public function hasil_cetak(){
		$query = $this->session->userdata('last_query');
		$data['last_query'] = $this->db->query($query);
		$this->load->view('barang_keluar/hasil_cetak', $data);
	}

	public function cetak_permintaan($id){
		$data = [
			'dtbarang_keluar'        => $this->Mbarang_keluar->get_edit2($id),
			'rincian_barang_keluar'  => $this->Mbarang_keluar->get_rincian_barang_keluar2($id)
		];
		$this->load->view('barang_keluar/cetak_permintaan', $data);
	}

	public function get_seksi_by_pegawai()
	{
		$id_pegawai = $this->input->post('id_pegawai', true);

		$data = $this->db->select('b.nama_bidang')
		->from('pegawai p')
		->join('jabatan j', 'j.id_jabatan = p.id_jabatan', 'left')
		->join('bidang b', 'b.id_bidang = j.id_bidang', 'left')
		->where('p.id_pegawai', $id_pegawai)
		->get()
		->row();

		if ($data) {
			echo json_encode([
				'status' => true,
				'nama_bidang' => $data->nama_bidang
			]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	/* ===================== HELPER ===================== */
	private function _menuTitle(){
		return ($this->_isOperator()) ? 'Barang Keluar' : 'Permintaan Barang';
	}

	private function _isOperator(){
		return $this->session->userdata('level') === 'Operator';
	}

	private function _setValidationInsert(){
		if ($this->_isOperator()) {
			$this->form_validation->set_rules('id_pegawai','Pemohon','required');
			$this->form_validation->set_rules('no_berita_acara','No. Berita Acara','required');
			$this->form_validation->set_rules('no_bukti','No. Bukti','required');
			$this->form_validation->set_rules('asal_permintaan','Asal Permintaan','required');
			$this->form_validation->set_rules('tanggal_barang_keluar','Tanggal','required');
			$this->form_validation->set_rules('id_barang[]','Barang','required');
			$this->form_validation->set_rules('stok_barang_keluar[]','Pemberian','required|integer');
		} else {
			$this->form_validation->set_rules('stok_barang_keluar[]','Pemberian','required|integer');
		}

		$this->form_validation->set_error_delimiters('- ', '<br>');
	}

	private function _loadView($view, $data){
		$this->load->view('tema/head', $data);
		$this->load->view('tema/menu');
		$this->load->view($view);
		$this->load->view('tema/footer');
	}
}
