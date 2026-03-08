<?php
// session_start();
// include_once '../API/config.php';
// include_once '../function.php';

// if (isset($_SESSION['username']) && $_SESSION['username'] === true) {
//   header("Location: " . $base_url . "index.php");
//   exit;
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $username = $_POST['username'];
//   $password = sha1($_POST['password']);
//   $remember = isset($_POST['remember-me']);

//   $query = "SELECT * FROM tbluser WHERE username = ? AND password = ?";
//   $stmt = $conn->prepare($query);
//   $stmt->bind_param("ss", $username, $password);
//   $stmt->execute();
//   $result = $stmt->get_result();

//   if ($result->num_rows == 1) {
//     $user = $result->fetch_assoc();
//     $_SESSION['username'] = $user['username'];
//     $_SESSION['role_id'] = $user['role_id'];
//     $_SESSION['role_name'] = $user['role_name'];

//     if ($remember) {
//       setcookie('username', $user['username'], time() + (86400 * 30), "/"); // 30 days
//       setcookie('role_id', $user['role_id'], time() + (86400 * 30), "/");
//       setcookie('role_name', $user['role_name'], time() + (86400 * 30), "/");
//     }

//     header("Location: " . $base_url . "index.php");
//     exit;
//   } else {
//     $error = "Username atau password salah!";
//   }
// }

// if (isset($_COOKIE['username'])) {
//   $_SESSION['username'] = $_COOKIE['username'];
//   $_SESSION['role_id'] = $_COOKIE['role_id'];
//   $_SESSION['role_name'] = $_COOKIE['role_name'];
//   header("Location: " . $base_url . "index.php");
//   exit;
// }

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/sneat/";
?>



<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo $base_url; ?>assets/" data-template="vertical-menu-template-free">

<!-- Head-Content -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Login - Backoffice Perizinan</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="<?php echo $base_url; ?>assets/img/icons/brands/deliserdanglogo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/pages/page-auth.css" />
  <script src="<?php echo $base_url; ?>assets/vendor/js/helpers.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/config.js"></script>
</head>

<!-- Body-Content -->

<body>
  <div class="container-xxl">
    <div class="container-p-y authentication-wrapper authentication-basic">
      <div class="authentication-inner">
        <div class="card" style="border-radius: 10px;">
          <div class="card-body">
            <br>
            <h4 class="mb-2">Selamat Datang di
              <br>
              Backoffice Perizinan
            </h4>
            <p class="mb-4">Silahkan login dengan akun kamu untuk dapat mengakses website</p>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form id="formAuthentication" class="mb-3" action="login.php" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username kamu" autofocus required />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="forgot-password.php">
                    <small>Lupa Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password" aria-describedby="password" required />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" name="remember-me" />
                  <label class="form-check-label" for="remember-me"> Ingat Login Masuk </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="d-grid w-100 btn btn-primary" type="submit">Masuk</button>
              </div>
            </form>

            <p class="text-center">
              <span>Belum punya akun?</span>
              <span>Harap Segera Lapor Ke IT!</span>
              <!-- <a href="registrasi.php">
                <span>Buat sekarang</span>
              </a> -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- / Script Content -->
  <script src="<?php echo $base_url; ?>assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/js/menu.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>