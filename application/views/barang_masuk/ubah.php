    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Ubah Data <?= $menu; ?></h5>
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

                <form role="form" action="<?= site_url('Barang_masuk/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="no_barang_masuk">No</label>
                          <input type="text" class="form-control" name="no_barang_masuk" value="<?= $dtbarang_masuk['no_barang_masuk']; ?>" autofocus placeholder="Masukan No" required="">
                          <input type="text" hidden name="id_barang_masuk" value="<?= $dtbarang_masuk['id_barang_masuk']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="no_bukti">No. Bukti</label>
                          <input type="text" class="form-control" name="no_bukti" value="<?= $dtbarang_masuk['no_bukti']; ?>" placeholder="Masukan No. Bukti" required="">
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="tanggal_barang_masuk">Tanggal Barang Masuk</label>
                          <input type="date" class="form-control" name="tanggal_barang_masuk" value="<?= $dtbarang_masuk['tanggal_barang_masuk']; ?>" placeholder="Masukan Tanggal Barang Masuk" required="">
                        </div>

                      </div>
                      
                    </div>

                    <div class="row">
                      
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table id="get_tabel" width="100%" class="table table-bordered table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <!-- <th style="text-align: center; vertical-align: middle;">Stok Tersedia</th> -->
                                <th style="text-align: center; vertical-align: middle;">Stok Masuk</th>
                                <!-- <th style="text-align: center; vertical-align: middle;">Harga</th> -->
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($rincian_barang_masuk->result() as $data2) : ?>
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                                <td style="text-align: center; vertical-align: middle;width: 500px;">
                                  <select class="form-control select2 barang" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                    <option value="">Pilih Barang</option>
                                    <option class="bg-danger" value="Hapus Barang">Hapus Barang</option>
                                    <?php foreach ($barang->result() as $dtbarang) : ?>
                                      <option <?= $data2->id_barang==$dtbarang->id_barang ?'selected':'';?> data-stok_barang="<?= $dtbarang->stok_barang;?>" data-nama_satuan="<?= $dtbarang->nama_satuan;?>" value="<?= $dtbarang->id_barang?>"><?= $dtbarang->nama_barang?> (<?= $dtbarang->nama_satuan;?>)</option>
                                    <?php endforeach;?>
                                  </select>
                                </td>
                                <!-- <td id="label_stok_barang" style="text-align: center; vertical-align: middle;"><?= $dtbarang->stok_barang;?> <?= $dtbarang->nama_satuan;?></td> -->
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="number" class="form-control" id="stok_barang_masuk" name="stok_barang_masuk[]" maxlength="6" value="<?= $data2->stok_barang_masuk;?>" placeholder="Masukan Stok Masuk" required>
                                </td>
                                <!-- <td style="text-align: center; vertical-align: middle;">
                                  <input type="number" class="form-control" id="harga_barang_masuk" name="harga_barang_masuk[]" maxlength="9" value="<?= $data2->harga_barang_masuk;?>" placeholder="Masukan Harga" required>
                                </td> -->
                              </tr>
                              <?php $no++; endforeach;?>

                            </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="4">
                                  <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                      <button class="btn btn-block btn-success" id="add-more" type="button">Tambah Barang</button>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                      <button class="btn btn-block btn-danger" id="add-delete" type="button">Hapus Barang</button>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tfoot>

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
