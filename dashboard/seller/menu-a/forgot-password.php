<?php
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/sneat/";
?>

<?php
include_once '../API/config.php'; // Include database connection
include_once '../function.php'; // Include function.php

// Tambahkan fungsi format nomor HP
function gantiformathp($nomorhp)
{
    $nomorhp = trim($nomorhp);
    $nomorhp = strip_tags($nomorhp);
    $nomorhp = str_replace(array(" ", "(", ".", ")"), "", $nomorhp);

    if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
        if (substr(trim($nomorhp), 0, 3) == '+62') {
            $nomorhp = trim($nomorhp);
        } elseif (substr($nomorhp, 0, 1) == '0') {
            $nomorhp = '+62' . substr($nomorhp, 1);
        }
    }
    return $nomorhp;
}

$notif = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wa = $_POST['nomorwa'];

    // Cek nomor WA di database
    $query = mysqli_query($conn, "SELECT * FROM tbluser WHERE nomorwa = '$wa'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        // Set timezone ke WIB agar expiry sesuai waktu lokal
        date_default_timezone_set('Asia/Jakarta');
        // Generate token dan expiry (1 jam)
        $token = sha1($user['username'] . time() . rand());
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Simpan token ke database
        mysqli_query($conn, "UPDATE tbluser SET reset_token='$token', reset_token_expiry='$expiry' WHERE nomorwa='$wa'");

        // Buat link reset
        $reset_link = $base_url . "menu-a/reset-password.php?token=$token";
        $pesan = "Halo {$user['username']},\nKlik link berikut untuk reset password kamu:\n$reset_link\nLink berlaku 1 jam.";

        $wa_api_url = "http://114.4.226.114:8000/send/message";
        $wa_number = gantiformathp($wa);
        $data = [
            "phone" => $wa_number,
            "message" => $pesan
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: Basic cHRzcDpwdHNwa2VyZW4=",
                "Content-Type: multipart/form-data",
                "Accept: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_URL, $wa_api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        curl_close($curl);

        $notif = '<div class="alert alert-success" role="alert">Link reset password berhasil dikirim ke WhatsApp kamu!</div>';
    } else {
        $notif = '<div class="alert alert-danger" role="alert">Nomor WhatsApp tidak ditemukan!</div>';
    }
}
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo $base_url; ?>assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Lupa Password - Backoffice Perizinan</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="<?php echo $base_url; ?>assets/img/icons/brands/deliserdanglogo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/css/pages/page-auth.css" />
  <script src="<?php echo $base_url; ?>assets/vendor/js/helpers.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/config.js"></script>
</head>

<body>

  <div class="container-xxl">
    <div class="container-p-y authentication-wrapper authentication-basic">
      <div class="py-4 authentication-inner">

        <div class="card" style="border-radius: 10px;">
          <div class="card-body">
            <br>
            <h4 class="mb-2">Lupa Password? 🔒</h4>
            <?php if (!empty($notif)) echo $notif; ?>
            <p class="mb-4">Masukkan nomor WhatsApp kamu dan kami akan mengirimkan instruksi untuk reset password kamu</p>
            <form id="formAuthentication" class="mb-3" method="POST">
              <div class="mb-3">
                <label for="nomorwa" class="form-label">Nomor WhatsApp</label>
                <input type="text" class="form-control" id="nomorwa" name="nomorwa" placeholder="Masukkan nomor WhatsApp kamu" autofocus required />
              </div>
              <button class="d-grid w-100 btn btn-primary">Kirim link reset</button>
            </form>
            <div class="text-center">
              <a href="login.php" class="d-flex align-items-center justify-content-center">
                <i class="bx-chevron-left bx scaleX-n1-rtl bx-sm"></i>
                Kembali ke Login
              </a>
            </div>
          </div>
        </div>
        <!-- /Forgot Password -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Core JS -->
  <script src="<?php echo $base_url; ?>assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo $base_url; ?>assets/vendor/js/menu.js"></script>
  <script src="<?php echo $base_url; ?>assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>