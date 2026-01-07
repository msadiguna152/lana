    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Ubah Data Penerimaan Obat / BMHP</h5>
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
                          <label for="no_dokumen">No. Dokumen / Faktur</label>
                          <input type="text" class="form-control" name="no_dokumen" autofocus value="<?= $dtbarang_masuk['no_dokumen']; ?>" placeholder="Masukan No. Dokumen / Faktur" required="">
                          <input type="text" hidden name="id_barang_masuk" value="<?= $dtbarang_masuk['id_barang_masuk']; ?>">
                        </div>

                        <div class="form-group">
                          <label for="nama_penyalur">Nama PBF / Penyalur</label>
                          <input type="text" class="form-control" name="nama_penyalur" value="<?= $dtbarang_masuk['nama_penyalur']; ?>" placeholder="Masukan Nama PBF / Penyalur" required="">
                        </div>

                        <div class="form-group">
                          <label for="nama_pabrik">Nama Pabrik</label>
                          <input type="text" class="form-control" name="nama_pabrik" value="<?= $dtbarang_masuk['nama_pabrik']; ?>" placeholder="Masukan Nama Pabrik" required="">
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="tanggal_barang_masuk">Tanggal Penerimaan</label>
                          <input type="date" class="form-control" name="tanggal_barang_masuk" value="<?= $dtbarang_masuk['tanggal_barang_masuk']; ?>" placeholder="Masukan Tanggal Penerimaan" required="">
                        </div>

                        <div class="form-group">
                          <label for="id_asal">Sumbe Dana</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="id_asal" data-placeholder="Pilih Sumbe Dana" required="">
                            <option >Pilih Sumber Dana</option>
                            <?php foreach ($asal->result() as $dtasal) : ?>
                              <option <?= $dtbarang_masuk['id_asal']==$dtasal->id_asal ?'selected':'';?> value="<?= $dtasal->id_asal;?>"><?= $dtasal->nama_asal;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="id_sumber">Sumber Barang</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="sumber_barang" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
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
                          <table id="get_tabel" width="100%" class="table table-hover">
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
                                  <input type="text" class="form-control" id="no_batch" style="width: 150px;" name="no_batch[]" value="<?= $data2->no_batch;?>" placeholder="Masukan No. Batch"  required="">
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <select class="form-control select2 barang" style="width: 250px;" name="id_barang[]" data-placeholder="Pilih Barang" required="">
                                    <option value="Hapus Barang">Hapus Barang</option>
                                    <?php foreach ($barang->result() as $dtbarang) : ?>
                                      <option <?= $data2->id_barang==$dtbarang->id_barang ?'selected':'';?> data-nama_satuan="<?= $dtbarang->nama_satuan;?>" data-klasifikasi="<?= $dtbarang->klasifikasi;?>" value="<?= $dtbarang->id_barang?>"><?= $dtbarang->nama_barang?></option>
                                    <?php endforeach;?>
                                  </select>
                                </td>
                                <td id="label_nama_satuan" style="text-align: center; vertical-align: middle;"><?= $data2->nama_satuan;?></td>
                                <td id="label_klasifikasi" style="text-align: center; vertical-align: middle;"><?= $data2->klasifikasi;?></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="number" class="form-control" style="width: 150px;" id="stok_barang_masuk"  name="stok_barang_masuk[]" min="0" value="<?= $data2->stok_barang_masuk;?>" maxlength="6" placeholder="Masukan Stok Masuk" required>
                                </td>
                                <td style="text-align: center; vertical-align: middle;width: 250px;">
                                  <input type="number" class="form-control" style="width: 150px;" id="harga_barang_masuk" name="harga_barang_masuk[]" min="0" value="<?= $data2->harga_barang_masuk;?>" maxlength="9" placeholder="Masukan Harga" required>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <input type="month" class="form-control" style="width: 170px;" id="expire_date" name="expire_date[]" value="<?= $data2->expire_date;?>" placeholder="Masukan Tanggal Expired Date" required>
                                </td>
                              </tr>
                              <?php $no++; endforeach;?>

                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="col-xl-12 col-md-12 col-sm-12 mt-3">
                        <div class="row">
                          <div class="col-xl-6 col-md-6 col-sm-12">
                            <button class="btn btn-block btn-success mb-3" id="add-more" type="button">Tambah Barang</button>
                          </div>
                          <div class="col-xl-6 col-md-6 col-sm-12">
                            <button class="btn btn-block btn-danger mb-3" id="add-delete" type="button">Hapus Barang</button>
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
