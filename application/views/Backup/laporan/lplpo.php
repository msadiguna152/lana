    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="m-0 text-info">Laporan Pemakaian dan Lembar Permintaan Obat <?= $bulan_tahun!=NULL ? '('.format_indo2($bulan_tahun).')' :'';?></h5>
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
                      <a target="_BLANK" href="<?= site_url('Laporan/cetak_dinamika')?>" class="btn btn-block btn-info">Cetak</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Filter</a>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                  <div class="">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th style="text-align: center; vertical-align: middle;">No</th>
                          <th style="text-align: center; vertical-align: middle;">Nama PKM</th>
                          <th style="text-align: center; vertical-align: middle;">File</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">

                        <?php $no=1; foreach ($laporan->result() as $data) : ?>
                          <tr>
                            <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $data->nama_puskesmas;?></td>
                            <td style="text-align: center; vertical-align: middle;">Download</td>
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
          <form role="form" action="<?= site_url('Laporan/index');?>" method="GET" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-body">
                <div class="form-group">
                  <label for="bulan_tahun">Pilih bulan dan tahun</label>
                  <input type="month" class="form-control" name="bulan_tahun">
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
