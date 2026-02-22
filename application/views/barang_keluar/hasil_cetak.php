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
      </tr>
    </thead>
    <tbody style="text-align: left; vertical-align: top;">
      <?php
      $data = $last_query->result();

      $grouped = [];
      foreach ($data as $row) {
        $grouped[$row->no_bukti][] = $row;
      }

      $no = 1;
      foreach ($grouped as $no_bukti => $items):
        $rowspan = count($items);
        $first = true;

        foreach ($items as $row):
          ?>
          <tr>
            <?php if ($first): ?>
              <td rowspan="<?= $rowspan ?>"><?= $no++; ?></td>
              <td rowspan="<?= $rowspan ?>"><?= $row->no_berita_acara; ?></td>
              <td rowspan="<?= $rowspan ?>"><?= $row->no_bukti; ?></td>
              <td rowspan="<?= $rowspan ?>"><?= format_indo($row->tanggal_barang_keluar); ?></td>
              <td rowspan="<?= $rowspan ?>" class="left"><?= $row->nama_pegawai; ?></td>
            <?php endif; ?>

            <td><?= $row->kode_barang; ?></td>
            <td class="left"><?= $row->nama_barang; ?></td>
            <td><b><?= number_format($row->jumlah_keluar); ?></b></td>
            <td><?= $row->nama_satuan; ?></td>
          </tr>
          <?php
          $first = false;
        endforeach;
      endforeach;
      ?>
    </tbody>
  </table>

  <!-- <div class="no-print" style="margin-top:15px">
    <strong>Last Query:</strong>
    <pre><?= $this->db->last_query(); ?></pre>
  </div>
 -->
</body>
</html>
