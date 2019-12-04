<?php 
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM user JOIN user_level ON user.id_user_level = user_level.id_user_level");
?>


<!-- memanggil header -->
<?php include 'page/header.php'; ?>

<!-- memanggil sidebar -->
<?php include 'page/sidebar.php'; ?>
<div class="col-md-8 mt-5 ml-4 mb-4">
  <h4>Data User</h4>
  <div class="table-responsive mt-5">
    <table id="table_id" class="display table table-hover " width="100%">
      <thead>
        <tr>
          <th>Level</th>
          <th>Username</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) : ?>
          <tr>
            <td><?= $row['level']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['password']; ?></td>
            <td>
              <a onclick="return confirm('Yakin Ingin Menghapus Data Ini..??')" href="hapus-user.php?id=<?= $row['id_user']?>" class="link"><i class="fas fa-trash-alt"></i></a>
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
