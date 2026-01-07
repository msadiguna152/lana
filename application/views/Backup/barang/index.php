    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Data Obat / BMHP IFK</h5>
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
                      <a href="<?= site_url('Barang/insert')?>" class="btn btn-block btn-info">Tambah Data</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-1">
                      <a data-toggle="modal" data-target="#exampleModal"class="btn btn-block btn-info">Filter</a>
                    </div>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" width="100%" class="table table-bordered table-hover">
                      <thead align="center">
                        <tr>
                          <th style="text-align: center; vertical-align: middle;">No</th>
                          <th style="text-align: center; vertical-align: middle;">Sumber</th>
                          <th style="text-align: center; vertical-align: middle;">Nama</th>
                          <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                          <th style="text-align: center; vertical-align: middle;">Sediaan / Satuan</th>
                          <th style="text-align: center; vertical-align: middle;">Harga</th>
                          <th style="text-align: center; vertical-align: middle;">Stok</th>
                          <th style="text-align: center; vertical-align: middle;">Expired Date</th>
                          <th style="text-align: center; vertical-align: middle;">Opsi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">
                        <?php $no=1; foreach ($barang->result() as $data) : 
                        $ed = explode(',',$data->ed_barang);
                        sort($ed);
                        ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_sumber;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_barang;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->klasifikasi;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->nama_satuan;?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->harga_barang!=NULL ? "Rp. " . number_format($data->harga_barang,0,',','.') : 'Rp. 0';?></td>
                          <td style="text-align: center; vertical-align: middle;"><?= $data->stok_barang!=NULL ? number_format($data->stok_barang,0,',','.') : '0';?></td>
                          <td style="text-align: center; vertical-align: middle;">
                            <?php
                            $olddate='';
                            if ($data->ed_barang!=NULL AND $data->ed_barang!='-') {
                              foreach ($ed as $item) {
                                $newdate = $item;
                                if ($newdate=='-') {
                                  echo "";
                                } else {
                                  if (date("Y-m")>=$newdate) {
                                    echo '<label data-toggle="tooltip" data-placement="top" title="Sudah Memasuki Expired Date!" class="text badge-pill badge badge-danger">'.format_indo3($newdate).'</label><br>';
                                  } else {
                                    echo '<label data-toggle="tooltip" data-placement="top" title="Belum Memasuki Expired Date!" class="text badge-pill badge badge-success">'.format_indo3($newdate).'</label><br>';
                                  }
                                  $olddate = $newdate;
                                }
                              };
                            } else {
                              echo "-";
                            };
                            ?>
                          </td>

                          <td style="text-align: center; vertical-align: middle;">
                            <a class="text text-white  badge badge-primary" href="<?= site_url('Barang/update');?>/<?= $data->id_barang;?>">
                              Ubah
                            </a>

                            <a class="text text-white  badge badge-danger tombol-hapus" href="<?= site_url('Barang/delete');?>/<?= $data->id_barang;?>">
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

    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form role="form" action="<?= site_url('Barang/index');?>" method="GET" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-body">
              <div class="form-group">
                <label for="bulan_tahun">Sumber Barang</label>
                <select class="form-control select2bs4" style="width: 100%;" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
                  <option >Pilih Sumber Barang</option>
                  <option value="Semua">Semua</option>
                  <?php foreach ($sumber->result() as $dtsumber) : ?>
                    <option value="<?= $dtsumber->id_sumber?>"><?= $dtsumber->nama_sumber?></option>
                  <?php endforeach;?>
                </select>
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
    