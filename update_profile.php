<?php

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/guards/authenticated.php';
require_once __DIR__ . '/config/db.php';

$title = 'Perbarui Profile';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $query_update = "UPDATE users SET name = '$name', email = '$email' WHERE id = {$_SESSION['user']['id']}";

  if (mysqli_query($conn, $query_update)) {
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;
    header("Location: profile.php");
    exit;
  } else {
    $error = 'Gagal.';
  }
} else {
  $query_profile = mysqli_query($conn, "SELECT name, email FROM users WHERE id = {$_SESSION['user']['id']}");
  if ($profile = mysqli_fetch_assoc($query_profile)) {
    $name = $profile['name'];
    $email = $profile['email'];
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

                  <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                  <?php endif; ?>

                  <form method="post" action="update_profile.php">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($name) ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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