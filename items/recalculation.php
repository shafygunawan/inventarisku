<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/admin.php';
require_once __DIR__ . '/../config/db.php';

$title = 'Rekalkulasi Barang';

if (isset($_POST["submit"])) {
  mysqli_query($conn, "CALL proc_stock_recalculation()");

  echo "<script>
      alert('Rekalkulasi barang berhasil dilakukan!');
      window.location.href = './recalculation.php';
    </script>";
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
                <li class="breadcrumb-item"><a href="./index.php">Barang</a></li>
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
              <div class="callout callout-info">
                <h5>Informasi!</h5>
                <p>Rekalkulasi stok barang melakukan penyesuaian stok barang dengan transaksi masuk dan transaksi keluar yang telah dilakukan.</p>
              </div>
              <button type="submit" class="btn btn-info" name="submit">Rekalkulasi Sekarang</button>
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