    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Ubah Data Obat / BMHP IFK</h5>
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
                          <label for="klasifikasi">Klasifikasi Barang</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="klasifikasi" data-placeholder="Pilih Klasifikasi Barang" required="">
                            <option value="">Pilih Klasifikasi Barang</option>
                            <option selected value="<?= $dtbarang['klasifikasi']; ?>"><?= $dtbarang['klasifikasi']; ?></option>
                            <option value="Obat">Obat</option>
                            <option value="BMHP">BMHP</option>
                            <option value="Reagen">Reagen</option>
                            <option value="Vaksin">Vaksin</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="id_satuan">Sumber Barang</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="id_sumber" data-placeholder="Pilih Sumber Barang" required="">
                            <option >Pilih Sumber Barang</option>
                            <?php foreach ($sumber->result() as $dtsumber) : ?>
                              <option <?= $dtbarang['id_sumber']==$dtsumber->id_sumber ?'selected':'';?> value="<?= $dtsumber->id_sumber?>"><?= $dtsumber->nama_sumber?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" value="<?= $dtbarang['nama_barang']; ?>" placeholder="Masukan Nama Barang" required="">
                          <input type="text" hidden="" name="id_barang" value="<?= $dtbarang['id_barang']; ?>" required="">
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

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="harga_barang">Harga Barang</label>
                          <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="harga_barang" placeholder="Masukan Harga Barang" value="<?= $dtbarang['harga_barang']; ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="stok_barang">Stok Barang</label>
                          <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= $dtbarang['stok_barang']; ?>" name="stok_barang" maxlength="6" placeholder="Masukan Stok Barang" required="">
                        </div>

<!--                         <?php
                        $olddate='';
                        $epd = '-';
                        $ed = explode(',',$dtbarang['ed_barang']);
                        if ($dtbarang['ed_barang']!=NULL AND $dtbarang['ed_barang']!='-') {
                          foreach ($ed as $item) {
                            $newdate = $item;
                            if ($newdate=='-') {
                              $epd = '-';
                            } else {
                              if ($olddate<$newdate) {
                                $epd = $newdate.',';
                                $olddate = $newdate;
                              }
                            }

                          };
                        } else {
                          $epd = '-';
                        };
                        ?>
 -->
                        <div class="form-group">
                          <label for="ed_barang">Expired Date Barang</label>
                          <textarea class="form-control" style="height: 123px;" name="ed_barang" placeholder="Masukan Expired Date Barang" required=""><?= $dtbarang['ed_barang'];?></textarea>
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
