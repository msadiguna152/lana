<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Manajemen Barang Habis Pakai - Kantah Kab. Tanah Laut</title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/logo.png');?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/adminlte.min.css">

  <style>
    /* ======================================================
   BACKGROUND GRADIENT ANIMATED
====================================================== */

.ignielPelangi {
  background: linear-gradient(
    135deg,
    #0B3C5D,
    #5DADE2,
    #2E8B57,
    #D4AF37
  );
  background-size: 400% 400%;
  animation: gradientMove 12s ease infinite;
}

@keyframes gradientMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}



/* ======================================================
   CARD GLASS LOGIN
====================================================== */

.login-box .card {
  border-radius: 20px;
  backdrop-filter: blur(20px);
  background: rgba(255, 255, 255, 0.92);
  box-shadow: 0 25px 50px rgba(0,0,0,0.2);
  animation: fadeUp 0.8s ease;
}

@keyframes fadeUp {
  from { opacity:0; transform: translateY(30px);}
  to { opacity:1; transform: translateY(0);}
}



/* ======================================================
   LOGO GLOW
====================================================== */

.login-box img {
  transition: 0.4s ease;
}

.login-box img:hover {
  transform: scale(1.05);
  filter: drop-shadow(0 0 20px rgba(13,110,253,0.6));
}



/* ======================================================
   INPUT MODERN
====================================================== */

.form-control {
  border-radius: 10px;
  transition: 0.3s ease;
}

.form-control:focus {
  border-color: #17a2b8;
  box-shadow: 0 0 15px rgba(23,162,184,0.4);
}



/* ======================================================
   LOGIN BUTTON PREMIUM
====================================================== */

.btn-outline-info {
  border-radius: 12px;
  font-weight: 600;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.btn-outline-info:hover {
  background-color: #17a2b8;
  color: #fff;
  box-shadow: 0 0 20px rgba(23,162,184,0.7);
  transform: translateY(-3px);
}

/* Shine effect */
.btn-outline-info::before {
  content: "";
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: linear-gradient(
    120deg,
    rgba(255,255,255,0.1),
    rgba(255,255,255,0.5),
    rgba(255,255,255,0.1)
  );
  transform: skewX(-20deg);
  animation: shineMove 3s infinite linear;
}

@keyframes shineMove {
  100% { left: 125%; }
}



/* ======================================================
   TITLE GLOW
====================================================== */

.text-info {
  text-shadow: 0 0 8px rgba(23,162,184,0.6);
}

.login-title {
  overflow: hidden;
  white-space: nowrap;
  animation: typing 3s steps(30,end);
}

@keyframes typing {
  from { width:0 }
  to { width:100% }
}


</style>
</head>
<body class="hold-transition login-page ignielPelangi">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card bg-white shadow">
      <div class="card-header text-center">
        <img src="<?= base_url('assets/logo.png')?>" class="img img-fluid m-3" style="height: 200px;"><br>
        <a class="h5 text-info login-title"><b>SIP ATK </b></a><br>
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
