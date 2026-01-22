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

  <h3 align="center">LAPORAN STOK BARANG KELUAR</h3>

  <table id="example2" width="100%" class="table table-bordered table-hover">
    <thead align="center">
      <tr>
        <th>No</th>
        <th>No Berita Acara</th>
        <th>No Bukti</th>
        <th>Tanggal</th>
        <th>Pemohon</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Barang Keluar</th>
        <th>Satuan</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody style="text-align: left; vertical-align: top;">
      <?php $no=1; foreach ($last_query->result() as $row) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row->no_berita_acara; ?></td>
        <td><?= $row->no_bukti; ?></td>
        <td><?= format_indo($row->tanggal_barang_keluar); ?></td>
        <td class="left"><?= $row->nama_pegawai; ?></td>
        <td><?= $row->kode_barang; ?></td>
        <td class="left"><?= $row->nama_barang; ?></td>
        <td><b><?= number_format($row->jumlah_keluar); ?></b></td>
        <td><?= $row->nama_satuan; ?></td>
        <td class="left"><?= $row->keterangan_barang_keluar; ?></td>
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
