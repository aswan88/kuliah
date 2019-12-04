<?php
include 'koneksi.php';
@session_start();
if ($_SESSION['user_id'] != 1) {
  header("Location:../index.php");
  if ($_SESSION['login'] != true) {
    header("Location:../index.php");
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free/css/all.min.css">

  <title>Anti Hoax</title>
  <style type="text/css">
    .nav-item a:hover{
      background-color: red;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="#">Website Laporan Isu-Isu Gempa</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
           <li class="nav-item active">
            <a class="nav-link" href="../index.php">Lihat Halaman</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../logout.php">Log Out<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

