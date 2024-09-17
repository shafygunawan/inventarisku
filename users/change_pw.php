<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/admin.php';
require_once __DIR__ . '/../config/db.php';

if (!isset($_GET['id'])) {
  die('ID pengguna tidak ditemukan.');
}

$user_id = intval($_GET['id']);
$title = 'Ubah Password Pengguna';

if (isset($_POST["submit"])) {
  $new_password = $_POST["new_password"];
  $confirm_password = $_POST["confirm_password"];

  if ($new_password === $confirm_password) {
    $update = mysqli_query($conn, "UPDATE users SET password = '$new_password' WHERE id = $user_id");
    if ($update) {
      echo "<script>
                alert('Password berhasil diubah!');
                window.location.href = './index.php';
            </script>";
    } else {
      echo "<script>alert('Gagal mengubah password!');</script>";
    }
  } else {
    echo "<script>alert('Password baru dan konfirmasi password tidak cocok!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | InventarisKu</title>
  <?php require_once __DIR__ . '/../partials/head.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php require_once __DIR__ . '/../partials/topbar.php' ?>
    <?php require_once __DIR__ . '/../partials/sidebar.php' ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="./index.php">User</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form <?= $title ?></h3>
          </div>
          <form action="" method="post" class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="new_password" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="confirm_password" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="./index.php" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-info float-right" name="submit">Simpan</button>
            </div>
          </form>
        </div>
      </section>
    </div>
    <?php require_once __DIR__ . '/../partials/footer.php' ?>
  </div>
  <?php require_once __DIR__ . '/../partials/body.php' ?>
</body>

</html>