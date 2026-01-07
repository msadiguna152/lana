<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model{
	public function cek_data($username,$password){
		$query = $this->db->select('*')->from('pengguna')->join('pegawai','pegawai.id_pegawai = pengguna.id_pegawai','LEFT')->join('bidang','bidang.id_bidang = pegawai.id_bidang','LEFT')->where('username',$username)->where('password',$password)->get();
		return $query;
	}
}