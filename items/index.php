<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/authenticated.php';
require_once __DIR__ . '/../config/db.php';

$title = 'Daftar Barang';

$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$count_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM items");
$total_records = mysqli_fetch_assoc($count_query)['total'];

$total_pages = ceil($total_records / $records_per_page);

$offset = ($current_page - 1) * $records_per_page;

$query_items = mysqli_query($conn, "SELECT * FROM items LIMIT $offset,$records_per_page");

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $query_delete = "DELETE FROM items WHERE id = $id";
  if (mysqli_query($conn, $query_delete)) {
    echo "<script>
            alert('Data berhasil dihapus!');
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
                <li class="breadcrumb-item"><a href="./index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
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
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id = ($current_page - 1) * $records_per_page + 1;
                while ($items = mysqli_fetch_assoc($query_items)) :
                ?>
                  <tr>
                    <td><?= $id++; ?></td>
                    <td><?= $items["name"]; ?></td>
                    <td>Rp.<?= $items["price"]; ?></td>
                    <td><?= $items["stock"]; ?></td>
                    <td>
                      <a href="./update.php?id=<?= $items['id']; ?>" class="btn btn-primary">Perbarui</a>
                      <a onclick="return confirm('Apakah anda ingin menghapus data?')" href="index.php?delete=<?= $items['id']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
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

    <?php require_once __DIR__ . '/../partials/footer.php' ?>

  </div>

  <?php require_once __DIR__ . '/../partials/body.php' ?>
</body>

</html>