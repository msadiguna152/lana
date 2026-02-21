<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cetak Permintaan Barang Persediaan</title>
  <style>
    @media print {
      @page {
        size: A4 portrait; /* ganti landscape jika perlu */
        margin: 20mm;
      }

      .page-break {
        page-break-before: always;
      }

      body {
        font-family: "Times New Roman", serif;
        font-size: 12px;
      }
      .center {
        text-align: center;
      }
      .right {
        text-align: right;
      }
      .bold {
        font-weight: bold;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
      }
      table, th, td {
        border: 1px solid #000;
      }
      th, td {
        padding: 4px;
        vertical-align: top;
      }
      .no-border, .no-border td {
        border: none;
      }
      .ttd {
        margin-top: 10px;
        width: 100%;
      }
      .ttd td {
        border: none;
        text-align: center;
        padding-top: 10px;
      }
      hr {
        border: 1px solid #000;
        margin: 20px 0;
      }
    </style>
  </head>

  <body onload="window.print()">

<!-- ================= PERMINTAAN ================= -->

<p class="center bold">
  PERMINTAAN BARANG PERSEDIAAN<br>
  KANTOR PERTANAHAN KABUPATEN TANAH LAUT
</p>

<p class="right">Pelaihari, <?= format_indo4($dtbarang_keluar['tanggal_barang_keluar']) ?></p>

<table class="no-border">
  <tr>
    <td width="20%">Nomor Urut</td>
    <td width="2%">:</td>
    <td><?= $dtbarang_keluar['no_bukti']; ?></td>
  </tr>
</table>

<p>
  Dengan ini menyampaikan permohonan permintaan barang persediaan dengan rincian sebagai berikut:
</p>

<table>
  <thead class="center bold">
    <tr>
      <th width="5%">NO</th>
      <th>NAMA BARANG (SATUAN)</th>
      <th width="10%">JUMLAH</th>
      <th width="20%">KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($rincian_barang_keluar->result() as $b): ?>
    <tr>
      <td class="center"><?= $no++ ?></td>
      <td><?= $b->nama_barang ?> (<?= $b->nama_satuan ?>)</td>
      <td class="center"><?= number_format($b->stok_barang_keluar) ?></td>
      <td><?= $b->rincian ?></td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>

<p>Demikian permohonan ini disampaikan, terimakasih.</p>

<table class="ttd no-border">
  <tr>
    <td>
      Dibuat Oleh,<br>
      <?= $dtbarang_keluar['nama_jabatan']; ?><br><br><br>
      <u><?= $dtbarang_keluar['nama_pegawai']; ?></u><br>
      <?= $dtbarang_keluar['jenis_register']; ?>. <?= $dtbarang_keluar['nip_no_reg']; ?>
    </td>

    <?php
    $this->db->select('*');
    $this->db->from('pegawai');
    $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
    $this->db->where('pegawai.id_bidang',$dtbarang_keluar['id_bidang']);
    $this->db->like('LOWER(jabatan.nama_jabatan)', 'kepala');
    $ttd_penyetuju = $this->db->get()->row_array();
    ?>
    <td>
      Mengetahui,<br>
      <?= $ttd_penyetuju['nama_jabatan']; ?><br><br><br>
      <u><?= $ttd_penyetuju['nama_pegawai']; ?></u><br>
      <?= $ttd_penyetuju['jenis_register']; ?>. <?= $ttd_penyetuju['nip_no_reg']; ?>
    </td>
  </tr>
</table>

<div class="page-break"></div>

<!-- ================= BERITA ACARA ================= -->

<p class="center bold">
  BERITA ACARA SERAH TERIMA<br>
  PERMINTAAN BARANG PERSEDIAAN<br>
  KANTOR PERTANAHAN KABUPATEN TANAH LAUT<br>
  NOMOR : <?= $dtbarang_keluar['no_berita_acara']; ?>
</p>

<table>
  <thead class="center bold">
    <tr>
      <th width="5%">NO</th>
      <th width="25%">KODE BARANG</th>
      <th>NAMA BARANG (SATUAN)</th>
      <th width="10%">JUMLAH</th>
      <th width="20%">KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($rincian_barang_keluar->result() as $b): ?>
    <tr>
      <td class="center"><?= $no++ ?></td>
      <td><?= $b->kode_barang ?></td>
      <td><?= $b->nama_barang ?> (<?= $b->nama_satuan ?>)</td>
      <td class="center"><?= number_format($b->stok_barang_keluar) ?></td>
      <td><?= $b->rincian ?></td>
    </tr>
  <?php endforeach; ?>
</tbody>
</tbody>
</table>

<p class="right">Pelaihari, <?= format_indo4($dtbarang_keluar['tanggal_barang_keluar']) ?></p>

<table class="ttd no-border">
  <tr>
    <td style="width: 50%;">
      Diserahkan Oleh,<br>
      <?= $ttd['jabatan_diserahkan_b1']; ?><br><?= $ttd['jabatan_diserahkan_b2']; ?><br><br><br><br>
      <u><?= $ttd['nama_diserahkan']; ?></u><br>
      NIP. <?= $ttd['nip_diserahkan']; ?>
    </td>
    <td style="width: 50%;">
      Diterima Oleh,<br>
      <?= $dtbarang_keluar['nama_jabatan']; ?><br><br><br><br><br>
      <u><?= $dtbarang_keluar['nama_pegawai']; ?></u><br>
      <?= $dtbarang_keluar['jenis_register']; ?>. <?= $dtbarang_keluar['nip_no_reg']; ?>
    </td>
  </tr>
</table>

<p class="center">
  Mengetahui,<br>
  <?= $ttd['jabatan_mengetahui_b1']; ?><br><?= $ttd['jabatan_mengetahui_b2']; ?><br><br><br><br>
  <u><?= $ttd['nama_mengetahui']; ?></u><br>
  NIP. <?= $ttd['nip_mengetahui']; ?>
</p>

</body>
</html>
