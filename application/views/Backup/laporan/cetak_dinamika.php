<?php
$date = date('Y/m/d H:i:s');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Dinamika IFK Kab. Tanah Laut(".$date.").xls");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
    body{
      font-family: sans-serif;
    }
    table{
      margin: 20px auto;
      border-collapse: collapse;
    }
    table th,
    table td{
      border: 1px solid #3c3c3c;
      padding: 3px 8px;

    }
    a{
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }
  </style>
</head>
<body>
  <span>DINAMIKA LOGISTIK OBAT DAN ALAT KESEHATAN</span><br>
  <span>INSTALASI FARMASI KABUPATEN / KOTA</span><br><br>
  <span>Provinsi : Kalimantan Selatan</span><br>
  <span>Kab/Kota : Tanah Laut</span><br>
  <span>Alamat : Jl. H. Boejasin No. 9 Pelaihari</span><br>
  <span>Jumlah PKM : 22 (Dua Puluh Dua)</span><br>
  <span>Bulan / Tahun : Agustus / 2023</span><br>
  <span>Tanggal : 31 Agustus 2023</span><br><br>

  <table>
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle;width: 30px;">No</th>
        <th style="text-align: center; vertical-align: middle;">Sumber Barang</th>
        <th style="text-align: center; vertical-align: middle;width: 200px;">Nama Obat</th>
        <th style="text-align: center; vertical-align: middle;">Sediaan/ Satuan</th>
        <th style="text-align: center; vertical-align: middle;width: 100px;">Stok Awal</th>
        <th style="text-align: center; vertical-align: middle;width: 100px;">Penerimaan</th>
        <th style="text-align: center; vertical-align: middle;width: 100px;">Pemakaian Rata-rata/ Bulan</th>
        <th style="text-align: center; vertical-align: middle;width: 100px;">Pengeluaran</th>
        <th style="text-align: center; vertical-align: middle;width: 100px;">Sisa Stok</th>
        <th style="text-align: center; vertical-align: middle;width: 100px;">Tingkat Kecukupan</th>
        <th style="text-align: center; vertical-align: middle;">Keterangan (ED)</th>
      </tr>
      <tr>
        <th style="text-align: center; vertical-align: middle;">1</th>
        <th style="text-align: center; vertical-align: middle;">2</th>
        <th style="text-align: center; vertical-align: middle;">3</th>
        <th style="text-align: center; vertical-align: middle;">4</th>
        <th style="text-align: center; vertical-align: middle;">5</th>
        <th style="text-align: center; vertical-align: middle;">6</th>
        <th style="text-align: center; vertical-align: middle;">7=(4+5)-8</th>
        <th style="text-align: center; vertical-align: middle;">8=(4+5)-7</th>
        <th style="text-align: center; vertical-align: middle;">9=8/6</th>
        <th style="text-align: center; vertical-align: middle;">10</th>
        <th style="text-align: center; vertical-align: middle;">11</th>

      </tr>
    </thead>
    <tbody style="text-align: left; vertical-align: top;">

      <?php $no=1;
      foreach ($laporan->result() as $data) :
        $ed = explode(',',$data->ed_barang);
        sort($ed);
        $filter = explode("-",$bulan_tahun);
        $bulan = $filter['1'];
        $tahun = $filter['0'];
        $cstok_masuk = $this->db->query("SELECT SUM(rincian_barang_masuk.stok_barang_masuk) AS stok_masuk FROM `barang_masuk` JOIN rincian_barang_masuk ON rincian_barang_masuk.id_barang_masuk=barang_masuk.id_barang_masuk WHERE rincian_barang_masuk.id_barang='$data->id_barang' AND MONTH(barang_masuk.tanggal_barang_masuk)='$bulan' AND YEAR(barang_masuk.tanggal_barang_masuk)='$tahun' GROUP BY rincian_barang_masuk.id_barang")->row_array();

        $cstok_keluar = $this->db->query("SELECT SUM(rincian_barang_keluar.stok_barang_keluar) AS stok_keluar FROM `barang_keluar` JOIN rincian_barang_keluar ON rincian_barang_keluar.id_barang_keluar=barang_keluar.id_barang_keluar WHERE rincian_barang_keluar.id_barang='$data->id_barang' AND MONTH(barang_keluar.tanggal_barang_keluar)='$bulan' AND YEAR(barang_keluar.tanggal_barang_keluar)='$tahun' GROUP BY rincian_barang_keluar.id_barang")->row_array();
        ?>
        <tr>
          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_sumber;?></td>
          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_barang;?></td>
          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_satuan;?></td>
          <td style="text-align: center; vertical-align: middle;"><?= $cstok_keluar['stok_keluar']+$data->stok_barang-$cstok_masuk['stok_masuk'];?></td>
          <td style="text-align: center; vertical-align: middle;"><?= $cstok_masuk['stok_masuk'];?></td>
          <td style="text-align: center; vertical-align: middle;"></td>
          <td style="text-align: center; vertical-align: middle;"><?= $cstok_keluar['stok_keluar'];?></td>
          <td style="text-align: center; vertical-align: middle;"><?= $data->stok_barang;?></td>
          <td style="text-align: center; vertical-align: middle;"></td>
          <td style="text-align: center; vertical-align: middle;">
            <?php
            $olddate='';
            if ($data->ed_barang!=NULL AND $data->ed_barang!='-') {
              foreach ($ed as $item) {
                $newdate = $item;
                if ($newdate=='-') {
                  echo "";
                } else {
                  if (date("Y-m")>=$newdate) {
                    echo format_indo3($newdate).';';
                  } else {
                    echo format_indo3($newdate).';';
                  }
                  $olddate = $newdate;
                }
              };
            } else {
              echo "-";
            };
            ?>
          </td>
        </tr>
        <?php $no++; endforeach;?>
      </tbody>
    </table>
  </body>
  </html>