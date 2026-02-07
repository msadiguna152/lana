<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Manajemen Barang Habis Pakai - Kantah Kab. Tanah Laut</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/adminlte.min.css">

  <style type="text/css">
    .ignielPelangi {
/*      background: linear-gradient(45deg, #edfafd, #aed9da, #3ddad7, #2a93d5, #135589);*/
      /*background: linear-gradient(135deg, #FFFFFF,#D4AF37,#0B3C5D,#8B5A2B,#2E8B57,#5DADE2);*/
      background: linear-gradient(
  135deg,
  #0B3C5D,
  #5DADE2,
  #2E8B57,
  #D4AF37
);
      background-size: 500% 500%;
      -webkit-animation: ignielGradient 12s ease infinite;
      -moz-animation: ignielGradient 12s ease infinite;
      animation: ignielGradient 12s ease infinite;
    }
    @-webkit-keyframes ignielGradient {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
    }
    @-moz-keyframes ignielGradient {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
    }
    @keyframes ignielGradient {
      0%{background-position:0% 50%}
      50%{background-position:100% 50%}
      100%{background-position:0% 50%}
    }
  </style>
</head>
<body class="hold-transition login-page ignielPelangi">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card bg-white shadow">
      <div class="card-header text-center">
        <img src="<?= base_url('assets/logo.png')?>" class="img img-fluid m-3" style="height: 200px;"><br>
        <a class="h5 text-info"><b>SIP ATK </b></a><br>
        <a class="text text-dark"><b>Sistem Informasi Persediaan ATK - Kantah Kab. Tanah Laut</b></a>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('pesan');?>

        <form method="POST" action="<?= base_url('Login/proses_login'); ?>">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" requireds>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-outline-info btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
