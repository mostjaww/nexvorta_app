<?php
include_once '../API/config.php'; // Include database connection
?>

<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo $base_url; ?>/assets/" data-template="vertical-menu-template-free">

<!-- Head-Content -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Buat Akun - Backoffice Perizinan</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="<?php echo $base_url; ?>assets/img/icons/brands/deliserdanglogo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/vendor/css/pages/page-auth.css" />
  <script src="<?php echo $base_url; ?>/assets/vendor/js/helpers.js"></script>
  <script src="<?php echo $base_url; ?>/assets/js/config.js"></script>
</head>

<!-- Body-Content -->

<body>
  <div class="container-xxl">
    <div class="container-p-y authentication-wrapper authentication-basic">
      <div class="authentication-inner">
        <div class="card" style="border-radius: 10px;">
          <div class="card-body">
            <br>
            <h4 class="mb-2">Buat Akun Kamu Sekarang 🚀</h4>
            <br>
            <p class="mb-4">Silahkan isi form dibawah ini untuk membuat akun kamu</p>
            <form id="formAuthentication" class="mb-3" action="#" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username kamu" autofocus required />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email kamu" required />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password kamu" aria-describedby="password" required />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                  <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                  </label>
                </div>
              </div>
              <button class="d-grid w-100 btn btn-primary">Sign up</button>
            </form>
            <p class="text-center">
              <span>Sudah punya akun?</span>
              <a href="login.php">
                <span>Masuk</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- / Script Content -->
  <script src="<?php echo $base_url; ?>/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo $base_url; ?>/assets/vendor/js/menu.js"></script>
  <script src="<?php echo $base_url; ?>/assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>