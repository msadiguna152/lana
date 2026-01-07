    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Tambah Data Pengeluaran Obat / BMHP</h5>
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
                <form role="form" action="<?= site_url('Barang_keluar/insert_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="keluar_karena">Kaluar Karena</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="keluar_karena" name="keluar_karena" data-placeholder="Pilih Kaluar Karena" required="">
                            <option value="-">Pilih Kaluar Karena</option>
                            <option value="Permintaan PKM">Permintaan PKM</option>
                            <option value="Permintaan Non PKM">Permintaan Non PKM</option>
                            <option value="Expired Date / Rusak">Expired Date / Rusak</option>
                          </select>
                        </div>

                        <div hidden class="form-group no_berita_acara">
                          <label for="no_berita_acara">No. Berita Acara</label>
                          <input type="text" class="form-control" value="" name="no_berita_acara" placeholder="Masukan Berita Acara">
                        </div>

                        <div hidden class="form-group no_permintaan">
                          <label for="no_permintaan">No. Permintaan</label>
                          <input type="text" class="form-control" value="<?= $kode; ?>" name="no_permintaan" placeholder="Masukan No. Permintaan">
                        </div>

                        <div hidden class="form-group asal_permintaan">
                          <label for="asal_permintaan">Asal Permintaan</label>
                          <input type="text" class="form-control" value="" name="asal_permintaan" placeholder="Masukan Asal Permintaan">
                        </div>

                        <div hidden class="form-group id_puskesmas">
                          <label for="id_puskesmas">PKM</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="id_puskesmas" data-placeholder="Pilih PKM">
                            <option >Pilih PKM</option>
                            <?php foreach ($puskesmas->result() as $dtpuskesmas) : ?>
                              <option value="<?= $dtpuskesmas->id_puskesmas?>"><?= $dtpuskesmas->nama_puskesmas?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="tanggal_barang_keluar">Tanggal Keluar</label>
                          <input type="date" class="form-control" name="tanggal_barang_keluar" placeholder="Masukan Tanggal" required="">
                        </div>
                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="id_sumber">Sumber Barang</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="sumber_barang" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
                            <option value="-">Pilih Sumber Barang</option>
                            <?php foreach ($sumber->result() as $dtsumber) : ?>
                              <option value="<?= $dtsumber->id_sumber;?>"><?= $dtsumber->nama_sumber;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="status_barang_keluar">Status</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="status_barang_keluar" data-placeholder="Pilih Status" required="">
                            <option >Pilih Status</option>
                            <option value="Terkonfirmasi">Terkonfirmasi</option>
                            <option value="Belum Terkonfirmasi">Belum Terkonfirmasi</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="keterangan_barang_keluar">Keterangan</label>
                          <textarea class="form-control" style="height: 123px;" name="keterangan_barang_keluar" placeholder="Masukan Keterangan" required=""></textarea>
                        </div>
                      </div>

                      <div hidden class=" rincian_barang_keluar table-responsive">

                        <div class="col-xl-12 col-md-12 col-sm-12">
                          <div class="table-responsive">
                            <table id="get_tabel2" class="table table-hover">
                              <thead align="center">
                                <tr>
                                  <th style="text-align: center; vertical-align: middle;">No</th>
                                  <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                  <th style="text-align: center; vertical-align: middle;">Sediaan/ Satuan</th>
                                  <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                                  <th style="text-align: center; vertical-align: middle;">Stok</th>
                                  <th style="text-align: center; vertical-align: middle;">Harga</th>
                                  <th style="text-align: center; vertical-align: middle;">Permintaan</th>
                                  <th style="text-align: center; vertical-align: middle;">Pemberian/ Stok Keluar</th>
                                  <th style="text-align: center; vertical-align: middle;">Rincian/ Keterangan</th>
                                  <th style="text-align: center; vertical-align: middle;">Expired Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td id="nomor" style="text-align: center; vertical-align: middle;">1</td>
                                  <td class="responsive" style="text-align: center; vertical-align: middle;width: 250px;">
                                    <select class="form-control select2 barang" disabled style="width: 250px;" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                    <option value="">Pilih Barang</option>
                                  </select>
                                  </td>
                                  <td id="label_nama_satuan" style="text-align: center; vertical-align: middle;"></td>
                                  <td id="label_klasifikasi" style="text-align: center; vertical-align: middle;"></td>
                                  <td id="label_stok_barang" style="text-align: center; vertical-align: middle;"></td>
                                  <td id="label_harga_barang" style="text-align: center; vertical-align: middle;"></td>

                                  <td style="text-align: center; vertical-align: middle;">
                                    <input style="width: 150px;" type="number" class="form-control permintaan" id="permintaan" disabled min="0" max="" value="" name="permintaan[]" maxlength="6" placeholder="Masukan Permintaan" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: middle;">
                                    <input style="width: 150px;" type="number" id="stok_barang_keluar" class="form-control stok_barang_keluar" min="0" max="" value="" name="stok_barang_keluar[]" maxlength="6" placeholder="Masukan Pemberian / Stok Keluar" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: middle;">
                                    <input style="width: 150px;" type="text" id="rincian" class="form-control" value="" name="rincian[]" placeholder="Masukan Rincian / Keterangan" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: middle;">
                                    <input style="width: 150px;" type="text" id="ed_barang_keluar" class="form-control ed_barang" name="ed_barang_keluar[]" placeholder="Masukan Expired Date" required>
                                  </td>

                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 mt-3">
                          <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                              <button class="btn btn-block btn-success mb-3" id="add-more2" type="button">Tambah Barang</button>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                              <button class="btn btn-block btn-danger mb-3" id="add-delete2" type="button">Hapus Barang</button>
                            </div>
                          </div>
                        </div>

                      </div>
                      
                    </div>
                  </div>

                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" name="simpan" class="btn btn-info btn_simpan">Simpan</button>
                    <button type="reset" name="reset" class="btn btn-info">Batal</button>
                    <button type="reset" onclick="history.back(-1)" name="reset" class="btn btn-info">Kembali</button>
                  </div>
                </form>
              </div>

            </section>

          </div>
        </div>
      </section>
    </div>
