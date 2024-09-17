<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/session.php';

function is_admin()
{
  return $_SESSION['user']['level'] == '1';
}
