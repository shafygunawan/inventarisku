<?php

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/session.php';

session_destroy();

echo "<script>
    window.location.href = './login.php';
  </script>";
