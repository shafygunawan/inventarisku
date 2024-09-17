<?php

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/guards/authenticated.php';
require_once __DIR__ . '/config/db.php';

$title = 'Ganti Password'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $query_user = mysqli_query($conn, "SELECT * FROM users WHERE id");
    $user = mysqli_fetch_assoc($query_user);

    if ($current_password === $user['password']) {
        if ($new_password === $confirm_password) {
            $update = mysqli_query($conn, "UPDATE users SET password = '$new_password' WHERE id = {$user['id']}");
            if ($update) {
                echo "<script>
                    alert('Password Berhasil diganti');
                    window.location.href = 'profile.php';
                </script>";
                exit;
            } else {
                $error = 'Gagal';
            }
        } else {
            $error = 'Kata sandi baru dan konfirmasi kata sandi tidak cocok.';
        }
    } else {
        $error = 'Kata sandi saat ini salah';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | InventarisKu</title>
  <?php require_once __DIR__ . '/partials/head.php' ?>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php require_once __DIR__ . '/partials/topbar.php' ?>
    <?php require_once __DIR__ . '/partials/sidebar.php' ?>

    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                  <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                  <?php endif; ?>

                  <form method="post" action="password.php">
                    <div class="form-group">
                      <label for="current_password">Password Saat ini</label>
                      <input type="password" name="current_password" id="current_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="new_password">Password Baru</label>
                      <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Konfirmasi Password</label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>

    <?php require_once __DIR__ . '/partials/footer.php' ?>
  </div>
  <?php require_once __DIR__ . '/partials/body.php' ?>
</body>
</html>
