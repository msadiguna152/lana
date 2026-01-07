    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Tambah Data Penerimaan Obat / BMHP</h5>
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
                <form role="form" action="<?= site_url('Barang_masuk/insert_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="no_dokumen">No. Dokumen / Faktur</label>
                          <input type="text" class="form-control" name="no_dokumen" autofocus placeholder="Masukan No. Dokumen / Faktur" required="">
                        </div>

                        <div class="form-group">
                          <label for="nama_penyalur">Nama PBF / Penyalur</label>
                          <input type="text" class="form-control" name="nama_penyalur" placeholder="Masukan Nama PBF / Penyalur" required="">
                        </div>

                        <div class="form-group">
                          <label for="nama_pabrik">Nama Pabrik</label>
                          <input type="text" class="form-control" name="nama_pabrik" placeholder="Masukan Nama Pabrik" required="">
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="tanggal_barang_masuk">Tanggal Penerimaan</label>
                          <input type="date" class="form-control" name="tanggal_barang_masuk" placeholder="Masukan Tanggal Penerimaan" required="">
                        </div>

                        <div class="form-group">
                          <label for="id_asal">Sumber Dana</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="id_asal" data-placeholder="Pilih Sumber Dana" required="">
                            <option >Pilih Sumber Dana</option>
                            <?php foreach ($asal->result() as $dtasal) : ?>
                              <option value="<?= $dtasal->id_asal;?>"><?= $dtasal->nama_asal;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="id_sumber">Sumber Barang</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="sumber_barang" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
                            <option value="-">Pilih Sumber Barang</option>
                            <?php foreach ($sumber->result() as $dtsumber) : ?>
                              <option value="<?= $dtsumber->id_sumber;?>"><?= $dtsumber->nama_sumber;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <!-- <div class="form-group">
                          <label for="keterangan_barang_masuk">Keterangan</label>
                          <textarea class="form-control" style="height: 123px;" name="keterangan_barang_masuk" placeholder="Masukan Keterangan" required=""></textarea>
                        </div> -->
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="row">
                          <div class="col-xl-6 col-md-6 col-sm-12">
                            <button class="btn btn-block btn-success mb-3" id="add-more" type="button">Tambah Barang</button>
                          </div>
                          <div class="col-xl-6 col-md-6 col-sm-12">
                            <button class="btn btn-block btn-danger mb-3" id="add-delete" type="button">Hapus Barang</button>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table id="get_tabel" width="100%" class="table table-bordered table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">No. Batch</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Sediaan / Satuan</th>
                                <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                                <th style="text-align: center; vertical-align: middle;">Stok Masuk</th>
                                <th style="text-align: center; vertical-align: middle;">Harga</th>
                                <th style="text-align: center; vertical-align: middle;">Expired Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: middle;">1</td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="text" class="form-control" name="no_batch[]" placeholder="Masukan No. Batch"  required="">
                                </td>
                                <td style="text-align: center; vertical-align: middle;width: 250px;">
                                  <select class="form-control select2 barang" disabled style="width: 100%;" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                    <option value="">Pilih Barang</option>
                                  </select>
                                </td>
                                <td id="label_nama_satuan" style="text-align: center; vertical-align: middle;"></td>
                                <td id="label_klasifikasi" style="text-align: center; vertical-align: middle;"></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="number" class="form-control" name="stok_barang_masuk[]" maxlength="6" placeholder="Masukan Stok Masuk" required>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="number" class="form-control" name="harga_barang_masuk[]" maxlength="9" placeholder="Masukan Harga" required>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="month" class="form-control" name="expire_date[]" placeholder="Masukan Tanggal Expired Date" required>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="row">
                          <div class="col-xl-6 col-md-6 col-sm-12">
                            <button class="btn btn-success mb-3 btn-floating" id="btn-tambah" type="button">Tambah</button>
                          </div>
                          <div class="col-xl-6 col-md-6 col-sm-12">
                            <button class="btn btn-danger mb-3 btn-floating" id="btn-hapus" type="button">Hapus</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
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
