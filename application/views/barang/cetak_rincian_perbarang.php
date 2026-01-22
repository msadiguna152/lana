<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Rincian Transaksi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px;
            text-align: center;
            vertical-align: middle;
        }
        th {
            background-color: #eee;
        }
        .info {
            margin-bottom: 10px;
        }
        .info b {
            display: inline-block;
            width: 120px;
        }
    </style>
</head>

<body onload="window.print()">

<h3>RINCIAN TRANSAKSI BARANG</h3>

<div class="info">
    <div><b>Nama Barang</b>: <?= $barang->nama_barang ?></div>
    <div><b>Kode Barang</b>: <?= $barang->kode_barang ?></div>
    <div><b>Satuan</b>: <?= $barang->nama_satuan ?></div>
    <div><b>Periode</b>: <?= format_indo($dari) ?> s/d <?= format_indo($sampai) ?></div>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No. Bukti</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Jumlah Akhir</th>
            <th>Pemohon</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>

    <?php if (count($rincian) == 0): ?>
        <tr>
            <td colspan="8"><b>TIDAK ADA TRANSAKSI</b></td>
        </tr>
    <?php else: ?>

        <?php 
        $no    = 1;
        $saldo = 0;

        foreach ($rincian as $r):

            if ($r['jenis'] === 'Masuk') {
                $saldo += (int) $r['jumlah'];
            } else {
                $saldo -= (int) $r['jumlah'];
            }
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= format_indo($r['tanggal']) ?></td>
            <td><?= $r['no_bukti'] ?></td>
            <td><?= $r['jenis'] ?></td>
            <td><?= number_format($r['jumlah']) ?></td>
            <td><b><?= number_format($saldo) ?></b></td>
            <td><?= !empty($r['nama_pegawai']) ? $r['nama_pegawai'] : '-' ?></td>
            <td><?= $r['keterangan'] ?></td>
        </tr>
        <?php endforeach; ?>

    <?php endif; ?>

    </tbody>
</table>

</body>
</html>
