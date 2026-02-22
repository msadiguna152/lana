<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mbarang_keluar extends CI_Model {

    /* ================= INSERT ================= */
    public function insert()
    {
        $data = $this->_dataBarangKeluar();
        $this->db->insert('barang_keluar', $data);

        $id_barang_keluar = $this->db->insert_id();
        $this->_insertRincian($id_barang_keluar);
    }

    /* ================= GET ================= */
    public function get($dari = NULL, $sampai = NULL)
    {
        $this->db->select('*')
        ->from('barang_keluar')
        ->join('pegawai', 'pegawai.id_pegawai = barang_keluar.id_pegawai', 'left')
        ->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan', 'left');

        $this->_filterLevel();

        if ($dari && $sampai) {
            $this->db->where('tanggal_barang_keluar >=', $dari)
            ->where('tanggal_barang_keluar <=', $sampai);
        }

        $this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get();
    }

    /* ================= GET PEGAWAI================= */
    public function get_pegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('pangkat','pangkat.id_pangkat=pegawai.id_pangkat','LEFT');
        $this->db->join('bidang','bidang.id_bidang=pegawai.id_bidang','LEFT');
        $this->db->join('jabatan','jabatan.id_jabatan=pegawai.id_jabatan');
        if ($this->session->userdata('level') === 'Pengusul') {
            $this->db->where('pegawai.id_bidang', $this->session->userdata('id_bidang'));
        }
        $this->db->order_by('pegawai.id_pegawai','DESC');
        
        return $query = $this->db->get();
    }

    /* ================= EDIT ================= */
    public function get_edit($id)
    {
        return $this->db->select('*')
        ->from('barang_keluar')
        ->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai')
        ->where('id_barang_keluar',$id)
        ->get()->row_array();
    }

    public function get_rincian_barang_keluar($id)
    {
        return $this->db->select('*')
        ->from('rincian_barang_keluar rbk')
        ->join('barang b','b.id_barang=rbk.id_barang')
        ->join('satuan s','s.id_satuan=b.id_satuan','left')
        ->where('rbk.id_barang_keluar',$id)
        ->order_by('rbk.id_rincian_barang_keluar','DESC')
        ->get();
    }

    /* ================= UPDATE ================= */
    public function update()
    {
        $id = $this->input->post('id_barang_keluar');
        $data = $this->_dataBarangKeluar();

        $this->db->where('id_barang_keluar',$id)->update('barang_keluar',$data);

        $this->db->delete('rincian_barang_keluar',['id_barang_keluar'=>$id]);
        
        $this->_insertRincian($id);

        // if ($this->session->userdata('level') !== 'Penyetuju') {
        //     $this->db->delete('rincian_barang_keluar',['id_barang_keluar'=>$id]);
        //     $this->_insertRincian($id);
        // }
    }

    /* ================= DELETE ================= */
    public function delete($id)
    {
        return $this->db->delete('barang_keluar',['id_barang_keluar'=>$id]);
    }

    /* ================= CETAK ================= */
    public function getCetak($dari, $sampai)
    {
        $this->db->select('
            bk.no_berita_acara,
            bk.no_bukti,
            bk.asal_permintaan,
            bk.tanggal_barang_keluar,
            b.kode_barang,
            b.nama_barang,
            rbk.stok_barang_keluar AS jumlah_keluar,
            s.nama_satuan,
            rbk.rincian,
            bk.keterangan_barang_keluar,
            p.nama_pegawai,
            p.id_bidang
            ')
        ->from('rincian_barang_keluar rbk')
        ->join('barang_keluar bk','bk.id_barang_keluar=rbk.id_barang_keluar')
        ->join('pegawai p','p.id_pegawai=bk.id_pegawai','left')
        ->join('barang b','b.id_barang=rbk.id_barang')
        ->join('satuan s','s.id_satuan=b.id_satuan','left')
        ->where('bk.tanggal_barang_keluar >=',$dari)
        ->where('bk.tanggal_barang_keluar <=',$sampai)
        ->order_by('bk.no_berita_acara','ASC');

        if ($this->session->userdata('level') !== 'Operator') {
            $this->db->where('p.id_bidang',$this->session->userdata('id_bidang'));
        };

        $query = $this->db->get();
        $this->session->set_userdata('last_query',$this->db->last_query());

        return $query;
    }

    /* ================= CETAK PERMINTAAN ================= */
    public function get_edit2($id)
    {
        return $this->db->select('*')
        ->from('barang_keluar')
        ->join('pegawai','pegawai.id_pegawai=barang_keluar.id_pegawai')
        ->join('jabatan','pegawai.id_jabatan=jabatan.id_jabatan')

        ->where('id_barang_keluar',$id)
        ->get()->row_array();
    }

    public function get_rincian_barang_keluar2($id)
    {
        return $this->db->select('*')
        ->from('rincian_barang_keluar rbk')
        ->join('barang b','b.id_barang=rbk.id_barang')
        ->join('satuan s','s.id_satuan=b.id_satuan','left')
        ->where('rbk.id_barang_keluar',$id)
        ->order_by('rbk.id_rincian_barang_keluar','DESC')
        ->get();
    }

    /* ================= KODE ================= */
    public function kodeUrut()
    {
        return $this->_generateKode(3);
    }

    public function kodeBA()
    {
        return $this->_generateKode(3, true);
    }

    /* ================= PRIVATE ================= */

    private function _dataBarangKeluar()
    {
        $data = [
            'no_berita_acara'        => $this->input->post('no_berita_acara'),
            'no_bukti'               => $this->input->post('no_bukti'),
            'asal_permintaan'        => $this->input->post('asal_permintaan'),
            'keterangan_barang_keluar'=> $this->input->post('keterangan_barang_keluar'),
            'status_pimpinan'        => $this->input->post('status_pimpinan'),
        ];

        if ($this->session->userdata('level') === 'Operator') {
            $data['id_pegawai'] = $this->input->post('id_pegawai');
            $data['tanggal_barang_keluar'] = $this->input->post('tanggal_barang_keluar');
            $data['status_barang_keluar'] = $this->input->post('status_barang_keluar');
        } elseif ($this->session->userdata('level') === 'Pengusul') {
            $data['id_pegawai'] = $this->input->post('id_pegawai');
        } else {
            $data['id_pegawai'] = $this->input->post('id_pegawai');
            $data['tanggal_barang_keluar'] = $this->input->post('tanggal_barang_keluar');
            $data['status_barang_keluar'] = $this->input->post('status_barang_keluar');
        }

        return $data;
    }

    private function _insertRincian($id_barang_keluar)
    {
        $id_barang = $this->input->post('id_barang');

        foreach ($id_barang as $i => $val) {
            $this->db->insert('rincian_barang_keluar', [
                'id_barang_keluar'   => $id_barang_keluar,
                'id_barang'          => $val,
                'stok_barang_keluar' => $this->input->post('stok_barang_keluar')[$i] ?? 0,
                'permintaan'         => $this->input->post('permintaan')[$i] ?? 0,
                'rincian'            => $this->input->post('rincian')[$i] ?? ''
            ]);
        }
    }

    private function _filterLevel()
    {
        if ($this->session->userdata('level') === 'Pengusul') {
            $this->db->where('pegawai.id_bidang',$this->session->userdata('id_bidang'));
        }
    }

    private function _generateKode($digit = 3, $romawi = false)
    {
        $tahun = date('Y');

        $this->db->select('SUBSTRING(no_berita_acara,1,'.$digit.') as kode',false)
        ->from('barang_keluar')
        ->where('YEAR(tanggal_pengajuan)',$tahun)
        ->order_by('no_berita_acara','DESC')
        ->limit(1);

        $row = $this->db->get()->row();
        $no = $row ? intval($row->kode) + 1 : 1;

        $kode = str_pad($no,$digit,'0',STR_PAD_LEFT);

        if ($romawi) {
            $bulan = ['','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'][date('n')];
            return $kode.'/'.$bulan.'/'.$tahun;
        }

        return $kode;
    }
}
