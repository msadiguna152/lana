<!DOCTYPE html>
<html>
<head>
  <title>Cetak Stok Barang</title>
  <style>
    @media print {
      .no-print { display: none; }
      @page {
        size: A4 landscape;
        margin: 1cm;
      }
    }
    body { font-family: Arial; }
    table { border-collapse: collapse; width: 100%; }
    table, th, td { border: 1px solid #000; }
    th, td { padding: 8px; text-align: center; }
    th { background-color: #eee; }
  </style>
</head>
<body onload="window.print()">

  <h3 align="center">LAPORAN STOK BARANG</h3>

  <table id="example2" width="100%" class="table table-bordered table-hover">
    <thead align="center">
      <tr>
        <th style="text-align: center; vertical-align: middle;">No</th>
        <th style="text-align: center; vertical-align: middle;">Kode Barang </th>
        <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
        <th>Stok Awal</th>
        <th>Barang Masuk</th>
        <th>Barang Keluar</th>
        <th>Stok Akhir</th>
        <th style="text-align: center; vertical-align: middle;">Satuan</th>
      </tr>
    </thead>
    <tbody style="text-align: left; vertical-align: top;">
      <?php $no=1; foreach ($last_query->result() as $data) : ?>
      <tr>
        <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
        <td style="text-align: center; vertical-align: middle;" style="mso-number-format:'\@';"><?= $data->kode_barang;?></td>
        <td style="text-align: center; vertical-align: middle;"><?= $data->nama_barang;?></td>
        <td style="text-align: center; vertical-align: middle;" style="mso-number-format:'\@';"><?= number_format($data->stok_barang-$data->total_masuk+$data->total_keluar) ?></td>

        <td style="text-align: center; vertical-align: middle;" style="mso-number-format:'\@';"><?= number_format($data->total_masuk) ?></td>
        <td style="text-align: center; vertical-align: middle;" style="mso-number-format:'\@';"><?= number_format($data->total_keluar) ?></td>
        <td style="text-align: center; vertical-align: middle;" style="mso-number-format:'\@';"><b><?= number_format($data->stok_akhir+$data->stok_barang-$data->total_masuk+$data->total_keluar) ?></b></td>
        <td style="text-align: center; vertical-align: middle;"><?= $data->nama_satuan;?></td>
      </tr>
      <?php $no++; endforeach;?>
    </tbody>
  </table>

  <!-- <div class="no-print" style="margin-top:15px">
    <strong>Last Query:</strong>
    <pre><?= $this->db->last_query(); ?></pre>
  </div> -->

</body>
</html>
