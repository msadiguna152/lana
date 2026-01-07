    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Rincian Data Penerimaan Obat / BMHP</h5>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <section class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="no_dokumen">No. Dokumen / Faktur</label>
                          <input type="text" class="form-control" name="no_dokumen" value="<?= $dtbarang_masuk['no_dokumen']; ?>" readonly>
                        </div>

                        <div class="form-group">
                          <label for="nama_penyalur">Nama PBF / Penyalur</label>
                          <input type="text" class="form-control" name="nama_penyalur" value="<?= $dtbarang_masuk['nama_penyalur']; ?>" readonly>
                        </div>

                        <div class="form-group">
                          <label for="nama_penyalur">Nama Pabrik</label>
                          <input type="text" class="form-control" name="nama_penyalur" value="<?= $dtbarang_masuk['nama_pabrik']; ?>" readonly>
                        </div>
                        
                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="tanggal_barang_masuk">Tanggal Penerimaan</label>
                          <input type="date" class="form-control" name="tanggal_barang_masuk" value="<?= $dtbarang_masuk['tanggal_barang_masuk']; ?>" readonly>
                        </div>

                        <div class="form-group">
                          <label for="id_asal">Sumber Dana</label>
                          <select class="form-control select2bs4" disabled style="width: 100%;" id="" name="id_asal" data-placeholder="Pilih Asal Barang" required="">
                            <option >Pilih Asal Barang</option>
                            <?php foreach ($asal->result() as $dtasal) : ?>
                              <option <?= $dtbarang_masuk['id_asal']==$dtasal->id_asal ?'selected':'';?> value="<?= $dtasal->id_asal;?>"><?= $dtasal->nama_asal;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="id_sumber">Sumber Barang</label>
                          <select class="form-control select2bs4" disabled style="width: 100%;" id="sumber_barang" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
                            <option>Pilih Sumber Barang</option>
                            <?php foreach ($sumber->result() as $dtsumber) : ?>
                              <option <?= $dtbarang_masuk['id_sumber']==$dtsumber->id_sumber ?'selected':'';?> value="<?= $dtsumber->id_sumber;?>"><?= $dtsumber->nama_sumber;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                      </div>
                      
                    </div>

                    <div class="row">

                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table id="example2" width="100%" class="table table-bordered table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">No. Batch</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Sediaan/ Satuan</th>
                                <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                                <th style="text-align: center; vertical-align: middle;">Stok Masuk</th>
                                <th style="text-align: center; vertical-align: middle;">Harga</th>
                                <th style="text-align: center; vertical-align: middle;">Expired Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($rincian_barang_masuk->result() as $data2) : ?>
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->no_batch;?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;width: 250px;">
                                  <?= $data2->nama_barang;?>
                                </td>
                                <td id="label_nama_satuan" style="text-align: center; vertical-align: middle;"><?= $data2->nama_satuan;?></td>
                                <td id="label_klasifikasi" style="text-align: center; vertical-align: middle;"><?= $data2->klasifikasi;?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= $data2->stok_barang_masuk;?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= "Rp " . number_format($data2->harga_barang_masuk,0,',','.');?>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= format_indo3($data2->expire_date);?>
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
