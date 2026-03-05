<?php
include_once '../API/config.php';

$token = isset($_GET['token']) ? $_GET['token'] : '';
$show_form = false;
$error = '';
$success = '';

if ($token) {
    // Cek token valid dan belum expired
    $stmt = $conn->prepare("SELECT * FROM tbluser WHERE reset_token=? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $show_form = true;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if ($password !== $password2) {
                $error = "Password tidak sesuai!";
            } elseif (strlen($password) < 6) {
                $error = "Password minimal 6 karakter!";
            } else {
                $hashed = sha1($password);
                // Update password dan hapus token
                $stmt2 = $conn->prepare("UPDATE tbluser SET password=?, reset_token=NULL, reset_token_expiry=NULL WHERE id=?");
                $stmt2->bind_param("si", $hashed, $user['id']);
                $stmt2->execute();
                $success = '<div class="alert alert-success" role="alert">Password berhasil direset. Silakan login kembali.</div>';
                $show_form = false;
            }
        }
    } else {
        $error = "Token tidak valid atau sudah kadaluarsa.";
    }
} else {
    $error = "Token tidak ditemukan.";
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
  <title>Reset Password - Backoffice Perizinan</title>
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
                        <h4 class="mb-2">Reset Password</h4>
                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endif; ?>
                        <?php if ($success): ?>
                            <?= $success ?>
                            <a href="login.php">Kembali ke Login</a>
                        <?php endif; ?>
                        <?php if ($show_form): ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" required minlength="6" placeholder="Masukkan password baru">
                            </div>
                            <div class="mb-3">
                                <label>Ulangi Password Baru</label>
                                <input type="password" name="password2" class="form-control" required minlength="6" placeholder="Ulangi password baru">
                            </div>
                            <button class="btn btn-primary" type="submit">Reset Password</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>