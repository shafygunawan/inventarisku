<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../guards/authenticated.php';
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $date = $_POST['date'];
  $item_ids = json_encode(array_map('intval', $_POST['item_ids']));
  $quantities = json_encode(array_map('intval', $_POST['quantities']));

  mysqli_query($conn, "CALL proc_in_add('$date', '$item_ids', '$quantities', @in_h_id)");

  $result = mysqli_query($conn, "SELECT @in_h_id AS in_h_id");
  $in_h_id = mysqli_fetch_assoc($result)['in_h_id'];

  echo "<script>
    alert('Transaksi masuk berhasil disimpan!');
    window.location.href = './details.php?id=$in_h_id';
  </script>";

  exit();
}

$title = 'Transaksi Masuk Baru';

$result = mysqli_query($conn, "SELECT * FROM items");
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                <li class="breadcrumb-item"><a href="./index.php">Transaksi Masuk</a></li>
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
              <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" id="date" name="date" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10 items">
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <select class="custom-select" name="item_ids[]" required>
                        <option value="" disabled selected>--- Pilih barang ---</option>
                        <?php foreach ($items as $item) : ?>
                          <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" placeholder="Qty" name="quantities[]" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 offset-sm-2">
                  <button type="button" class="btn btn-outline-info add-item">Tambah</button>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <a href="./index.php" class="btn btn-default">Batal</a>
              <button type="submit" class="btn btn-info float-right" name="submit">Simpan</button>
            </div>

          </form>
        </div>

      </section>

    </div>

    <?php require_once __DIR__ . '/../partials/footer.php' ?>

  </div>

  <?php require_once __DIR__ . '/../partials/body.php' ?>

  <script>
    const deleteItem = (e) => {
      e.parentElement.parentElement.remove();
    }

    const addItem = document.querySelector('.add-item');
    const itemContainer = document.querySelector('.items');

    addItem.addEventListener('click', () => {
      const item = document.createElement('div');
      item.classList.add('form-group', 'row');
      item.innerHTML = `
        <div class="col-sm-6">
          <select class="custom-select" name="item_ids[]" required>
            <option value="" disabled selected>--- Pilih barang ---</option>
            <?php foreach ($items as $item) : ?>
              <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-4">
          <input type="number" class="form-control" placeholder="Qty" name="quantities[]" required>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-outline-danger w-100" onclick="deleteItem(this)">Hapus</button>
        </div>
        `;

      itemContainer.appendChild(item);
    });
  </script>
</body>

</html>