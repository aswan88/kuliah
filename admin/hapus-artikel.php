<!-- memanggil koneksi database -->
<?php

 include 'koneksi.php'; 

// menangkap id dar url
$id = $_GET['id'];
// mengkueryatau mangambil data dari tabel
$result = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel ='$id' ");
$data = mysqli_fetch_assoc($result);

unlink("../img/artikel/".$data['gambar']); // Hapus file gambar sebelumnya yang ada di folder images

// query untuk menghapus data dari tabel di tadabase berdasarkan id

$r =mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel ='$id' ");

if (!$r) {
	die("menhapus gagal: " . mysqli_error($conn));
}else{
	header("Location:index.php");
}
?>
