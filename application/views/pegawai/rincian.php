    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Rincian Data PKM</h5>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <section class="col-lg-12">
              <div class="card">
                <div class="flash-data3" data-flashdata="<?= $this->session->flashdata('pesan');?>"></div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-xl-6 col-md-6 col-sm-12">

                      <div class="form-group">
                        <label for="nama_puskesmas">Nama PKM</label>
                        <h4 class="text text-info"><?= $dtpuskesmas['nama_puskesmas']; ?></h4>
                      </div>

                      <div class="form-group">
                        <label for="alamat_puskesmas">Alamat PKM</label>
                        <h4 class="text text-info"><?= $dtpuskesmas['alamat_puskesmas']; ?></h4>
                      </div>

                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12">

                      <div class="form-group">
                        <label for="jumlah_pustu">Jumlah Pustu</label>
                        <h4 class="text text-info"><?= $dtpuskesmas['jumlah_pustu']; ?></h4>
                      </div>

                      <div class="form-group">
                        <label for="jumlah_bidan_desa">Jumlah Bidan Desa</label>
                        <h4 class="text text-info"><?= $dtpuskesmas['jumlah_bidan_desa']; ?> Orang</h4>
                      </div>

                    </div>

                  </div>
                  <hr>

                  <div class="row mb-2">
                    <form role="form" action="<?= site_url('Puskesmas/rincian/');?><?= $dtpuskesmas['id_puskesmas']; ?>" method="GET" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="bulan_tahun">Sumber Barang</label>
                        <select class="form-control select2bs4" onchange="if(this.value != null) { this.form.submit(); }" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
                          <option >Pilih Sumber Barang</option>
                          <option value="Semua">Semua</option>
                          <?php foreach ($sumber->result() as $dtsumber) : ?>
                            <option value="<?= $dtsumber->id_sumber?>"><?= $dtsumber->nama_sumber?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </form>
                  </div> 

                  <div class="row">

                    <div class="col-xl-12 col-md-12 col-sm-12">
                      <div class="table-responsive">
                        <table id="example2" width="100%" class="table table-bordered table-hover">
                          <thead align="center">
                            <tr>
                              <th style="text-align: center; vertical-align: middle;">No</th>
                              <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                              <th style="text-align: center; vertical-align: middle;">Sumber Barang</th>
                              <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                              <th style="text-align: center; vertical-align: middle;">Sediaan / Satuan</th>
                              <th style="text-align: center; vertical-align: middle;">Stok PKM</th>
                              <th style="text-align: center; vertical-align: middle;">Harga</th>
                              <th style="text-align: center; vertical-align: middle;">Expired Date</th>
                            </tr>
                          </thead>
                          <tbody style="text-align: left; vertical-align: top;">
                            <?php $no=1; foreach ($barang->result() as $data) : 
                            $ed = explode(',',$data->ed_barang_puskesmas);
                            sort($ed);
                            ?>
                            <tr>
                              <td style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $data->nama_barang;?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $data->nama_sumber;?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $data->klasifikasi;?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $data->nama_satuan;?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= $data->stok_puskesmas;?></td>
                              <td style="text-align: center; vertical-align: middle;"><?= "Rp " . number_format($data->harga_barang,0,',','.');?></td>
                              <td style="text-align: center; vertical-align: middle;">
                                <?php
                                $olddate='';
                                if ($data->ed_barang_puskesmas!=NULL AND $data->ed_barang_puskesmas!='-') {
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
                    </div>
                  </div>
                </div>
              </div>

            </section>

          </div>
        </div>
      </section>
    </div>
