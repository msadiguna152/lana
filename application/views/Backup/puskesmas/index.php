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
                      <a href="<?= site_url('Puskesmas/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama PKM</th>
                          <th>Alamat PKM</th>
                          <th>Jumlah Pustu</th>
                          <th>Jumlah Bidan Desa</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($puskesmas->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><b><a class="text text-info" href="<?= site_url('Puskesmas/rincian/');?><?= $data->id_puskesmas;?>"><?= $data->nama_puskesmas;?></a></b></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->alamat_puskesmas;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->jumlah_pustu;?> Unit</td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->jumlah_bidan_desa;?> Orang</td>
                          <td style="text-align: center; vertical-align: middle;">
                            <a class="text text-white badge badge-primary" href="<?= site_url('Puskesmas/update');?>/<?= $data->id_puskesmas;?>">
                              Ubah
                            </a>

                            <a class="text text-white badge badge-danger tombol-hapus" href="<?= site_url('Puskesmas/delete');?>/<?= $data->id_puskesmas;?>">
                              Hapus
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
    