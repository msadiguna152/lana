    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="m-0 text-info">Data Penerimaan Obat / BMHP</h5>
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
                      <a href="<?= site_url('Barang_masuk/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Filter</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <?= $dari_tanggal!=NULL || $sampai_tanggal!=NULL ? '<p class="text text-center text-info">Data Penerimaan Dari Tanggal '.format_indo($dari_tanggal).' s/d '.format_indo($sampai_tanggal).'</p>' :'';?>
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th style="text-align: center; vertical-align: middle;">No</th>
                          <th style="text-align: center; vertical-align: middle;">Tanggal Penerimaan</th>
                          <th style="text-align: center; vertical-align: middle;">No. Dokumen / Faktur</th>
                          <th style="text-align: center; vertical-align: middle;">Nama PBF / Penyalur</th>
                          <th style="text-align: center; vertical-align: middle;">Nama Pabrik</th>
                          <th style="text-align: center; vertical-align: middle;">Sumber Dana</th>
                          <th style="text-align: center; vertical-align: middle;">Sumber Barang</th>
                          <th style="text-align: center; vertical-align: middle;">Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($barang_masuk->result() as $data) : ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= format_indo($data->tanggal_barang_masuk);?></td>
                          <td style="text-align: center; vertical-align: middle;"><a href="<?= site_url('Barang_masuk/rincian/');?>/<?= $data->id_barang_masuk;?>"><?= $data->no_dokumen;?></a></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_penyalur;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_pabrik;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_asal;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_sumber;?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <a class="text text-white  badge badge-primary" href="<?= site_url('Barang_masuk/update');?>/<?= $data->id_barang_masuk;?>/<?= $data->id_sumber;?>">
                              Ubah
                            </a>
                            <a class="text text-white  badge badge-danger tombol-hapus" href="<?= site_url('Barang_masuk/delete');?>/<?= $data->id_barang_masuk;?>">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form role="form" action="<?= site_url('Barang_masuk/index');?>" method="GET" enctype="multipart/form-data">
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
    