    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Cetak Data <?= $menu; ?></h5>
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
                    <div class="col-lg-2 col-md-6 col-sm-12">
                      <a onclick="history.back(-1)" name="reset"  class="btn btn-block btn-info">Kembali</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Filter</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                      <button class="btn btn-block btn-info" data-toggle="modal" data-target="#downloadModal">
                        Download Laporan
                      </button>
                    </div>


                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <!-- <?= $last_query;?> -->
                  <?= $dari_tanggal!=NULL || $sampai_tanggal!=NULL ? '<p class="text text-center h4">Laporan Data Barang <br>Dari Tanggal '.format_indo($dari_tanggal).' s/d '.format_indo($sampai_tanggal).'</p>' :'';?>
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th style="text-align: center; vertical-align: middle;">No</th>
                          <th style="text-align: center; vertical-align: middle;">Kode Barang </th>
                          <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                          <th>Stok Awal</th>
                          <th>Barang Masuk</th>
                          <th>Barang Keluar</th>
                          <th>Stok Akhir</th>
                          <th style="text-align: center; vertical-align: middle;">Satuan</th>
                          <!-- <th style="text-align: center; vertical-align: middle;">Harga</th> -->
                          <th style="text-align: center; vertical-align: middle;">Deskripsi</th>
                          <th style="text-align: center; vertical-align: middle;">Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($barang->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->kode_barang;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_barang;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= number_format($data->stok_barang-$data->total_masuk+$data->total_keluar) ?></td>

                          <td style="text-align: center; vertical-align: middle;"><?= number_format($data->total_masuk) ?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= number_format($data->total_keluar) ?></td>
                          <td style="text-align: center; vertical-align: middle;"><b><?= number_format($data->stok_akhir+$data->stok_barang-$data->total_masuk+$data->total_keluar) ?></b></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_satuan;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->deskripsi;?></td>
                          <td style="text-align: center; vertical-align: middle;"><a href="<?= site_url('Barang/cetak_rincian_perbarang?id_barang='.$data->id_barang.'&dari='.$dari_tanggal.'&sampai='.$sampai_tanggal)?>" target="_BLANK">Cetak</a></td>
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
        <form role="form" action="<?= site_url('Barang/cetak');?>" method="GET" enctype="multipart/form-data">
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

    <div class="modal fade" id="downloadModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">

          <div class="modal-header bg-gradient-info text-white">
            <h5 class="modal-title font-weight-bold">
              <i class="fas fa-download mr-2"></i> Download Laporan
            </h5>
            <button type="button" class="close text-white" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

          <div class="modal-body text-center py-4">
            <p class="mb-4 text-muted">
              Pilih format file yang ingin diunduh
            </p>
            <div class="row justify-content-center">
              <!-- PDF -->
              <div class="col-5">
                <a href="<?= site_url('Barang/hasil_cetak')?>" target="_blank" class="download-box pdf-box">
                  <i class="fas fa-file-pdf fa-4x"></i>
                  <h6 class="mt-3">PDF</h6>
                </a>
              </div>

              <!-- EXCEL -->
              <div class="col-5">
                <a href="<?= site_url('Barang/hasil_cetak2')?>" target="_blank" class="download-box excel-box">
                  <i class="fas fa-file-excel fa-4x"></i>
                  <h6 class="mt-3">Excel</h6>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

