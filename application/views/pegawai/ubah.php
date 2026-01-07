    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
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
                <form role="form" action="<?= site_url('Pegawai/update_proses');?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="nama_pegawai">Nama Pegawai</label>
                          <input type="text" class="form-control" name="nama_pegawai" value="<?= $dtpegawai['nama_pegawai']; ?>" placeholder="Masukan Nama Pegawai" required="">
                          <input type="text" hidden="" name="id_pegawai" value="<?= $dtpegawai['id_pegawai']; ?>" required="">
                        </div>

                        <div class="form-group">
                          <label for="nip_no_reg">NIP / No. Reg</label>
                          <input type="text" class="form-control" name="nip_no_reg" value="<?= $dtpegawai['nip_no_reg']; ?>" placeholder="Masukan NIP / No. Reg" required="">

                        </div>

                        <div class="form-group">
                          <label for="jenis_register">Jenis Register</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="jenis_register" data-placeholder="---Pilih Jenis Register---" required="">
                            <option selected value="<?= $dtpegawai['jenis_register']; ?>"><?= $dtpegawai['jenis_register']; ?></option>
                            <option value="NIP">NIP</option>
                            <option value="NI PPPK">NI PPPK</option>
                            <option value="REG">REG</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="id_bidang">Seksi</label>
                          <select class="form-control select2bs4" name="id_bidang" data-placeholder="---Pilih Seksi---" required="">
                            <option value="">---Pilih Seksi---</option>
                            <?php foreach ($bidang->result() as $dtbidang) : ?>
                              <option <?= $dtpegawai['id_bidang']==$dtbidang->id_bidang ?'selected':'';?> value="<?= $dtbidang->id_bidang;?>"><?= $dtbidang->nama_bidang;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-12">

                        <div class="form-group">
                          <label for="id_pangkat">Pangkat / Golongan</label>
                          <select class="form-control select2bs4" name="id_pangkat" data-placeholder="---Pilih Pangkat / Golongan---" required="">
                            <option value="">---Pilih Pangkat / Golongan---</option>
                            <?php foreach ($pangkat->result() as $dtpangkat) : ?>
                              <option <?= $dtpegawai['id_pangkat']==$dtpangkat->id_pangkat ?'selected':'';?> value="<?= $dtpangkat->id_pangkat;?>"><?= $dtpangkat->nama_pangkat;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="id_jabatan">Jabatan</label>
                          <select class="form-control select2bs4" name="id_jabatan" data-placeholder="---Pilih Jabatan---" required="">
                            <option value="">---Pilih Jabatan---</option>
                            <?php foreach ($jabatan->result() as $dtjabatan) : ?>
                              <option <?= $dtpegawai['id_jabatan']==$dtjabatan->id_jabatan ?'selected':'';?> value="<?= $dtjabatan->id_jabatan;?>"><?= $dtjabatan->nama_jabatan;?></option>
                            <?php endforeach;?>
                          </select>
                        </div>

                          <div class="form-group" <?= ($levelUser === 'Operator') ? '' : 'hidden'; ?>>
                            <label for="status_pegawai">Status Pegawai</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="status_pegawai" data-placeholder="---Pilih Status Pegawai---" required="">
                              <option selected value="<?= $dtpegawai['status_pegawai']; ?>"><?= $dtpegawai['status_pegawai']; ?></option>
                              <option value="Aktif">Aktif</option>
                              <option value="Non Aktif">Non Aktif</option>
                            </select>
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

