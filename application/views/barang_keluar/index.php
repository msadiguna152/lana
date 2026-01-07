    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
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
                      <a href="<?= site_url('Barang_keluar/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Filter</a>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <?= $dari_tanggal!=NULL || $sampai_tanggal!=NULL ? '<p class="text text-center text-info">Data Pengeluaran Dari Tanggal '.format_indo($dari_tanggal).' s/d '.format_indo($sampai_tanggal).'</p>' :'';?>
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

                            <a href="<?= site_url('Barang_keluar/rincian/'.$data->id_barang_keluar);?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Rincian Data <?= $menu;?>">
                              <i class="bi bi-eye"></i>
                            </a>

                            <?php if ($levelUser!="Operator"){ ?>
                              <?php if ($data->status_barang_keluar=="Menunggu" OR $data->status_barang_keluar=="Ditolak"): ?>
                                <a href="<?= site_url('Barang_keluar/update/'.$data->id_barang_keluar);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Ubah Data <?= $menu;?>">
                                  <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= site_url('Barang_keluar/delete/'.$data->id_barang_keluar);?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Hapus Data <?= $menu;?>">
                                  <i class="bi bi-trash"></i>
                                </a>
                              <?php endif; ?>
                            <?php } else { ?>
                              <a href="<?= site_url('Barang_keluar/update/'.$data->id_barang_keluar);?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Ubah Data <?= $menu;?>">
                                <i class="bi bi-pencil"></i>
                              </a>
                              <a href="<?= site_url('Barang_keluar/delete/'.$data->id_barang_keluar);?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Hapus Data <?= $menu;?>">
                                <i class="bi bi-trash"></i>
                              </a>
                            <?php }; ?>
                            
                          </td>
                        </tr>
                        <?php $no++; endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.card-body -->
              </div>
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
        <form role="form" action="<?= site_url('Barang_keluar/index');?>" method="GET" enctype="multipart/form-data">
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
