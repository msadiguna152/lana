
<body class="hold-transition sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed pace-info">

  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-info" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-info"><marquee><b>Sistem Informasi Manajemen Barang Habis Pakai - Kantah Kab. Tanah Laut</b></marquee></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Beranda/update');?>">
            <i class="fas fa-user" data-toggle="tooltip" data-html="true" title="Anda login sebagai : <?= $this->session->userdata('nama_pengguna');?> <br> Level : <?= $this->session->userdata('level');?>"></i>
          </a>
        </li>

        <?php $jnotif = $this->db->query("SELECT * FROM `barang_keluar` JOIN pegawai ON barang_keluar.id_pegawai=pegawai.id_pegawai WHERE barang_keluar.status_barang_keluar='Menunggu' ORDER BY barang_keluar.id_barang_keluar DESC"); ?>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?= $jnotif->num_rows(); ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Pemberitahuan Permintaan</span>
            <?php foreach ($jnotif->result() as $dtnotif) : ?>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url();?>Barang_keluar/update/<?= $dtnotif->id_barang_keluar; ?>" class="dropdown-item">
                <?= $dtnotif->nama_pegawai;?>
                <span class="float-right text-muted text-sm"><?= format_indo($dtnotif->tanggal_pengajuan);?></span>
              </a>
              <div class="dropdown-divider"></div>
            <?php endforeach;?>
            <a href="<?= base_url('Barang_keluar')?>" class="dropdown-item dropdown-footer">Lihat Semua</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <aside class="main-sidebar elevation-4 sidebar-light-info">
      <a href="" class="brand-link bg-info">
        <img src="<?= base_url('assets/logo_tala.png');?>" alt="AdminLTE Logo" class="brand-image" style="">
        <span class="brand-text font-weight-light"><b>S I M B H P</b></span>
      </a>

      <div class="sidebar">

        <div class="user-panel mt-3 pb-3 d-flex">
          <div class="image">
            <img src="<?= base_url();?>profil/<?= $this->session->userdata('foto_pengguna');?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block text-info"><?= $this->session->userdata('nama_pengguna');?></a>
          </div>
        </div>

        <nav class="mt-0">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Menu</li>
            <li class="nav-item ">
              <a href="<?= base_url('Beranda');?>" class="nav-link <?= ($menu == "Beranda") ? "active" : "";?>">
                <i class="nav-icon fas fa-home"></i>
                <p>Beranda</p>
              </a>
            </li>

            <?php if ($this->session->userdata('level') === 'Operator') { ?>

            <li class="nav-item ">
              <a href="<?= base_url('Barang');?>" class="nav-link <?= ($menu == "Barang" ) ? "active" : "";?>">
                <i class="nav-icon fas fa-book"></i>
                <p>Data Barang</p>
              </a>
            </li>

            <li class="nav-item <?= ($menu == "Barang Masuk" OR $menu == "Barang Keluar") ? "menu-open" : "";?>">
              <a href="#" class="nav-link <?= ($menu == "Barang Masuk" OR $menu == "Barang Keluar") ? "active" : "";?>">
                <i class="nav-icon fas fa-edit"></i>
                <p>Transaksi Barang<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Barang_masuk');?>" class="nav-link <?= ($menu == "Barang Masuk") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang Masuk</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url('Barang_keluar');?>" class="nav-link <?= ($menu == "Barang Keluar") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang Keluar</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item <?= ($menu == "Laporan" OR $menu == "Laporan2") ? "menu-open" : "";?>">
              <a href="#" class="nav-link <?= ($menu == "Laporan" OR $menu == "Laporan2") ? "active" : "";?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>Laporan<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">

                <!-- <li class="nav-item">
                  <a href="<?= base_url()?>Laporan/DINAMIKA" class="nav-link <?= ($menu == "Laporan") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinamika IFK</p>
                  </a>
                </li>
 -->
              </ul>
            </li>
            <?php } else { ?>
              <li class="nav-item ">
              <a href="<?= base_url('Barang_keluar');?>" class="nav-link <?= ($menu == "Permintaan Barang") ? "active" : "";?>">
                <i class="nav-icon fas fa-list"></i>
                <p>Permintaan</p>
              </a>
            </li>
            <?php }?>

            <?php if ($this->session->userdata('level') === 'Operator') { ?>
            <li class="nav-item ">
              <a href="<?= base_url();?>Pegawai" class="nav-link <?= ($menu == "Pegawai") ? "active" : "";?>">
                <i class="nav-icon fas fa-users"></i>
                <p>Data Pegawai</p>
              </a>
            </li>
            <?php } else { ?>
              <li class="nav-item ">
                <a href="<?= base_url();?>Pegawai" class="nav-link <?= ($menu == "Biodata") ? "active" : "";?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Biodata</p>
                </a>
              </li>
            <?php };?>

            <?php if ($this->session->userdata('level') === 'Operator') { ?>
            <li class="nav-item <?= ($menu == "Pengguna" OR $menu == "Satuan" OR $menu == "Jabatan" OR $menu == "Pangkat" OR $menu == "Seksi") ? "menu-open" : "";?>">
              <a href="#" class="nav-link <?= ($menu == "Pengguna" OR $menu == "Satuan" OR $menu == "Jabatan" OR $menu == "Pangkat" OR $menu == "Seksi") ? "active" : "";?>">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Kelola Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="<?= base_url();?>Jabatan" class="nav-link <?= ($menu == "Jabatan") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jabatan</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url();?>Pangkat" class="nav-link <?= ($menu == "Pangkat") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pangkat / Golongan</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url();?>Bidang" class="nav-link <?= ($menu == "Seksi") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seksi</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url();?>Satuan" class="nav-link <?= ($menu == "Satuan") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Satuan</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url();?>Pengguna" class="nav-link <?= ($menu == "Pengguna") ? "active" : "";?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengguna</p>
                  </a>
                </li>

              </ul>

              
            </li>
            <?php };?>

            <li class="nav-item ">
                <a href="<?= base_url('Login/proses_logout');?>" class="nav-link tombol-logout">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
          </ul>
        </nav>
      </div>
    </aside>