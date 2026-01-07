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
                    <div class="col-lg-2 col-md-6 col-sm-12">
                      <a href="<?= site_url('Pengguna/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama Pengguna</th>
                          <th>Username</th>
                          <th>Level</th>
                          <th>Foto Profil</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($pengguna->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_pengguna;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->username;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->level;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <img width="100px" height="120px" class="img img-fluid" src="<?= site_url();?>profil/<?= $data->foto_pengguna;?>">
                          </td>
                          <td style="text-align: center; vertical-align: middle;">
                            <a href="<?= site_url('Pengguna/update/'.$data->id_pengguna);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Ubah Data <?= $menu;?>">
                              <i class="bi bi-pencil"></i>
                            </a>

                            <a href="<?= site_url('Pengguna/delete/'.$data->id_pengguna);?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Hapus Data <?= $menu;?>">
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
    