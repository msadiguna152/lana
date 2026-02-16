    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h4 class="m-0 font-weight-bold text-info">
                <i class="fas fa-user-circle"></i> Profil Pengguna
              </h4>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('konfirmasi');?>"></div>
          <div class="flash-data3" data-flashdata="<?= $this->session->flashdata('pesan');?>"></div>

          <div class="row">
            <section class="col-lg-12">
              <div class="row">
                <div class="col-xl-4 col-md-4 col-sm-12">
                  <div class="card card-modern">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url();?>profil/<?= $dtpengguna['foto_pengguna']; ?>" alt="User profile picture">
                      </div>

                      <h3 class="profile-username text-center"><?= $dtpengguna['nama_pengguna']; ?></h3>

                      <p class="text-success text-center">Level : <?= $dtpengguna['level']; ?> | Status : <?= $dtpengguna['status_pengguna']; ?></p>

                    </div>
                  </div>
                </div>

                <div class="col-xl-8 col-md-8 col-sm-12">
                  <div class="card card-modern">

                    <form role="form" action="<?= site_url('Beranda/update_proses');?>" method="post" enctype="multipart/form-data">
                      <div class="card-body p-3">
                        <div class="row">

                          <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="form-group">
                              <label for="nama_pengguna">Nama Pengguna</label>
                              <input type="text" class="form-control date" id="" name="nama_pengguna" value="<?= $dtpengguna['nama_pengguna']; ?>" required="">
                            </div>
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control date" id="" name="username" value="<?= $dtpengguna['username']; ?>" required="">
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="text" class="form-control" id="txtPassword" name="password" value="">
                            </div>
                            <div class="form-group">
                              <label for="password">Konfirmasi Password</label>
                              <input type="text" class="form-control" id="txtConfirmPassword" value="">
                            </div>
                          </div>

                          <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="form-group">
                              <label for="foto_pengguna">Foto Pengguna</label>
                              <input type="file" class="form-control-file" id="" name="foto_pengguna">
                            </div>
                            <div class="form-group mt-4">
                              <label for="foto_pengguna">Simpan Perubahan?</label>
                              <button type="submit" id="btnSubmit" name="simpan" class="btn btn-block btn-info">Ya, Simpan!</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </section>

          </div>
        </div>
      </section>
    </div>
