<!DOCTYPE html>
<html>
<head>
    <title>Cetak Rincian Transaksi</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 6px; text-align: center; }
        th { background: #eee; }
    </style>
</head>
<body onload="window.print()">

    <h3 align="center">RINCIAN TRANSAKSI BARANG</h3>

    <p>
        <b>Nama Barang</b> : <?= $barang->nama_barang ?><br>
        <b>Kode Barang</b> : <?= $barang->kode_barang ?><br>
        <b>Satuan</b> : <?= $barang->nama_satuan ?><br>
        <b>Periode</b> : <?= format_indo($dari) ?> s/d <?= format_indo($sampai) ?>
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rincian) == 0): ?>
                <tr>
                    <td colspan="5"><b>TIDAK ADA TRANSAKSI</b></td>
                </tr>
            <?php else: ?>
                <?php $no=1; foreach ($rincian as $r): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= format_indo($r['tanggal']) ?></td>
                    <td><?= $r['jenis'] ?></td>
                    <td><?= number_format($r['jumlah']) ?></td>
                    <td><?= $r['keterangan'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
