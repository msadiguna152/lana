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
                    <?php if ($this->session->userdata('level') === 'Operator') { ?>
                      <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
                        <a href="<?= site_url('Pegawai/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                      </div>
                    <?php };?>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama Pegawai</th>
                          <th>Pangkat/Golongan</th>
                          <th>Seksi</th>
                          <th>Jabatan</th>
                          <th>Status</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($pegawai->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><b><a class="text text-info"><?= $data->nama_pegawai;?></a></b><br><?= $data->jenis_register;?>. <?= $data->nip_no_reg;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_pangkat;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_bidang;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_jabatan;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?php if ($data->status_pegawai=="Aktif") { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Pegawai Aktif!" class="text badge-pill badge badge-success">Aktif</label>
                            <?php } else { ?>
                              <label data-toggle="tooltip" data-placement="top" title="Pegawai Non Aktif!" class="text badge-pill badge badge-danger">Non Aktif</label>
                            <?php }; ?>
                          </td>
                          <td style="text-align: center; vertical-align: middle;">

                            <a href="<?= site_url('Pegawai/update/'.$data->id_pegawai);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Ubah Data <?= $menu;?>">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <?php if ($this->session->userdata('level') === 'Operator') { ?>
                              <a href="<?= site_url('Pegawai/delete/'.$data->id_pegawai);?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Hapus Data <?= $menu;?>">
                                <i class="bi bi-trash"></i>
                              </a>
                            <?php };?>
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
    