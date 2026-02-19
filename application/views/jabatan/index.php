    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Data <?= $menu; ?></h5>
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
                      <a href="<?= site_url('Jabatan/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                    </div>
                    <!-- <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Import Data</a>
                    </div> -->
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama Jabatan</th>
                          <th>Seksi</th>
                          <th>Keterangan Jabatan</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($jabatan->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_jabatan;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_bidang;?></td>

                          <td style="text-align: center; vertical-align: middle;"><?= $data->keterangan_jabatan;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <a href="<?= site_url('Jabatan/update/'.$data->id_jabatan);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Ubah Data <?= $menu;?>">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <a href="<?= site_url('Jabatan/delete/'.$data->id_jabatan);?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Hapus Data <?= $menu;?>">
                              <i class="bi bi-trash"></i>
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
        <form role="form" action="<?= site_url('Jabatan/import_excel');?>" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <div class="form-group">
                <label for="id_asal">Pilih File Excel (<a href="<?= base_url();?>excel/import_jabatan2.xlsx">Unduh Format</a>)</label>
                <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control-file" name="file"  required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-info">Import File</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    