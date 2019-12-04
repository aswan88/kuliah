<?php 
include 'koneksi.php';
session_start();
$data = mysqli_query($conn, "SELECT * FROM artikel");
?>


<!-- memanggil header -->
<?php include 'page/header.php'; ?>

<!-- memanggil sidebar -->
<?php include 'page/sidebar.php'; ?>
<div class="col-md-8 mt-5 ml-4 mb-4">
 <a href="tambah-artikel.php" class="btn btn-primary">Tambah Data</a>
 <div class="table-responsive mt-5">
  <table id="table_id" class="display table table-hover " width="100%">
    <thead>
      <tr>
        <th>Judul Artikel</th>
        <th>Tanggal Tulis</th>
        <th>Gambar</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $row) : ?>
        <tr>
          <td><?= $row['judul']; ?></td>
          <td><?= $row['tanggal_tulis']; ?></td>

          <td><img src="../img/artikel/<?= $row['gambar']?>" width="50" ></td>
          <td><?= $row['deskripsi_artikel']; ?></td>
          <td>
            <a href="ubah-artikel.php?id=<?= $row['id_artikel']; ?>"><i class="fas fa-edit"></i></a>
            <a onclick="return confirm('Yakin Ingin Menghapus Data Ini..??')" href="hapus-artikel.php?id=<?= $row['id_artikel']?>" class="link"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</div>
</div>
<!-- memanggil footer -->
<?php include 'page/footer.php'; ?>
