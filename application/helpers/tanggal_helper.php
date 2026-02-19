<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('format_indo')) {
   function format_indo($date){
       date_default_timezone_set('Asia/Jakarta');
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
       //$Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
       $Bulan = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des");

       $tahun = substr($date,0,4);
       $bulan = substr($date,5,2);
       $tgl = substr($date,8,2);
       $waktu = substr($date,11,5);
       $hari = date("w",strtotime($date));
       $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;
       return $result;
   }

   function format_indo2($date){
       date_default_timezone_set('Asia/Jakarta');
       $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
       $tahun = substr($date,0,4);
       $bulan = substr($date,5,2);
       $result = $Bulan[(int)$bulan-1]." ".$tahun;
       return $result;
   }

   function format_indo3($date){
       date_default_timezone_set('Asia/Jakarta');
       $Bulan = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des");
       $tahun = substr($date,0,4);
       $bulan = substr($date,5,2);

       $result = $Bulan[(int)$bulan-1]." ".$tahun;
       // $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;
       return $result;
   }

   function format_indo4($date){
       date_default_timezone_set('Asia/Jakarta');
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
       $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

       $tahun = substr($date,0,4);
       $bulan = substr($date,5,2);
       $tgl = substr($date,8,2);
       $waktu = substr($date,11,5);
       $hari = date("w",strtotime($date));
       $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;
       return $result;
   }
}