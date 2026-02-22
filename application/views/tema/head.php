<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Persediaan ATK - Kantah Kab. Tanah Laut</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/logo.png');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom.css'); ?>">

  <!-- pace-progress -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/plugins/pace-progress/corner-indicator.css"> -->

  <style>
    .navbar-badge {
      font-size: 11px;
      padding: 5px 7px;
      border-radius: 50%;
    }

    .notif-item {
      transition: 0.2s;
    }

    .notif-item:hover {
      background-color: #f4f6f9;
    }

    .notif-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .download-box {
      display: block;
      padding: 25px 10px;
      border-radius: 10px;
      transition: 0.3s;
      text-decoration: none;
      color: #333;
      background: #f8f9fa;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .download-box:hover {
      transform: translateY(-5px);
      text-decoration: none;
    }

    .pdf-box {
      border: 2px solid #dc3545;
      color: #dc3545;
    }

    .pdf-box:hover {
      background: #dc3545;
      color: #fff;
    }

    .excel-box {
      border: 2px solid #28a745;
      color: #28a745;
    }

    .excel-box:hover {
      background: #28a745;
      color: #fff;
    }
  </style>

</head>