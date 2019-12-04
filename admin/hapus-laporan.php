<!-- memanggil koneksi database -->
<?php

 include 'koneksi.php'; 

// menangkap id dar url
$id = $_GET['id'];

// query untuk menghapus data dari tabel di tadabase berdasarkan id

$r =mysqli_query($conn, "DELETE FROM laporan WHERE id_laporan ='$id' ");

if (!$r) {
	die("menhapus gagal: " . mysqli_error($conn));
}else{
	header("Location:laporan.php");
}
?>
