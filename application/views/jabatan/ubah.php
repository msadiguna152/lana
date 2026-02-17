    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Tambah Data <?= $menu; ?></h5>
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
                <form role="form" action="<?= site_url('Jabatan/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="nama_jabatan">Nama Jabatan</label>
                          <input type="text" class="form-control" id="" name="nama_jabatan" value="<?= $dtjabatan['nama_jabatan']; ?>" required="">
                          <input type="text" hidden="" name="id_jabatan" value="<?= $dtjabatan['id_jabatan']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="id_bidang">Seksi</label>
                          <select class="form-control select2bs4" name="id_bidang" data-placeholder="---Pilih Seksi---" required="">
                            <option value="">---Pilih Seksi---</option>
                            <?php foreach ($bidang->result() as $dtbidang) : ?>
                              <option <?= $dtjabatan['id_bidang']==$dtbidang->id_bidang ?'selected':'';?> value="<?= $dtbidang->id_bidang;?>"><?= $dtbidang->nama_bidang;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="keterangan_jabatan">Keterangan Jabatan</label>
                          <textarea class="form-control" style="height: 124px;"  id="" name="keterangan_jabatan"><?= $dtjabatan['keterangan_jabatan']; ?></textarea>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer" style="text-align: center;">
                    <button type="submit" id="btnSubmit" name="simpan" class="btn btn-info">Simpan</button>
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
