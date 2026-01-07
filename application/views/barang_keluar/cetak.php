<?php
$date = date('Y/m/d H:i:s');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Lembar Permintaan Obat/BMHP(".$date.").xls");
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
  <span>LEMBAR PERMINTAAN OBAT/BMHP</span><br><br>
  <span>Nama PKM : <?= $dtbarang_keluar['nama_puskesmas']; ?></span><br>
  <span>Alamat : <?= $dtbarang_keluar['alamat_puskesmas']; ?></span><br>
  <span>Sumber Barang : <?= $dtbarang_keluar['nama_sumber']; ?></span><br>
  <span>Tanggal Pengajuan : <?= format_indo($dtbarang_keluar['tanggal_pengajuan']); ?></span><br><br>

  <table>
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle;">No</th>
        <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
        <th style="text-align: center; vertical-align: middle;">Sediaan/ Satuan</th>
        <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
        <th style="text-align: center; vertical-align: middle;">Stok</th>
        <th style="text-align: center; vertical-align: middle;">Harga</th>
        <th style="text-align: center; vertical-align: middle;">Permintaan</th>
        <th style="text-align: center; vertical-align: middle;">Pemberian/ Stok Keluar</th>
        <th style="text-align: center; vertical-align: middle;">Rincian/ Keterangan</th>
        <th style="text-align: center; vertical-align: middle;">Expired Date</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($rincian_barang_keluar->result() as $data2) : 
      $ed = explode(',',$data2->ed_barang_keluar);
      sort($ed);
      ?>
      <tr>
        <td id="nomor" style="text-align: center; vertical-align: middle;width: 40px;"><?= $no;?></td>
        <td style="text-align: center; vertical-align: middle;width: 250px;">
          <?= $data2->nama_barang;?>
        </td>
        <td id="label_nama_satuan" style="text-align: center; vertical-align: middle;"><?= $data2->nama_satuan;?></td>
        <td id="label_klasifikasi" style="text-align: center; vertical-align: middle;"><?= $data2->klasifikasi;?></td>
        <td id="label_stok_barang" style="text-align: center; vertical-align: middle;"><?= $data2->stok_barang;?></td>
        <td id="label_harga_barang" style="text-align: center; vertical-align: middle;"><?= "Rp. " . number_format($data2->harga_barang,0,',','.');?></td>
        <td style="text-align: center; vertical-align: middle;">
          <?= $data2->permintaan;?>
        </td>

        <td style="text-align: center; vertical-align: middle;">
          <?= $data2->stok_barang_keluar;?>
        </td>
        <td style="text-align: center; vertical-align: middle;">
          <?= $data2->rincian;?>
        </td>
        <td style="text-align: center; vertical-align: middle;">
          <?php
          $olddate='';
          if ($data2->ed_barang_keluar!=NULL AND $data2->ed_barang_keluar!='-') {
            foreach ($ed as $item) {
              $newdate = $item;
              if ($newdate=='-') {
                echo "";
              } else {
                if (date("Y-m")>=$newdate) {
                  echo format_indo3($newdate)."; ";
                } else {
                  echo format_indo3($newdate)."; ";
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