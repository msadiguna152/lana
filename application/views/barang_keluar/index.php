<div class="content-wrapper">

  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h5 class="m-0 text-info">Data <?= $menu; ?></h5>
        </div>
        <div class="col-sm-6 text-right">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('konfirmasi'); ?>"></div>
          <div class="flash-data2" data-flashdata="<?= $menu; ?>"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <div class="row">

            <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
              <a href="<?= site_url('Barang_keluar/insert'); ?>" class="btn btn-info btn-block">
                Tambah Data
              </a>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
              <button class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
                Filter
              </button>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
              <button class="btn btn-info btn-block" data-toggle="modal" data-target="#modalCetak">
                Cetak Data
              </button>
            </div>

          </div>
        </div>

        <div class="card-body">

          <?php if ($dari_tanggal || $sampai_tanggal): ?>
            <p class="text-center text-info">
              Data Pengeluaran dari <?= format_indo($dari_tanggal); ?>
              s/d <?= format_indo($sampai_tanggal); ?>
            </p>
          <?php endif; ?>

          <div class="table-responsive">
            <table id="example2" class="table table-bordered table-hover w-100">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>No. Bukti</th>
                  <th>No. Berita Acara</th>
                  <th>Pemohon</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($barang_keluar->result() as $data): ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td class="text-center"><?= $data->no_bukti; ?></td>
                  <td class="text-center"><?= $data->no_berita_acara; ?></td>
                  <td class="text-center">
                    <b class="text-info"><?= $data->nama_pegawai ?? '-'; ?></b><br>
                    <?= $data->jenis_register ?? ''; ?> <?= $data->nip_no_reg ?? ''; ?>
                  </td>
                  <td class="text-center"><?= format_indo($data->tanggal_pengajuan); ?></td>
                  <td class="text-center">
                    <?php
                    $status = $data->status_barang_keluar;
                    $badge = [
                      'Diterima' => 'success',
                      'Diterima Sebagian' => 'primary',
                      'Ditolak' => 'danger'
                    ];
                    ?>
                    <span class="badge badge-pill badge-<?= $badge[$status] ?? 'warning'; ?>">
                      <?= $status ?? 'Menunggu'; ?>
                    </span>
                  </td>
                  <td class="text-center"><?= $data->keterangan_barang_keluar; ?></td>
                  <td class="text-center">

                    <a href="<?= site_url('Barang_keluar/rincian/'.$data->id_barang_keluar); ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Rincian">
                     <i class="bi bi-eye"></i>
                   </a>

                   <?php if ($levelUser !== "Operator"): ?>
                    <?php if (in_array($data->status_barang_keluar, ['Menunggu','Ditolak'])): ?>
                      <a href="<?= site_url('Barang_keluar/update/'.$data->id_barang_keluar); ?>" class="btn btn-warning btn-sm" title="Ubah">
                       <i class="bi bi-pencil"></i>
                     </a>
                     <a href="<?= site_url('Barang_keluar/delete/'.$data->id_barang_keluar); ?>" class="btn btn-danger btn-sm tombol-hapus" title="Hapus">
                       <i class="bi bi-trash"></i>
                     </a>
                   <?php endif; ?>
                 <?php else: ?>
                  <a href="<?= site_url('Barang_keluar/update/'.$data->id_barang_keluar); ?>" class="btn btn-warning btn-sm">
                   <i class="bi bi-pencil"></i>
                 </a>
                 <a href="<?= site_url('Barang_keluar/delete/'.$data->id_barang_keluar); ?>" class="btn btn-danger btn-sm tombol-hapus">
                   <i class="bi bi-trash"></i>
                 </a>
                 <a href="<?= site_url('Barang_keluar/cetak_permintaan/'.$data->id_barang_keluar); ?>" class="btn btn-primary btn-sm">
                   <i class="bi bi-printer"></i>
                 </a>
               <?php endif; ?>

             </td>
           </tr>
         <?php endforeach; ?>
       </tbody>
     </table>
   </div>

 </div>
</div>

</div>
</section>
</div>
