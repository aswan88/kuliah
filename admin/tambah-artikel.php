<?php 
include 'koneksi.php';



// mengecek jika ada yang ingin di kirim untuk di simpan
if (isset($_POST['submit'])) {
  $judul = htmlspecialchars($_POST['judul']);
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);
    // mengeksekusi Gambar
  $foto = $_FILES['foto']['name']; //mengambil nama dari foto
  $ukuran = $_FILES['foto']['size']; //mengambil ukuran dari foto
  $tmp = $_FILES['foto']['tmp_name']; //mengambill lokasi folder foto
  $ekstensi_gambar = array('png', 'jpg','jpeg','gif'); // menyaring ekstensi gambar
  $x = explode('.', $foto); // memecah nama gambar dalam nama dan ekstensinya
  $ekstensi = strtolower(end($x)); //membuat ekstensi gambar menjadi huruf kecil
  
  if (in_array($ekstensi, $ekstensi_gambar) == true) { // mengecek ekstensi gambar

       if ($ukuran < 1044070) { //mengecek uuran gambar
         $fotobaru = date('dmYHis').$foto; //membuat nama gambar berubah dengan menambahka waktu upload
         $query = mysqli_query($conn,"INSERT INTO artikel VALUES ('','$judul','$tanggal','$fotobaru','$deskripsi' ) ");//melakukan query simpan ke database

         if (!$query) { //jika query gagal
           echo "Pesan error: ".mysqli_error($conn); //pesan error
         }else{//jika berhasil
          move_uploaded_file($tmp, '../img/artikel/'.$fotobaru);//upload gambar ke dalam folder img/artikel
          echo "
          <script>
          alert('Data Berhasil Di Tambahkan..!');
          window.location.href='index.php';
          </script>
          ";
        }


       }else{ //jika ukuran gambar terlalu besar
        echo "
        <script>
        alert('Gagal.. Ukuran Gambar terlalu Besar..!');
        window.location.href='index.php';
        </script>
        ";
      }
  }else{ //jika ekstensi gambr salah
    echo "
    <script>
    alert('Gagal.. Bukan Gambar Periksa Ekstensi Gambar..!');
    window.location.href='index.php';
    </script>
    ";
  }
}

?>


<!-- memanggil header -->
<?php include 'page/header.php'; ?>

<!-- memanggil sidebar -->
<?php include 'page/sidebar.php'; ?>
<div class="col-md-8 mt-5 ml-4 mb-4">

  <div class="row justify-content-md-center">
    <h5 style="text-align: center;">Tambah Artikel</h5>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" class="form-control form-control-user" name="judul" placeholder="Judul Artikel">
    </div>
    <div class="form-group">
      <input type="date" class="form-control form-control-user" name="tanggal" placeholder="tanggal Penulisan">
    </div>
     <div class="form-group">
      <input type="file" class="form-control form-control-user" name="foto" placeholder="Foto Artikel">
    </div>
    <div class="form-group">
      <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Artikel" height="300" ></textarea>
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
