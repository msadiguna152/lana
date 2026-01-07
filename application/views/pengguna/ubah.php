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
                <form role="form" action="<?= site_url('Pengguna/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="nama_pengguna">Nama Pengguna</label>
                          <input type="text" class="form-control date" id="" name="nama_pengguna" value="<?= $dtpengguna['nama_pengguna']; ?>" required="">
                          <input type="text" hidden="" name="id_pengguna" value="<?= $dtpengguna['id_pengguna']; ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" class="form-control date" id="" name="username" value="<?= $dtpengguna['username']; ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" class="form-control" id="txtPassword" name="password" value="">
                        </div>

                        <div class="form-group">
                          <label for="password">Konfirmasi Password</label>
                          <input type="text" class="form-control" id="txtConfirmPassword" value="">
                        </div>

                      </div>
                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="foto_pengguna">Foto Pengguna</label>
                          <input type="file" class="form-control" id="" name="foto_pengguna">
                        </div>

                        <div class="form-group">
                          <label for="level">Level</label>
                          <select class="form-control select2bs4" id="" name="level" data-placeholder="Pilih Level" required="">
                            <option selected value="<?= $dtpengguna['level']; ?>"><?= $dtpengguna['level']; ?></option>
                            <option value="Operator">Operator</option>
                            <option value="Pengusul">Pengusul</option>
                            <option value="Penyetuju">Penyetuju</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="status_pengguna">Status Pengguna</label>
                          <select class="form-control select2bs4" style="width: 100%;" id="" name="status_pengguna" data-placeholder="Pilih Status Pengguna" required="">
                            <option selected value="<?= $dtpengguna['status_pengguna']; ?>"><?= $dtpengguna['status_pengguna']; ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>
                          </select>
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
