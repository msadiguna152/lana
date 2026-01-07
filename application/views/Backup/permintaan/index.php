    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="m-0 text-info">Daftar Permintaan PKM</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('konfirmasi');?>"></div>
                <div class="flash-data2" data-flashdata="<?= $menu; ?>"></div>             
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <section class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Filter</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <?= $dari_tanggal!=NULL || $sampai_tanggal!=NULL ? '<p class="text text-center text-info">Data Permintaan PKM Dari Tanggal '.format_indo($dari_tanggal).' s/d '.format_indo($sampai_tanggal).'</p>' :'';?>
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>No. Permintaan</th>
                          <th>PKM</th>
                          <th>Tanggal Keluar</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($barang_keluar->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><a href="<?= site_url('Permintaan/rincian');?>/<?= $data->id_barang_keluar;?>"><?= $data->no_permintaan;?></a></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_puskesmas;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?= $data->tanggal_barang_keluar!=NULL ? format_indo($data->tanggal_barang_keluar) : '-';?>
                          </td>
                          <td style="text-align: center; vertical-align: middle;"><?= format_indo($data->tanggal_pengajuan);?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?php if ($data->status_barang_keluar=="Selesai") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Obat / BMHP Selesai!" class="text badge-pill badge badge-success">Selesai</label>
                            <?php } elseif ($data->status_barang_keluar=="Diproses") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Obat / BMHP Masih Dalam Proses!" class="text badge-pill badge badge-primary">Diproses</label>
                            <?php } elseif ($data->status_barang_keluar=="Terkonfirmasi") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Obat / BMHP Sudah Dikonfirmasi Admin IFK!" class="text badge-pill badge badge-info">Terkonfirmasi</label>
                            <?php } else { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Permintaan Obat / BMHP Belum Dikonfirmasi Admin IFK!" class="text badge-pill badge badge-warning">Belum Dikonfirmasi</label>
                            <?php }; ?>
                          </td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->keterangan_barang_keluar;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <a class="text text-white  badge badge-primary" href="<?= site_url('Permintaan/update');?>/<?= $data->id_barang_keluar;?>">
                              Tanggapi
                            </a>
                            <a class="text text-white  badge badge-info" href="<?= site_url('Barang_keluar/cetak');?>/<?= $data->id_barang_keluar;?>">
                              Cetak
                            </a>

                          </td>
                        </tr>
                        <?php $no++; endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->

            </section>
            <!-- /.Left col -->

          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form role="form" action="<?= site_url('Permintaan/index');?>" method="GET" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <div class="form-group">
                <label for="dari_tanggal">Dari Tanggal</label>
                <input type="date" class="form-control" name="dari_tanggal" required>
              </div>
              <div class="form-group">
                <label for="sampai_tanggal">Sampai Tanggal</label>
                <input type="date" class="form-control" name="sampai_tanggal" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-info">Tampilkan Data</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    