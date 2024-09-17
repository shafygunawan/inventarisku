<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/authenticated.php';
require_once __DIR__ . '/../config/db.php';

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
  exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  mysqli_query($conn, "CALL proc_out_delete($id)");

  header('Location: ./index.php');
  exit();
}

$title = 'Detail Transaksi Keluar';

$result = mysqli_query($conn, "SELECT * FROM out_h WHERE id = '$id'");
$out_hs = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "SELECT * FROM out_d, items WHERE items.id = out_d.item_id AND out_h_id = '$id'");
$out_ds = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                <li class="breadcrumb-item"><a href="./index.php">Transaksi Keluar</a></li>
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

          <div class="form-horizontal">
            <div class="card-body">
              <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID Transaksi</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="id" value="#<?= $out_hs['id'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="date" value="<?= date('d M Y', strtotime($out_hs['date'])) ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="total" value="Rp<?= $out_hs['total'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10 items">
                  <?php foreach ($out_ds as $out_d) : ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" readonly class="form-control-plaintext" value="<?= $out_d['name'] ?> (Rp<?= $out_d['subtotal'] / $out_d['qty'] ?>) x <?= $out_d['qty'] ?> = Rp<?= $out_d['subtotal'] ?>">
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <form action="" method="post" class="delete-form">
                <a href="./index.php" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-outline-danger float-right">Hapus</button>
              </form>
            </div>

          </div>
        </div>

      </section>

    </div>

    <?php require_once __DIR__ . '/../partials/footer.php' ?>

  </div>

  <?php require_once __DIR__ . '/../partials/body.php' ?>

  <script>
    const deleteForm = document.querySelector('.delete-form');

    deleteForm.addEventListener('submit', () => {
      const confirmed = confirm('Apakah Anda yakin ingin menghapus transaksi ini? (tidakan ini tidak dapat diurungkan)');
      if (!confirmed) event.preventDefault();
    });
  </script>
</body>

</html>