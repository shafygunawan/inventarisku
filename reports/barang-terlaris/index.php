<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../guards/admin.php';
require_once __DIR__ . '/../../config/db.php';

$title = 'Laporan Barang Terlaris';

$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$count_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM view_report_items");
$total_records = mysqli_fetch_assoc($count_query)['total'];

$total_pages = ceil($total_records / $records_per_page);

$offset = ($current_page - 1) * $records_per_page;

$users = mysqli_query($conn, "SELECT * FROM view_report_items LIMIT $offset, $records_per_page");

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

    <?php require_once __DIR__ . '/../../partials/topbar.php' ?>
    <?php require_once __DIR__ . '/../../partials/sidebar.php' ?>

    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../../index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">

        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title w-100"><?= $title ?></h3>
            <a href="./print.php" target="_blank" class="btn btn-sm btn-outline-danger">Print</a>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="width: 10px">No</th>
                  <th scope="col">ID Barang</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Terjual</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id = ($current_page - 1) * $records_per_page + 1;
                while ($user = mysqli_fetch_assoc($users)) :
                ?>
                  <tr>
                    <td><?= $id++; ?></td>
                    <td><a href="../../items/details.php?id=<?= $user['id'] ?>">#<?= $user["id"]; ?></a></td>
                    <td><?= $user["name"]; ?></td>
                    <td>Rp<?= $user["price"]; ?></td>
                    <td><?= $user["total"]; ?> item</td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>

          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                <li class="page-item <?= $page == $current_page ? 'active' : ''; ?>">
                  <a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a>
                </li>
              <?php endfor; ?>
            </ul>
          </div>
        </div>

      </section>

    </div>

    <?php require_once __DIR__ . '/../../partials/footer.php' ?>

  </div>

  <?php require_once __DIR__ . '/../../partials/body.php' ?>

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