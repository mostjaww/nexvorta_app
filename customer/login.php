<?php
session_start();
include_once "config.php"; // sesuaikan path

$error = '';
$success = '';


// Jika sudah login
if (isset($_SESSION['customer_id'])) {
    $page = encrypt(date('Ymd')) . "&hal=dashboard/index";
    header("Location: ../index.php?token=" . $page);
    exit();
}

// PROSES KIRIM OTP
if (isset($_POST['btnOTP'])) {

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $passwd   = md5($keycode . mysqli_real_escape_string($link, $_POST['password']));

    $query = "SELECT * FROM tblcustomer WHERE username='$username' AND password='$passwd'";
    $result = mysqli_query($link, $query);
    $r = mysqli_fetch_assoc($result);
    $jlh = mysqli_num_rows($result);

    if ($jlh == 1) {

        if ($r['is_active'] == 'T') {
            $error = "Akun Anda diblokir.";
        } else {

            $_SESSION['customer_id']   = $r['id'];
            $_SESSION['customer_name'] = $r['nama'];
            $_SESSION['customer_user'] = $r['username'];
            $_SESSION['customer_tele'] = $r['telegram_id'];

            $otp = rand(1000, 9999);
            $_SESSION['otp_customer'] = $otp;

            mysqli_query($link, "UPDATE tblcustomer SET otp='$otp' WHERE id='" . $r['id'] . "'");

            if (empty($r['telegram_id'])) {
                $error = "Telegram belum terdaftar.";
            } else {

                $text = "Hai, kode OTP login Nexvorta Anda adalah: $otp";
                $url = "https://api.telegram.org/bot" . $token_bottelegram .
                    "/sendMessage?chat_id=" . $r['telegram_id'] .
                    "&text=" . urlencode($text);

                @file_get_contents($url);

                $success = "OTP berhasil dikirim ke Telegram.";
            }
        }
    } else {
        $error = "Username atau Password salah!";
    }
}


// PROSES VALIDASI OTP
if (isset($_POST['btnLogin'])) {

    if ($_POST['otp'] == $_SESSION['otp_customer'] && $_POST['otp'] != '') {

        // Notifikasi ke admin bot
        $text = "Customer Login Berhasil\n" .
            "User: " . $_SESSION['customer_name'] . "\n" .
            "IP: " . $_SERVER['REMOTE_ADDR'];

        @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram .
            "/sendMessage?chat_id=" . $bot_notif .
            "&text=" . urlencode($text));

        mysqli_query($link, "UPDATE tblcustomer SET otp=NULL WHERE id='" . $_SESSION['customer_id'] . "'");

        $page = encrypt(date('Ymd')) . "&hal=dashboard/index";
        $link_tujuan = "../index.php?token=" . $page;

        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'Login Berhasil!',
                text: 'Mengalihkan ke dashboard...',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location = '$link_tujuan';
            });
        </script>";
        exit;
    } else {
        $error = "OTP tidak sesuai!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login as Customer - Nexvorta Apps</title>
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/logincs.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Nexvorta</h1>
            <p>Login to Customer</p>
        </div>

        <form method="POST" class="login-form">
            <?php if ($error): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username Anda"
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                    required
                    autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password Anda"
                    required>
            </div>

            <button type="submit" class="login-btn">Login</button>

            <div class="register-link">
                <p>Belum punya akun?</p>
                <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=customer/register"; ?>" class="register-btn">Daftar Sekarang</a>
            </div>

        </form>

        <div class="login-footer">
            <p> <?php echo date('Y'); ?> Nexvorta Apps. All Rights Reserved.</p>
        </div>
    </div>
</body>

<script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
<script src="assets/dist/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="assets/dist/js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Toggle Password Visibility
    function togglePassword() {
        var pwd = document.getElementById("passwd");
        var icon = document.getElementById("toggleIcon");
        if (pwd.type === "password") {
            pwd.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            pwd.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    // Get Location
    window.onload = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('koor').value = position.coords.latitude + ", " + position.coords.longitude;
            });
        }
    };

    // SweetAlert Notifikasi
    <?php if (!empty($error)): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?php echo $error; ?>'
        });
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?php echo $success; ?>'
        });
    <?php endif; ?>
</script>

</html>