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

                <form role="form" action="<?= site_url('Barang_masuk/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="no_barang_masuk">No</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_masuk['no_barang_masuk']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="no_bukti">No. Bukti</label>
                          <input type="text" class="form-control" disabled value="<?= $dtbarang_masuk['no_bukti']; ?>">
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="tanggal_barang_masuk">Tanggal Barang Masuk</label>
                          <input type="date" class="form-control" disabled value="<?= $dtbarang_masuk['tanggal_barang_masuk']; ?>">
                        </div>

                      </div>
                      
                    </div>

                    <div class="row">
                      
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                          <table width="100%" class="table table-hover">
                            <thead align="center">
                              <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                <th style="text-align: center; vertical-align: middle;">Stok Masuk</th>
                                <!-- <th style="text-align: center; vertical-align: middle;">Harga</th> -->
                            </thead>
                            <tbody>
                              <?php $no=1; foreach ($rincian_barang_masuk->result() as $data2) : ?>
                              <tr>
                                <td id="nomor" style="text-align: center; vertical-align: middle;"><?= $no;?></td>
                                <td style="text-align: center; vertical-align: middle;width: 500px;">
                                  <?= $data2->nama_barang;?> (<?= $data2->nama_satuan;?>)
                                </td>
                                <!-- <td id="label_stok_barang" style="text-align: center; vertical-align: middle;"><?= $dtbarang->stok_barang;?> <?= $dtbarang->nama_satuan;?></td> -->
                                <td style="text-align: center; vertical-align: middle;">
                                  <?= number_format($data2->stok_barang_masuk, 0, ',', '.');?> <?= $data2->nama_satuan;?>
                                </td>
                                <!-- <td style="text-align: center; vertical-align: middle;">
                                  <?= "Rp " . number_format($data2->harga_barang_masuk, 0, ',', '.');?>
                                </td> -->
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
                </form>

              </div>

            </section>

          </div>
        </div>
      </section>
    </div>
