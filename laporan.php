<?php 
include 'admin/koneksi.php';
session_start();
@$login = $_SESSION['login'];
if (isset($_POST['submit'])) {
  if ($login != true) {
   $pesan= "
   <div class='alert alert-danger' role='alert'>
   Anda Harus Login Terlebih Dahulu..!
   </div>
   ";
 }else{
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $sumber = htmlspecialchars($_POST['sumber']);
  $nama_isu = htmlspecialchars($_POST['nama_isu']);
  $laporan = htmlspecialchars($_POST['laporan']);

  $query = mysqli_query($conn, "INSERT INTO laporan VALUES('','$tanggal', '$sumber','$nama_isu','$laporan') ");

  if (!$query) {
    echo "
    <script>
    alert('Laporan Gagal Di Kirim..!');
    window.location.href='laporan.php';
    </script>
    ";
  }else{
    $pesan= "
    <div class='alert alert-success' role='alert'>
    Terima Kasih Laporan Anda Akan Kami Proses..!
    </div>
    ";
  }
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
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Anti Hoax</title>
  <style type="text/css">
    #baner{
      width: 100%;
      height: 20vw;
    }
    #baner img{
      height: 20vw;
      width: 100%;
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
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="laporan.php">Laporan</a>
          </li>
          <li class="nav-item">
            <?php if (@$_SESSION['login']==true): ?>
              <a class="nav-link" href="logout.php">Log out</a>
              <?php else: ?>
                <a class="nav-link" href="login.php">Log In</a>
              <?php endif ?>

            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div id="baner">
        <img src="img/bg.png">
      </div>
      <div class="row">
        <div class="alert alert-warning w-100" role="alert">
          <h4><marquee>Laporkan Berita-Berita Di Sekitar Anda..!! </marquee></h4>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Cara Membuat Laporan</h3>
            <ul class="list-group">
              <li class="list-group-item font-weight-bold"><span>1. </span>Login jika belum punya akun Wajib registrasi</li>
              <li class="list-group-item font-weight-bold"><span>2. </span>Isi Form Laporan Di Samping..</li>
              <li class="list-group-item font-weight-bold"><span>3. </span>Laporan Anda Akan Di Terima Admin Dan Akan Di Pastikan Oleh Admin Kebenaran Beritanya Dari Pihak Terkait Dan Di Ifokan Di Website Ini</li>
            </ul>
          </div>
          <div class="col-md-6 bg-light p-5">
            <?php 
            if (isset($_POST['submit'])) {
              echo $pesan;
            }
            ?>
            <h3>Kirim Laporan.</h3>
            <form action="" method="post">
              <div class="form-group">
                <input type="date" class="form-control form-control-user" name="tanggal" placeholder="tanggal" required="harus di isi">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="sumber" placeholder="Sumber Atau Pengirim" required="harus di isi">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="nama_isu" placeholder="Nama Isu" required="harus di isi">
              </div>
              <div class="form-group">
                <textarea class="form-control form-control-user " name="laporan" placeholder="Deskripsi Laporan" required="harus di isi"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                Kirim Berita
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <nav class="navbar-dark bg-danger">
      <div class="row border-bottom p-3 justify-content-md-center">
        <h4 class="text-center text-white">Design By_Opick</h4>
      </div>
      <div class="row border-bottom justify-content-md-center">
        <p class="text-center text-white">Copyright_@2019</p>
      </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
  </html>