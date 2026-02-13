    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 text-info">Data <?= $menu; ?></h5>
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
                <form role="form" action="<?= site_url('Pengaturanttd/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="row">

                      <div class="col-md-6">
                        <div class="card card-outline card-info">
                          <div class="card-header">
                            <h5 class="card-title mb-0">Pihak Mengetahui</h5>
                          </div>
                          <div class="card-body">

                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" name="nama_mengetahui" class="form-control" required value="<?= $dtedit['nama_mengetahui']; ?>">
                              <input type="text" name="id_pengaturanttd" hidden value="<?= $dtedit['id_pengaturanttd']; ?>">

                            </div>

                            <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip_mengetahui" class="form-control" required value="<?= $dtedit['nip_mengetahui']; ?>">
                            </div>

                            <div class="form-group">
                              <label>Jabatan (Baris 1)</label>
                              <input type="text" name="jabatan_mengetahui_b1" class="form-control" required value="<?= $dtedit['jabatan_mengetahui_b1']; ?>">
                            </div>

                            <div class="form-group">
                              <label>Jabatan (Baris 2)</label>
                              <input type="text" name="jabatan_mengetahui_b2" class="form-control" value="<?= $dtedit['jabatan_mengetahui_b2']; ?>">
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="card card-outline card-success">
                          <div class="card-header">
                            <h5 class="card-title mb-0">Pihak Diserahkan</h5>
                          </div>
                          <div class="card-body">

                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" name="nama_diserahkan" class="form-control" required value="<?= $dtedit['nama_diserahkan']; ?>">
                            </div>

                            <div class="form-group">
                              <label>NIP</label>
                              <input type="text" name="nip_diserahkan" class="form-control" required value="<?= $dtedit['nip_diserahkan']; ?>">
                            </div>

                            <div class="form-group">
                              <label>Jabatan (Baris 1)</label>
                              <input type="text" name="jabatan_diserahkan_b1" class="form-control" required value="<?= $dtedit['jabatan_diserahkan_b1']; ?>">
                            </div>

                            <div class="form-group">
                              <label>Jabatan (Baris 2)</label>
                              <input type="text" name="jabatan_diserahkan_b2" class="form-control" value="<?= $dtedit['jabatan_diserahkan_b2']; ?>">
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>

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
