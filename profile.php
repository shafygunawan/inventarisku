<?php

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/guards/authenticated.php';
require_once __DIR__ . '/config/db.php';

$title = 'Profile';

$query_profile = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_SESSION['user']['id']}");
if ($profile = mysqli_fetch_assoc($query_profile)) {
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
              <a href="#">
              </a>
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
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= $app_url ?>/assets/img/user2-160x160.jpg" alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center"><?= htmlspecialchars($profile['name']); ?></h3>
                  <p class="text-muted text-center"><?= htmlspecialchars($profile['email']); ?></p>
                  <a href="update_profile.php" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                  <a href="password.php" class="btn btn-primary btn-block"><b>Ganti Password</b></a>
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