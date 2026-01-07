    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="m-0 text-info"><?= $menu; ?></h5>
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('konfirmasi');?>"></div>

            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-3 col-xl-3 col-sm-6">

            </div>

            <section class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <label class=" m-0 text-info">Data Pengajuan Barang</label>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th style="text-align: center; vertical-align: middle;">No</th>
                          <th style="text-align: center; vertical-align: middle;">No. Bukti</th>
                          <th style="text-align: center; vertical-align: middle;">No. Berita Acara</th>
                          <th style="text-align: center; vertical-align: middle;">Pemohon</th>
                          <th style="text-align: center; vertical-align: middle;">Tanggal Pengajuan</th>
                          <th style="text-align: center; vertical-align: middle;">Status</th>
                          <th style="text-align: center; vertical-align: middle;">Keterangan</th>
                          <th style="text-align: center; vertical-align: middle;">Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($barang_keluar->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->no_bukti;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->no_berita_acara;?></td>
                          <td style="text-align: center; vertical-align: middle;"><b><a class="text text-info"><?= $data->nama_pegawai;?></a></b><br><?= $data->jenis_register;?>. <?= $data->nip_no_reg;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= format_indo($data->tanggal_pengajuan);?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?php if ($data->status_barang_keluar=="Diterima") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Barang Diterima!" class="text badge-pill badge badge-success">Diterima</label>
                            <?php } elseif ($data->status_barang_keluar=="Diterima Sebagian") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Barang Diterima Sebagian!" class="text badge-pill badge badge-primary">Diterima Sebagian</label>
                            <?php } elseif ($data->status_barang_keluar=="Ditolak") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Barang Ditolak!" class="text badge-pill badge badge-danger">Ditolak</label>
                            <?php } else { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Barang Menunggu!" class="text badge-pill badge badge-warning">Menunggu</label>
                            <?php }; ?>
                          </td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->keterangan_barang_keluar;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <a class="btn btn-primary btn-sm" href="<?= site_url('Barang_keluar/update');?>/<?= $data->id_barang_keluar;?>">
                              <i class="bi bi-check-circle"> </i> Konfirmasi
                            </a>
                          </td>
                        </tr>
                        <?php $no++; endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.card-body -->
              </div>
            </section>
          </div>

        </div>


      </section>
      <!-- /.content -->
    </div>
    