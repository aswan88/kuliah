
<?php 
include 'admin/koneksi.php';

if (isset($_POST['submit'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  $user_level = 2;
  if ($password == $password2) {
    $query = mysqli_query($conn, "INSERT INTO user VALUES('','$user_level', '$username', '$password')");
    if (!$query) {
      echo "Gagal".mysqli_error($conn);
    }else{
      echo "
      <script>
      alert('Registrasi Berhasil..!');
      window.location.href='login.php';
      </script>
      ";
    }
  }else{
    echo "
    <script>
    alert('Registrasi Gagal..!');
    window.location.href='login.php';
    </script>
    ";
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
</head>
<body>
  <div class="row justify-content-md-center mt-5">
    <div class="col-md-4">
      <div class="card">
        <h5 class="card-header">Registrasi ..</h5>
        <div class="card-body">
          <form class="border-bottom pb-2" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder=" Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" name="password2" class="form-control" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Registrasi</button>
          </form>
          <a href="login.php" class="text-center">Malas Login ..->Kembali..!!</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>