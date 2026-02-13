<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function check_access()
    {
        $controller = $this->CI->router->fetch_class();
        $method     = $this->CI->router->fetch_method();
        $level      = $this->CI->session->userdata('level');
        $login      = $this->CI->session->userdata('login');

        // Controller yang boleh diakses tanpa login
        $public_controller = ['Login'];

        if (in_array($controller, $public_controller)) {
            return;
        }

        // Jika belum login
        if (!$login) {
            redirect('Login');
            exit;
        }

        // Role / Level Access Map
        $access = [
            'Operator' => ['Login', 'Beranda', 'Barang', 'Pegawai', 'Jabatan', 'Pengguna', 'Satuan', 'Barang_masuk', 'Barang_keluar', 'Pangkat', 'Bidang', 'Pengaturanttd'],
            'Pengusul' => ['Login', 'Beranda', 'Pegawai', 'Pengguna', 'Barang_keluar'],
            'Penyetuju' => ['Login', 'Beranda', 'Pegawai', 'Barang_keluar'],
        ];

        // Jika level tidak terdaftar
        if (!isset($access[$level])) {
            show_error('Level tidak dikenali', 403);
        }

        // Cek akses controller
        if (!in_array($controller, $access[$level])) {
            show_error('Anda tidak memiliki hak akses', 403);
        }
    }
}
