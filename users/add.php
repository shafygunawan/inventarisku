<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/admin.php';
require_once __DIR__ . '/../config/db.php';

$title = 'User Baru';

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $level = $_POST["level"];

  $users = mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$name', '$email', '$password', '$level')");
  if ($users) {
    echo "<script>
        alert('Barang berhasil disimpan!');
        window.location.href = './index.php';
      </script>";
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
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" placeholder="Nama" name="name" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" placeholder="email" name="email" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="password" placeholder="password" name="password" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10 items">
                  <select class="custom-select" name="level">
                    <option value="" disabled selected>--- Pilih Level ---</option>
                    <option value=0>User</option>
                    <option value=1>Admin</option>
                  </select>
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