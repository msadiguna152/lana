<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['beranda'] = 'puskesmas/Beranda';
$route['pkm'] = 'puskesmas/Puskesmas';
$route['akun'] = 'puskesmas/Beranda/update';
$route['akun/proses'] = 'puskesmas/Beranda/update_proses';

$route['buat_permintaan'] = 'puskesmas/Barang_keluar';
$route['buat_permintaan/action/detail/(:num)'] = 'puskesmas/Barang_keluar/rincian/$1';
$route['buat_permintaan/action/insert'] = 'puskesmas/Barang_keluar/insert';
$route['buat_permintaan/action/insert_proses'] = 'puskesmas/Barang_keluar/insert_proses';
$route['buat_permintaan/action/update/(:num)/(:num)'] = 'puskesmas/Barang_keluar/update/$1/$2';
$route['buat_permintaan/action/update_proses'] = 'puskesmas/Barang_keluar/update_proses';
$route['buat_permintaan/action/delete_proses/(:num)'] = 'puskesmas/Barang_keluar/delete/$1';

$route['buat_pengeluaran'] = 'puskesmas/Pengeluaran';
$route['buat_pengeluaran/action/insert'] = 'puskesmas/Pengeluaran/insert';
$route['buat_pengeluaran/action/insert_proses'] = 'puskesmas/Pengeluaran/insert_proses';

$route['buat_permintaan/action/update_konfirmasi'] = 'puskesmas/Barang_keluar/update_konfirmasi';

$route['logout'] = 'Login/proses_logout';

$route['pengguna'] = 'puskesmas/Pengguna';
$route['pengguna/action/insert'] = 'puskesmas/Pengguna/insert';
$route['pengguna/action/insert_proses'] = 'puskesmas/Pengguna/insert_proses';
$route['pengguna/action/update/(:num)'] = 'puskesmas/Pengguna/update/$1';
$route['pengguna/action/update_proses'] = 'puskesmas/Pengguna/update_proses';
















