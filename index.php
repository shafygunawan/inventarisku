<?php

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/guards/authenticated.php';
require_once __DIR__ . '/config/db.php';

$title = 'Dashboard';

$result = mysqli_query($conn, "SELECT * FROM view_dashboard");
$dashboard = mysqli_fetch_assoc($result);

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
              <h1>Selamat datang, <?= $_SESSION['user']['name'] ?>! 👋</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">

        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $dashboard['total_out_h'] ?></h3>
                <p>Transaksi Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $dashboard['total_in_h'] ?></h3>
                <p>Transaksi Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $dashboard['total_items'] ?></h3>
                <p>Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $dashboard['total_users'] ?></h3>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
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