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
                      <a data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-info">Filter</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                      <a href="<?= site_url('Barang_masuk/hasil_cetak')?>" target="_blank" class="btn btn-block btn-info">Cetak Semua</a>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <!-- <?= $last_query;?> -->
                  <?= $dari_tanggal!=NULL || $sampai_tanggal!=NULL ? '<p class="text text-center text-info">Laporan Data Barang Dari Tanggal '.format_indo($dari_tanggal).' s/d '.format_indo($sampai_tanggal).'</p>' :'';?>
                  <div class="table-responsive">
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
                          <th>Deskripsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($barang_masuk->result() as $data) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data->no_barang_masuk; ?></td>
                          <td><?= format_indo($data->tanggal_barang_masuk); ?></td>
                          <td><?= $data->no_bukti; ?></td>
                          <td><?= $data->kode_barang; ?></td>
                          <td class="left"><?= $data->nama_barang; ?></td>
                          <td><b><?= number_format($data->jumlah_masuk); ?></b></td>
                          <td><?= $data->nama_satuan; ?></td>
                          <td class="left"><?= $data->deskripsi; ?></td>
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
        <form role="form" action="<?= site_url('Barang_masuk/cetak');?>" method="GET" enctype="multipart/form-data">
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

    