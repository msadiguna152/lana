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
      <?php
      $data = $last_query->result();

      // Kelompokkan berdasarkan no_barang_masuk
      $grouped = [];
      foreach ($data as $row) {
        $grouped[$row->no_barang_masuk][] = $row;
      }

      $no = 1;
      foreach ($grouped as $no_barang_masuk => $items):
        $rowspan = count($items);
        $first = true;

        foreach ($items as $row):
          ?>
          <tr>
            <?php if ($first): ?>
              <td rowspan="<?= $rowspan ?>"><?= $no++; ?></td>

              <!-- Paksa jadi text supaya 0 tetap terbaca -->
              <td rowspan="<?= $rowspan ?>" style="mso-number-format:'\@';">
                <?= $row->no_barang_masuk; ?>
              </td>

              <td rowspan="<?= $rowspan ?>">
                <?= format_indo($row->tanggal_barang_masuk); ?>
              </td>

              <td rowspan="<?= $rowspan ?>" style="mso-number-format:'\@';">
                <?= $row->no_bukti; ?>
              </td>
            <?php endif; ?>

            <td><?= $row->kode_barang; ?></td>
            <td class="left"><?= $row->nama_barang; ?></td>
            <td><b><?= number_format($row->jumlah_masuk); ?></b></td>
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
  </div> -->

</body>
</html>
