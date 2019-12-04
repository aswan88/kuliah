<?php 

$host = "localhost";
$username ="root";
$pass = "";
$db = "db_laporan";

$conn = mysqli_connect("$host", "$username", "$pass", "$db");

if ($conn == false) {
	die("Koneksi gagal: " . mysqli_connect_error());
}


 ?>