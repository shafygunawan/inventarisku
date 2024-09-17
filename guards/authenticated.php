<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/session.php';

if (!isset($_SESSION['user'])) {
  header("Location: $app_url/login.php");
  exit;
}
