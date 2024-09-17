<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/session.php';

if (!isset($_SESSION['user'])) {
  header("Location: $app_url/login.php");
  exit;
}

if ($_SESSION['user']['level'] != '1') {
  header("Location: $app_url/index.php");
  exit;
}
