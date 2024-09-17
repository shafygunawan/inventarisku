<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/session.php';

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="<?= $app_url ?>/assets/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"><?= $_SESSION['user']['name'] ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <li class="user-header bg-info">
          <img src="<?= $app_url ?>/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          <p>
            <?= $_SESSION['user']['name'] ?> - <?= $_SESSION['user']['level'] == '0' ? 'Pegawai' : 'Admin' ?>
            <small><?= $_SESSION['user']['email'] ?></small>
          </p>
        </li>

        <li class="user-footer">
          <a href="<?= $app_url ?>/profile.php" class="btn btn-default btn-flat">Profile</a>
          <a href="<?= $app_url ?>/logout.php" class="btn btn-default btn-flat float-right">Log Out</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>