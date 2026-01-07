    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="m-0 text-info">Dinamika Logistik obat & BMHP <?= $bulan_tahun!=NULL ? '('.format_indo2($bulan_tahun).')' :'';?></h5>
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
                      <a target="_BLANK" href="<?= site_url('Laporan/test_excel')?>" class="btn btn-block btn-info">Cetak</a>
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
                          <th style="text-align: center; vertical-align: middle;">Sumber Barang</th>
                          <th style="text-align: center; vertical-align: middle;">Nama Obat</th>
                          <th style="text-align: center; vertical-align: middle;">Sediaan/ Satuan</th>
                          <th style="text-align: center; vertical-align: middle;">Stok Awal</th>
                          <th style="text-align: center; vertical-align: middle;">Penerimaan</th>
                          <th style="text-align: center; vertical-align: middle;">Pemakaian Rata-rata/ Bulan</th>
                          <th style="text-align: center; vertical-align: middle;">Pengeluaran</th>
                          <th style="text-align: center; vertical-align: middle;">Sisa Stok</th>
                          <th style="text-align: center; vertical-align: middle;">Tingkat Kecukupan</th>
                          <th style="text-align: center; vertical-align: middle;">Keterangan (ED)</th>
                        </tr>
                        <tr>
                          <th style="text-align: center; vertical-align: middle;">1</th>
                          <th style="text-align: center; vertical-align: middle;">2</th>
                          <th style="text-align: center; vertical-align: middle;width: 100px;">3</th>
                          <th style="text-align: center; vertical-align: middle;">4</th>
                          <th style="text-align: center; vertical-align: middle;">5</th>
                          <th style="text-align: center; vertical-align: middle;width: 100px;">6</th>
                          <th style="text-align: center; vertical-align: middle;width: 100px;">7=(4+5)-8</th>
                          <th style="text-align: center; vertical-align: middle;width: 100px;">8=(4+5)-7</th>
                          <th style="text-align: center; vertical-align: middle;width: 100px;">9=8/6</th>
                          <th style="text-align: center; vertical-align: middle;">10</th>
                          <th style="text-align: center; vertical-align: middle;">11</th>

                        </tr>
                      </thead>
                      <tbody style="text-align: left; vertical-align: top;">

                        <?php $no=1;
                        // $source1 = $this->db->query("select * from table")->result_array();
                        foreach ($laporan->result() as $data) :
                          $ed = explode(',',$data->ed_barang);
                          sort($ed);
                          $filter = explode("-",$bulan_tahun);
                          $bulan = $filter['1'];
                          $tahun = $filter['0'];
                          $cstok_masuk = $this->db->query("SELECT SUM(rincian_barang_masuk.stok_barang_masuk) AS stok_masuk FROM `barang_masuk` JOIN rincian_barang_masuk ON rincian_barang_masuk.id_barang_masuk=barang_masuk.id_barang_masuk WHERE rincian_barang_masuk.id_barang='$data->id_barang' AND MONTH(barang_masuk.tanggal_barang_masuk)='$bulan' AND YEAR(barang_masuk.tanggal_barang_masuk)='$tahun' GROUP BY rincian_barang_masuk.id_barang")->row_array();

                          $cstok_keluar = $this->db->query("SELECT SUM(rincian_barang_keluar.stok_barang_keluar) AS stok_keluar FROM `barang_keluar` JOIN rincian_barang_keluar ON rincian_barang_keluar.id_barang_keluar=barang_keluar.id_barang_keluar WHERE rincian_barang_keluar.id_barang='$data->id_barang' AND MONTH(barang_keluar.tanggal_barang_keluar)='$bulan' AND YEAR(barang_keluar.tanggal_barang_keluar)='$tahun' GROUP BY rincian_barang_keluar.id_barang")->row_array();
                          ?>
                          <tr>
                            <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $data->nama_sumber;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $data->nama_barang;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $data->nama_satuan;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $cstok_keluar['stok_keluar']+$data->stok_barang-$cstok_masuk['stok_masuk'];?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $cstok_masuk['stok_masuk'];?></td>
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $cstok_keluar['stok_keluar'];?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $data->stok_barang;?></td>
                            <td style="text-align: center; vertical-align: middle;"></td>
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
          <form role="form" action="<?= site_url('Laporan/DINAMIKA');?>" method="GET" enctype="multipart/form-data">
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
