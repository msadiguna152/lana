    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Rincian Data <?= $menu; ?></h5>
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
                          <label for="no_berita_acara">No. Berita Acara</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_keluar['no_berita_acara']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="no_bukti">No. Permintaan</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_keluar['no_bukti']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="id_pegawai">Pemohon</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_keluar['nama_pegawai']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="asal_permintaan">Asal Permintaan</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_keluar['asal_permintaan']; ?>">
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group" <?= ($levelUser !== 'Operator') ? 'hidden' : ''; ?>>
                          <label for="tanggal_barang_keluar">Tanggal Keluar</label>
                          <input type="date" class="form-control" disabled value="<?= $dtbarang_keluar['tanggal_barang_keluar']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="status_barang_keluar">Status</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_keluar['status_barang_keluar']; ?>">

                        </div>

                        <div class="form-group">
                          <label for="keterangan_barang_keluar">Keterangan</label>
                          <textarea class="form-control" disabled><?= $dtbarang_keluar['keterangan_barang_keluar']; ?></textarea>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Permintaan</th>
                                <th style="text-align: center; vertical-align: middle;">Pemberian</th>
                                <th style="text-align: center; vertical-align: middle;">Rincian</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($rincian_barang_keluar->result() as $data2) : ?>
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: left;"><?= $no;?></td>
                                <td style="text-align: center; vertical-align: left;width: 400px;">
                                  <?= $data2->nama_barang;?> (<?= $data2->nama_satuan;?>)
                                </td>

                                <td style="text-align: center; vertical-align: left;width: 200px;">
                                  <?= $data2->permintaan;?> (<?= $data2->nama_satuan;?>)
                                </td>

                                <td style="text-align: center; vertical-align: left;">
                                  <?= $data2->stok_barang_keluar;?> (<?= $data2->nama_satuan;?>)
                                </td>

                                <td style="text-align: center; vertical-align: left;">
                                  <?= $data2->rincian;?>
                                </td>
                              </tr>
                              <?php $no++; endforeach;?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer" style="text-align: center;">
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
