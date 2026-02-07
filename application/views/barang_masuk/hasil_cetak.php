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
    #example2 th,
    #example2 td {
      text-align: center;
      vertical-align: middle;
    }
  </style>
</head>
<body onload="window.print()">

  <h3 align="center">LAPORAN STOK BARANG MASUK</h3>

  <table id="example2" width="100%" class="table table-bordered table-hover">
    <thead align="center">
      <tr>
        <th>No</th>
        <th>No Barang Masuk</th>
        <th>Tanggal</th>
        <th>No Bukti</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Barang Masuk</th>
        <th>Satuan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($last_query->result() as $data) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $data->no_barang_masuk; ?></td>
        <td><?= format_indo($data->tanggal_barang_masuk); ?></td>
        <td><?= $data->no_bukti; ?></td>
        <td><?= $data->kode_barang; ?></td>
        <td class="left"><?= $data->nama_barang; ?></td>
        <td><b><?= number_format($data->jumlah_masuk); ?></b></td>
        <td><?= $data->nama_satuan; ?></td>
      </tr>
      <?php $no++; endforeach;?>
    </tbody>
  </table>

  <div class="no-print" style="margin-top:15px">
    <strong>Last Query:</strong>
    <pre><?= $this->db->last_query(); ?></pre>
  </div>

</body>
</html>
