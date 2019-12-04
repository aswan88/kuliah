<?php 
@session_start();
$login = $_SESSION['login'];
if ($login != true) {
  header("location:index.php");
}

// mengecek tombol logout{
  session_destroy();
  header("Location:index.php");
 ?>
