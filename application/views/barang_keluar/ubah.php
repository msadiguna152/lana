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
                <form role="form" action="<?= site_url('Barang_keluar/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="no_bukti">No. Permintaan</label>
                          <input type="text" class="form-control" readonly value="<?= $dtbarang_keluar['no_bukti']; ?>" name="no_bukti" placeholder="Masukan No. Permintaan">
                        </div>

                        <div class="form-group">
                          <label for="no_berita_acara">No. Berita Acara</label>
                          <input type="text" class="form-control" readonly value="<?= $dtbarang_keluar['no_berita_acara']; ?>" name="no_berita_acara" placeholder="Masukan Berita Acara">
                          <input type="text" class="form-control" value="<?= $dtbarang_keluar['id_barang_keluar']; ?>" hidden name="id_barang_keluar">
                        </div>

                        <div class="form-group">
                          <label for="id_pegawai">Pemohon</label>
                          <?php if ($this->session->userdata('level') === 'Operator') { ?>
                            <select class="form-control select2bs4" id="id_pegawai" name="id_pegawai" data-placeholder="---Pilih Pemohon---" <?= ($levelUser !== 'Operator') ? '' : 'required'; ?>>
                              <option value="" selected disabled>---Pilih Pemohon---</option>
                              <?php foreach ($pegawai->result() as $dtpegawai) : ?>
                                <option <?= $dtbarang_keluar['id_pegawai']==$dtpegawai->id_pegawai ?'selected':'';?> value="<?= $dtpegawai->id_pegawai?>"><?= $dtpegawai->nama_pegawai?></option>
                              <?php endforeach;?>
                            </select>
                          <?php } else { ?>
                            <input type="text" class="form-control" value="<?= $dtbarang_keluar['nama_pegawai']; ?>" disabled>
                          <?php };?>
                        </div>

                        <div class="form-group">
                          <label for="asal_permintaan">Asal Permintaan</label>
                          <input type="text" class="form-control" id="asal_permintaan" value="<?= $dtbarang_keluar['asal_permintaan']; ?>" name="asal_permintaan" readonly>
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group" <?= ($levelUser !== 'Operator') ? 'hidden' : ''; ?>>
                          <label for="tanggal_barang_keluar">Tanggal Keluar</label>
                          <input type="date" class="form-control" name="tanggal_barang_keluar" value="<?= $dtbarang_keluar['tanggal_barang_keluar']; ?>" placeholder="Masukan Tanggal" <?= ($levelUser !== 'Operator') ? '' : 'required'; ?>>
                        </div>

                        <div class="form-group" <?= ($levelUser === 'Pengusul') ? 'hidden' : ''; ?>>
                          <label for="status_barang_keluar">Status</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="status_barang_keluar" data-placeholder="Pilih Status" <?= ($levelUser === 'Pengusul') ? '' : 'required'; ?>>
                            <option selected value="<?= $dtbarang_keluar['status_barang_keluar']; ?>"><?= $dtbarang_keluar['status_barang_keluar']; ?></option>
                            <option value="Menunggu">Menunggu</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Diterima Sebagian">Diterima Sebagian</option>
                            <option value="Ditolak">Ditolak</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="keterangan_barang_keluar">Keterangan</label>
                          <textarea class="form-control" style="height: 123px;" name="keterangan_barang_keluar" placeholder="Masukan Keterangan"><?= $dtbarang_keluar['keterangan_barang_keluar']; ?></textarea>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table id="get_tabel" class="table table-bordered table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;" <?= ($levelUser != 'Pengusul') ? '' : 'hidden'; ?>>Tersedia</th>
                                <th style="text-align: center; vertical-align: middle;">Permintaan</th>
                                <th style="text-align: center; vertical-align: middle;">Pemberian</th>
                                <th style="text-align: center; vertical-align: middle;">Rincian</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($rincian_barang_keluar->result() as $data2) : ?>
                              <?php if ($levelUser === 'Penyetuju') { ?>
                                <tr>
                                  <td id="nomor" style="text-align: center; vertical-align: left;"><?= $no;?></td>
                                  <td style="text-align: center; vertical-align: left;width: 400px;">
                                    <?= $data2->nama_barang;?> (<?= $data2->nama_satuan;?>)
                                  </td>
                                  <td style="text-align: center; vertical-align: left;width: 200px;">
                                    <?= $data2->stok_barang;?> (<?= $data2->nama_satuan;?>)
                                  </td>

                                  <td style="text-align: center; vertical-align: left;width: 200px;">
                                    <?= $data2->permintaan;?> (<?= $data2->nama_satuan;?>)
                                  </td>

                                  <td style="text-align: center; vertical-align: left;">
                                    <input type="number" class="form-control" id="stok_barang_keluar" min="0" max="<?= $data2->stok_barang+$data2->stok_barang_keluar;?>" value="<?= $data2->stok_barang_keluar;?>" name="stok_barang_keluar[]" maxlength="6" placeholder="Masukan Pemberian / Stok Keluar" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: left;">
                                    <?= $data2->rincian;?>
                                  </td>

                                </tr>
                              <?php } elseif ($levelUser === 'Pengusul') { ?>
                                <tr>
                                  <td id="nomor" style="text-align: center; vertical-align: left;"><?= $no;?></td>
                                  <td style="text-align: center; vertical-align: left;width: 400px;">
                                    <select class="form-control select2 barang" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                      <option value="Hapus Barang">Hapus Barang</option>
                                      <?php foreach ($barang->result() as $dtbarang) : ?>
                                        <option <?= $data2->id_barang==$dtbarang->id_barang ?'selected':'';?> data-nama_satuan="<?= $dtbarang->nama_satuan;?>" data-stok_barang="<?= $dtbarang->stok_barang;?>" value="<?= $dtbarang->id_barang?>"><?= $dtbarang->nama_barang?></option>
                                      <?php endforeach;?>
                                    </select>
                                  </td>

                                  <td id="label_stok_barang" style="text-align: center; vertical-align: left;"><?= $data2->stok_barang;?> <?= $data2->nama_satuan;?></td>

                                  <td style="text-align: center; vertical-align: left;width: 200px;">
                                    <input type="number" class="form-control" id="permintaan" min="0" max="" value="<?= $data2->permintaan;?>" name="permintaan[]" maxlength="6" placeholder="Masukan Permintaan" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: left;" <?= ($levelUser !== 'Operator') ? 'hidden' : ''; ?>>
                                    <input type="number" class="form-control" id="stok_barang_keluar" min="0" max="<?= $data2->stok_barang+$data2->stok_barang_keluar;?>" value="<?= $data2->stok_barang_keluar;?>" name="stok_barang_keluar[]" maxlength="6" placeholder="Masukan Pemberian / Stok Keluar" <?= ($levelUser !== 'Operator') ? '' : 'required'; ?>>
                                  </td>

                                  <td style="text-align: center; vertical-align: left;">
                                    <textarea class="form-control" id="rincian" value="" name="rincian[]" placeholder="Masukan Rincian / Keterangan"><?= $data2->rincian;?></textarea>
                                  </td>
                                </tr>
                              <?php } else { ?>
                                <tr>
                                  <td id="nomor" style="text-align: center; vertical-align: left;"><?= $no;?></td>
                                  <td style="text-align: center; vertical-align: left;width: 400px;">
                                    <select class="form-control select2 barang" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                      <option value="Hapus Barang">Hapus Barang</option>
                                      <?php foreach ($barang->result() as $dtbarang) : ?>
                                        <option <?= $data2->id_barang==$dtbarang->id_barang ?'selected':'';?> data-nama_satuan="<?= $dtbarang->nama_satuan;?>" data-stok_barang="<?= $dtbarang->stok_barang;?>" value="<?= $dtbarang->id_barang?>"><?= $dtbarang->nama_barang?></option>
                                      <?php endforeach;?>
                                    </select>
                                  </td>

                                  <td id="label_stok_barang" style="text-align: center; vertical-align: left;"><?= $data2->stok_barang;?> <?= $data2->nama_satuan;?></td>

                                  <td style="text-align: center; vertical-align: left;width: 200px;">
                                    <input type="number" class="form-control" id="permintaan" min="0" max="" value="<?= $data2->permintaan;?>" name="permintaan[]" maxlength="6" placeholder="Masukan Permintaan" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: left;" >
                                    <input type="number" class="form-control" id="stok_barang_keluar" min="0" max="<?= $data2->stok_barang+$data2->stok_barang_keluar;?>" value="<?= $data2->stok_barang_keluar;?>" name="stok_barang_keluar[]" maxlength="6" placeholder="Masukan Pemberian / Stok Keluar" required>
                                  </td>

                                  <td style="text-align: center; vertical-align: left;">
                                    <textarea class="form-control" id="rincian" value="" name="rincian[]" placeholder="Masukan Rincian / Keterangan"><?= $data2->rincian;?></textarea>
                                  </td>

                                </tr>
                              <?php };?>
                              <?php $no++; endforeach;?>
                            </tbody>

                            <tfoot>
                              <?php if ($levelUser !== 'Penyetuju') { ?>
                                <tr>
                                  <td colspan="6">
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
                              <?php };?>
                            </tfoot>

                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" name="simpan" class="btn btn-info btn_simpan">Simpan</button>
                    <button type="reset" name="reset" class="btn btn-info">Batal</button>
                    <button type="reset" onclick="history.back(-1)" name="reset" class="btn btn-info">Kembali</button>
                  </div>
                </div>
              </form>
            </div>

          </section>

        </div>
      </div>
    </section>
  </div>
