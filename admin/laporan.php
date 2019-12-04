<?php 
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM laporan");
?>


<!-- memanggil header -->
<?php include 'page/header.php'; ?>

<!-- memanggil sidebar -->
<?php include 'page/sidebar.php'; ?>
<div class="col-md-8 mt-5 ml-4 mb-4">
  <h4>Data Laporan</h4>
  <div class="table-responsive mt-5">
    <table id="table_id" class="display table table-hover " width="100%">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Nama Isu</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) : ?>
          <tr>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['nama_isu']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td>
              <a onclick="return confirm('Yakin Ingin Menghapus Data Ini..??')" href="hapus-laporan.php?id=<?= $row['id_laporan']?>" class="link"><i class="fas fa-trash-alt"></i></a>
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
