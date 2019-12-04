<?php 
include 'admin/koneksi.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password ='$password'");

  if ($resault = mysqli_fetch_assoc($query)) {
    if ($resault['id_user_level']!=1) {
      session_start();
      $_SESSION['login'] = true;
      header("Location:index.php");
    }else{
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['user_id'] = $resault['id_user_level'];
      header("Location:admin/index.php");
    }
    
  }else{
    echo mysqli_error($conn);
    $pesan= "
    <div class='alert alert-danger' role='alert'>
    Username/Password Salah..!
    </div>
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

        <h5 class="card-header">Login ..</h5>
        <div class="card-body">
          <?php 
          if (isset($_POST['submit'])) {
            echo $pesan;
          }
          ?>
          <form class="border-bottom pb-2" method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary ml-auto">Login</button>
          </form>
          <a href="registrasi.php" class="text-center">Belum Punya Akun .. Registrasi->Disini..!!</a><br>
          <a href="index.php" class="text-center">Kembali->Disini..!!</a>
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