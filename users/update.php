<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/admin.php';
require_once __DIR__ . '/../config/db.php';

$title = 'Perbarui User';

$id = $_GET["id"];
$query_users = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$users = mysqli_fetch_assoc($query_users);

if (isset($_POST["update"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];

  $update = mysqli_query($conn, "UPDATE users SET name = '$name' , email = '$email' WHERE id = $id");

  if ($update) {
    echo "<script>
            alert('Data berhasil diubah!');
            window.location.href = 'index.php';
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

          <form method="post" class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="<?= $users['name']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= $users['email']; ?>">
                </div>
              </div>
            </div>

            <div class="card-footer">
              <a href="./index.php" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-info float-right" name="update">Simpan</button>
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