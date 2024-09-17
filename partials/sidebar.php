<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../helpers/guard.php'

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="<?= $app_url ?>/index.php" class="brand-link">
    <img src="<?= $app_url ?>/assets/img/AdminLTELogo.png" alt="InventarisKu Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">InventarisKu</span>
  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="<?= $app_url ?>/index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">SERING DIAKSES</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-arrow-up"></i>
            <p>
              Transaksi Keluar
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $app_url ?>/out/add.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Baru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $app_url ?>/out/index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Transaksi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-arrow-down"></i>
            <p>
              Transaksi Masuk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $app_url ?>/in/add.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Baru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $app_url ?>/in/index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Transaksi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Barang
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $app_url ?>/items/add.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Baru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $app_url ?>/items/index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Barang</p>
              </a>
            </li>
            <?php if (is_admin()) : ?>
              <li class="nav-item">
                <a href="<?= $app_url ?>/items/recalculation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekalkulasi</p>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </li>
        <?php if (is_admin()) : ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $app_url ?>/reports/barang-terlaris/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Terlaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $app_url ?>/reports/stok-barang/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Barang</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if (is_admin()) : ?>
          <li class="nav-header">LAINNYA</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $app_url ?>/users/add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $app_url ?>/users/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar User</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </nav>

  </div>

</aside>