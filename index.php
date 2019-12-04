<?php 
include 'admin/koneksi.php';
session_start();
$query = mysqli_query($conn, "SELECT * FROM artikel");
// pembatas jumlah string
function limit_words($string, $word_limit){
  $words = explode(" ",$string);
  return implode(" ",array_splice($words,0,$word_limit));
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
        <div class="col-md-8">
          <div class="row">
            <div class="alert alert-warning w-100" role="alert">
              <h4><marquee>Hati-Hati Dengan Hoax Bisa Membunuhmu..!</marquee></h4>
            </div>
          </div>
          <?php foreach ($query as $data): ?>
            <div class="row border-bottom mt-2 mb-">
             <p>
              <img src="img/artikel/<?= $data['gambar']; ?>" width="400" height="250" class="float-left mr-3 mb-2">
              <a href="view.php?id=<?= $data['id_artikel']; ?>"><strong><?= $data['judul'] ?></strong></a><br>
              <small class="text-danger"><?= $data['tanggal_tulis']; ?></small><br>
              <?= limit_words( $data['deskripsi_artikel'],50 )?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            Berita Lainya
          </div>
          <ul class="list-group list-group-flush">
            <?php foreach ($query as $data): ?>
              <li class="list-group-item">
                <a href="view.php?id=<?= $data['id_artikel']; ?>"><strong><?= $data['judul'] ?></strong></a><br>
              </li>
            <?php endforeach; ?>
          </ul>
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
