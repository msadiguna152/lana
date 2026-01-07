    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h5 class="m-0 text-info">Rincian Data Permintaan Obat / BMHP</h5>
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

                      <div disabled class="form-group">
                        <label for="keluar_karena">Kaluar Karena</label>
                        <input type="text" class="form-control" value="<?= $dtbarang_keluar['keluar_karena']; ?>" readonly>
                      </div>

                      <div class="form-group no_permintaan">
                        <label for="no_permintaan">No. Permintaan</label>
                        <input type="text" class="form-control" value="<?= $dtbarang_keluar['no_permintaan']; ?>" readonly>
                      </div>

                      <div class="form-group id_puskesmas">
                        <label for="id_puskesmas">PKM</label>
                        <select class="form-control select2bs4" disabled style="width: 100%;">
                          <option >Pilih PKM</option>
                          <?php foreach ($puskesmas->result() as $dtpuskesmas) : ?>
                            <option <?= $dtbarang_keluar['id_puskesmas']==$dtpuskesmas->id_puskesmas ?'selected':'';?> value="<?= $dtpuskesmas->id_puskesmas?>"><?= $dtpuskesmas->nama_puskesmas?></option>
                          <?php endforeach;?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="tanggal_barang_keluar">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tanggal_barang_keluar" value="<?= $dtbarang_keluar['tanggal_barang_keluar']; ?>" readonly>
                      </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12">

                      <div class="form-group">
                        <label for="id_sumber">Sumber Barang</label>
                        <select class="form-control select2bs4" disabled style="width: 100%;">
                          <option value="-">Pilih Sumber Barang</option>
                          <?php foreach ($sumber->result() as $dtsumber) : ?>
                            <option <?= $dtbarang_keluar['id_sumber']==$dtsumber->id_sumber ?'selected':'';?> value="<?= $dtsumber->id_sumber;?>"><?= $dtsumber->nama_sumber;?></option>
                          <?php endforeach;?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="status_barang_keluar">Status</label>
                        <select class="form-control select2bs4" disabled style="width: 100%;">
                          <option selected value="<?= $dtbarang_keluar['status_barang_keluar']; ?>"><?= $dtbarang_keluar['status_barang_keluar']; ?></option>
                          <option value="Terkonfirmasi">Terkonfirmasi</option>
                          <option value="Belum Terkonfirmasi">Belum Terkonfirmasi</option>
                          <option value="Diproses">Diproses</option>
                          <option value="Selesai">Selesai</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="keterangan_barang_keluar">Keterangan</label>
                        <textarea class="form-control" style="height: 123px;" readonly><?= $dtbarang_keluar['keterangan_barang_keluar']; ?></textarea>
                      </div>
                    </div>

                    <div class="rincian_barang_keluar table-responsive">

                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table id="get_tabel2" class="table table-bordered table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Sediaan / Satuan</th>
                                <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                                <th style="text-align: center; vertical-align: middle;">Stok</th>
                                <th style="text-align: center; vertical-align: middle;">Harga</th>
                                <th style="text-align: center; vertical-align: middle;">Permintaan</th>
                                <th style="text-align: center; vertical-align: middle;">Pemberian / Stok Keluar</th>
                                <th style="text-align: center; vertical-align: middle;">Rincian / Keterangan</th>
                                <th style="text-align: center; vertical-align: middle;">Expired Date</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($rincian_barang_keluar->result() as $data2) : ?>
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->nama_barang;?>
                                </td>
                                <td id="label_nama_satuan" style="text-align: center; vertical-align: middle;"><?= $data2->nama_satuan;?></td>
                                <td id="label_klasifikasi" style="text-align: center; vertical-align: middle;"><?= $data2->klasifikasi;?></td>
                                <td id="label_stok_barang" style="text-align: center; vertical-align: middle;"><?= $data2->stok_barang;?></td>
                                <td id="label_harga_barang" style="text-align: center; vertical-align: middle;"><?= "Rp. " . number_format($data2->harga_barang,0,',','.');?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->permintaan;?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->stok_barang_keluar;?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->rincian;?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->ed_barang_keluar;?>
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

              </div>

            </section>

          </div>
        </div>
      </section>
    </div>
