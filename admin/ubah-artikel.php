<?php 
include 'koneksi.php';

// menangkap id dar url
$id = $_GET['id'];
// mengkueryatau mangambil data dari tabel
$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel ='$id' ");
$row = mysqli_fetch_assoc($query);



// mengecek jika ada yang ingin di kirim untuk di simpan
if (isset($_POST['submit'])){
 $judul = htmlspecialchars($_POST['judul']);
 $tanggal = htmlspecialchars($_POST['tanggal']);
 $deskripsi = htmlspecialchars($_POST['deskripsi']);
 // mengecek apakah user ingin mengubah gambar
 if (isset($_POST['ubah_foto'])) {
    // mengeksekusi gambar
  $foto = $_FILES['foto']['name'];
  $ekstensi_gambar = array('png', 'jpg','jpeg','gif');
  $x = explode('.', $foto);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['foto']['size'];
  $tmp = $_FILES['foto']['tmp_name'];

    // mengecek ekstensi gambar
  if (in_array($ekstensi, $ekstensi_gambar)==true) {
      // MENGECEK ukuran gambar
    if ($ukuran < 1044070) {
      $fotobaru = date('dmYHis').$foto;

      if (move_uploaded_file($tmp, '../img/artikel/'.$fotobaru)) {

       $result = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel ='$id' ");
       $data = mysqli_fetch_assoc($result);

          unlink("../img/artikel/".$data['gambar']); // Hapus file foto sebelumnya yang ada di folder images

          $query = mysqli_query($conn, "UPDATE artikel SET id_artikel = '$id', judul='$judul', tanggal_tulis = '$tanggal', gambar = '$fotobaru', deskripsi_artikel ='$deskripsi' WHERE id_artikel ='$id' ");

          if (!$query) {
            echo "Pesan error: ".mysqli_error($conn);
          }else{

            echo "
            <script>
            alert('Data Berhasil Di edit..!');
            window.location.href='index.php';
            </script>

            ";
          }
        }else{
          echo "
          <script>
          alert('gambar yang anda masukan gagal di upload');
          </script>
          ";
        }

      }else{
        echo "
        <script>
        alert('gambar yang anda masukan terlalu besar minimal ukuran 1mb..!');
        window.location.href='index.php';
        </script>
        ";
      }


    }else{
      echo "
      <script>
      alert('Bukan Gambar Periksa Ekstensi Gambar..!');
      window.location.href='index.php';
      </script>
      ";
    }

  }
  else{
    $query = mysqli_query($conn, "UPDATE artikel SET id_artikel = '$id', judul='$judul', tanggal_tulis = '$tanggal', deskripsi_artikel ='$deskripsi' WHERE id_artikel ='$id' ");

    if (!$query) {
      echo "Pesan error: ".mysqli_error($conn);
    }else{
      echo "
      <script>
      alert('Data Berhasil Di edit..!');
      window.location.href='index.php';
      </script>

      ";
    }
  }
  
}

?>


<!-- memanggil header -->
<?php include 'page/header.php'; ?>

<!-- memanggil sidebar -->
<?php include 'page/sidebar.php'; ?>
<div class="col-md-8 mt-5 ml-4 mb-4">

  <div class="row justify-content-md-center">
    <h5 style="text-align: center;">Ubah Artikel</h5>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" class="form-control form-control-user" name="judul" value="<?= $row['judul'] ?>" placeholder="Judul Artikel">
    </div>
    <div class="form-group">
      <input type="date" class="form-control form-control-user" name="tanggal" value="<?= $row['tanggal_tulis'] ?>"placeholder="tanggal Penulisan">
    </div>
    <div class="form-group">
      <label for="foto" class="col-md-3 col-form-label">Foto : <img src="../img/artikel/<?= $row['gambar']; ?>" width="100"><br>
        <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
      </label>
      <input type="file" class="form-control form-control-user" name="foto" placeholder="Foto Artikel">
    </div>
    <div class="form-group">
      <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Artikel" height="300" ><?= $row['deskripsi_artikel']; ?></textarea>
    </div>
    <div class="float-right">
      <button type="reset" name="reset" class="btn btn-warning ml-auto"><i class="fas fa-sync mr-3"></i>Reset</button>
      <button type="submit" name="submit" class="btn btn-primary ml-auto"><i class="fas fa-save mr-3"></i>Simpan</button>
    </div>
  </form>
</div>
</div>
<!-- memanggil footer -->
<?php include 'page/footer.php'; ?>
