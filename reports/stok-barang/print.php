<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../guards/admin.php';
require_once __DIR__ . '/../../config/db.php';

$title = 'Laporan Stok Barang';

$users = mysqli_query($conn, "SELECT * FROM items ORDER BY stock");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | InventarisKu</title>

  <?php require_once __DIR__ . '/../../partials/head.php' ?>
</head>

<body class="hold-transition sidebar-mini">

  <div class="wrapper">

    <div class="content-wrapper m-0">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="./index.php"><?= $title ?></a></li>
                <li class="breadcrumb-item active">Print</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= $title ?></h3>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="width: 10px">No</th>
                  <th scope="col">ID Barang</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Sisa Stok</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id = 1;
                while ($user = mysqli_fetch_assoc($users)) :
                ?>
                  <tr>
                    <td><?= $id++; ?></td>
                    <td><a href="../../items/details.php?id=<?= $user['id'] ?>">#<?= $user["id"]; ?></a></td>
                    <td><?= $user["name"]; ?></td>
                    <td>Rp<?= $user["price"]; ?></td>
                    <td><?= $user["stock"]; ?> item</td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>

      </section>

    </div>

    <?php $footer_class = 'm-0' ?>
    <?php require_once __DIR__ . '/../../partials/footer.php' ?>

  </div>

  <?php require_once __DIR__ . '/../../partials/body.php' ?>
  <?php require_once __DIR__ . '/../../partials/print.php' ?>

  <script>
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(deleteForm => {
      deleteForm.addEventListener('submit', () => {
        const confirmed = confirm('Apakah Anda yakin ingin menghapus transaksi ini? (tidakan ini tidak dapat diurungkan)');
        if (!confirmed) event.preventDefault();
      });
    });
  </script>
</body>

</html>