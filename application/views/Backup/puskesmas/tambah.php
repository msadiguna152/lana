    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="m-0 text-info">Tambah Data PKM</h5>
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
                <form role="form" action="<?= site_url('Puskesmas/insert_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="nama_puskesmas">Nama PKM</label>
                          <input type="text" class="form-control" name="nama_puskesmas" value="<?= $this->session->flashdata('nama_puskesmas');?>" placeholder="Masukan Nama PKM" required="">
                        </div>

                        <div class="form-group">
                          <label for="alamat_puskesmas">Alamat PKM</label>
                          <textarea class="form-control" style="height: 123px;" name="alamat_puskesmas" placeholder="Masukan Alamat PKM" required=""><?= $this->session->flashdata('alamat_puskesmas');?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="jumlah_pustu">Jumlah Pustu</label>
                          <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $this->session->flashdata('jumlah_pustu');?>" name="jumlah_pustu" maxlength="3" placeholder="Masukan Jumlah Pustu" required="">
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="jumlah_bidan_desa">Jumlah Bidan Desa</label>
                          <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $this->session->flashdata('jumlah_bidan_desa');?>" name="jumlah_bidan_desa" maxlength="3" placeholder="Masukan Jumlah Bidan Desa" required="">
                        </div>

                        <div class="form-group">
                          <label for="nama_ttd_puskesmas">Nama TTD PKM</label>
                          <input type="text" class="form-control" name="nama_ttd_puskesmas" value="<?= $this->session->flashdata('nama_ttd_puskesmas');?>" placeholder="Masukan Nama TTD PKM" required="">
                        </div>

                        <div class="form-group">
                          <label for="nip_ttd_puskesmas">NIP TTD PKM</label>
                          <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $this->session->flashdata('nip_ttd_puskesmas');?>" name="nip_ttd_puskesmas" maxlength="16" placeholder="Masukan NIP TTD PKM" required="">
                        </div>

                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-xl-6 col-md-6 col-sm-12">
                        <button class="btn btn-block btn-success mb-3" id="add-more" type="button">Tambah Barang</button>
                      </div>
                      <div class="col-xl-6 col-md-6 col-sm-12">
                        <button class="btn btn-block btn-danger mb-3" id="add-delete" type="button">Hapus Barang</button>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xl-12 col-md-6 col-sm-12">

                        <div class="table-responsive">
                          <table id="get_tabel" width="100%" class="table table-bordered table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Sumber Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Klasifikasi</th>
                                <th style="text-align: center; vertical-align: middle;">Sediaan / Satuan</th>
                                <th style="text-align: center; vertical-align: middle;">Harga</th>
                                <th style="text-align: center; vertical-align: middle;">Stok PKM</th>
                                <th style="text-align: center; vertical-align: middle;">Expired Date</th>
                              </tr>
                            </thead>
                            <tbody style="text-align: left; vertical-align: top;">
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: middle;">1</td>
                                <td style="text-align: center; vertical-align: middle;width: 250px;">
                                  <select class="form-control select2" style="width: 250px;" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                    <option value="">Pilih Barang</option>
                                    <?php foreach ($barang->result() as $dtbarang) : ?>
                                      <option data-nama_satuan="<?= $dtbarang->nama_satuan;?>" data-nama_sumber="<?= $dtbarang->nama_sumber;?>" data-harga_barang="<?= $dtbarang->harga_barang;?>" data-klasifikasi="<?= $dtbarang->klasifikasi;?>" value="<?= $dtbarang->id_barang;?>">(<?= $dtbarang->nama_sumber;?>) - <?= $dtbarang->nama_barang;?></option>
                                    <?php endforeach;?>
                                  </select>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <text id="label_nama_sumber"></text>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <text id="label_klasifikasi"></text>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <text id="label_nama_satuan"></text>
                                </td>
                                
                                <td style="text-align: center; vertical-align: middle;">
                                  <text id="label_harga_barang"></text>
                                </td>

                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="number" class="form-control" id="label_stok_barang" min="0" name="stok_puskesmas[]" maxlength="6" placeholder="Masukan Stok PKM" required>
                                </td>

                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="text" class="form-control ed_barang" value="" name="ed_barang_puskesmas[]" placeholder="Masukan Expired Date" required>
                                </td>

                              </tr>
                            </tbody>
                          </table>
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

