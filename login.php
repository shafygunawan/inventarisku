<?php

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/guards/guest.php';
require_once __DIR__ . '/config/db.php';

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
  $user = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) === 1) {
    $_SESSION["user"] = $user;

    echo "<script>
        window.location.href = './index.php';
      </script>";
  } else {
    echo "<script>
        alert('Username atau password salah!');
      </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in | InventarisKu</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="./assets/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Inventaris</b>Ku</a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4 offset-8">
              <button type="submit" class="btn btn-primary btn-block" name="submit">Log In</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>


  <script src="./assets/plugins/jquery/jquery.min.js"></script>

  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="./assets/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>