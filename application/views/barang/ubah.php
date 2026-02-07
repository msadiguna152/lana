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

                <form role="form" action="<?= site_url('Barang/update_proses');?>" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="kode_barang">Kode Barang</label>
                          <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="kode_barang" value="<?= $dtbarang['kode_barang']; ?>" placeholder="Masukan Kode Barang" required="">
                          <input type="text" hidden="" name="id_barang" value="<?= $dtbarang['id_barang']; ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" value="<?= $dtbarang['nama_barang']; ?>" placeholder="Masukan Nama Barang" required="">
                        </div>

                        <div class="form-group">
                          <label for="id_satuan">Satuan Barang</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="id_satuan" data-placeholder="Pilih Satuan Barang" required="">
                            <option >Pilih Satuan Barang</option>
                            <?php foreach ($satuan->result() as $dtsatuan) : ?>
                              <option <?= $dtbarang['id_satuan']==$dtsatuan->id_satuan ?'selected':'';?> value="<?= $dtsatuan->id_satuan?>"><?= $dtsatuan->nama_satuan?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <!-- <div class="form-group">
                          <label for="harga_barang">Harga Barang</label>
                          <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="harga_barang" value="<?= $dtbarang['harga_barang']; ?>" placeholder="Masukan Harga Barang" required="">
                        </div>
 -->
                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="stok_barang">Stok Barang</label>
                          <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="stok_barang" value="<?= $dtbarang['stok_barang']; ?>" maxlength="6" placeholder="Masukan Stok Barang" required="">
                        </div>

                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea  class="form-control" name="deskripsi" placeholder="Masukan Deskripsi"><?= $dtbarang['deskripsi']; ?></textarea>
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
