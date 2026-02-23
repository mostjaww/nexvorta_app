<?php
session_start();
include_once "config.php";

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama      = mysqli_real_escape_string($link, trim($_POST['nama']));
    $username  = mysqli_real_escape_string($link, trim($_POST['username']));
    $password  = trim($_POST['password']);
    $telegram  = mysqli_real_escape_string($link, trim($_POST['telegram_id']));

    if (empty($nama) || empty($username) || empty($password)) {
        $error = "Semua field wajib diisi!";
    } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter!";
    } else {

        // Cek username sudah ada atau belum
        $cek = mysqli_query($link, "SELECT id FROM tblcustomer WHERE username='$username'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Username sudah digunakan!";
        } else {

            $password_hash = md5($keycode . $password);

            $query = "INSERT INTO tblcustomer 
                      (nama, username, password, telegram_id, is_active, created_at)
                      VALUES 
                      ('$nama','$username','$password_hash','$telegram','Y',NOW())";

            if (mysqli_query($link, $query)) {

                // Notifikasi ke admin
                $text = "Customer Baru Terdaftar\n" .
                    "Nama: $nama\n" .
                    "Username: $username";

                @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram .
                    "/sendMessage?chat_id=" . $bot_notif .
                    "&text=" . urlencode($text));

                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Registrasi Berhasil!',
                        text: 'Silakan login menggunakan akun Anda.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location = 'login.php';
                    });
                </script>";
                exit;
            } else {
                $error = "Terjadi kesalahan saat menyimpan data.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Register to Nexvorta Dashboard">
    <meta name="author" content="Nexvorta Team">
    <title>Register | Nexvorta - Export & Import Solutions</title>
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/css/register.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Nexvorta</h1>
            <p>Register as Seller</p>
        </div>

        <form method="POST" class="login-form">

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Telegram ID (Opsional)</label>
                <input type="text" name="telegram_id">
            </div>

            <button type="submit" class="login-btn">Daftar</button>

            <div class="register-link">
                <p>Already have an account?</p>
                <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=customer/login"; ?>" class="register-btn">Login Now</a>
            </div>
        </form>

        <div class="login-footer">
            <p><?php echo date('Y'); ?> Nexvorta Apps. All Rights Reserved.</p>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>