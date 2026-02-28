<?php
include_once "config.php";
// Tambahkan fungsi format nomor WA
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

// LOGIKA PROSES FORM LOGIN
if (isset($_POST['btnOTP'])) {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $passwd = md5($keycode . mysqli_real_escape_string($link, $_POST['passwd']));
    
    $query = "SELECT * FROM tbluser tu LEFT JOIN tblrole tr ON tu.role_id=tr.role_id WHERE tu.user_nm='$username' and tu.user_passwd='$passwd'";
    $result = mysqli_query($link, $query);
    $r = mysqli_fetch_assoc($result);
    $jlh = mysqli_num_rows($result);

    if ($jlh == 1) {
        // Set Session
        $_SESSION['user_id'] = $r['user_id'];
        $_SESSION['user_nm'] = $r['user_nm'];
        $_SESSION['user_nama'] = $r['user_nama'];
        $_SESSION['role_id'] = $r['role_id'];
        $_SESSION['role_nama'] = $r['role_nama'];
        $_SESSION['user_nohp'] = $r['user_nohp'];
        $_SESSION['user_telegram'] = $r['user_telegram'];
        $_SESSION['user_isaktif'] = $r['user_isaktif'];

        if ($_SESSION['user_isaktif'] == 'T') {
            $error_msg = "Akun Anda Terblokir, Silakan Hubungi Administrator.";
        } else {
            $otp = rand(1000, 9999);
            mysqli_query($link, "UPDATE tbluser SET user_otp = '$otp' WHERE user_id='" . $r['user_id'] . "'");
            $_SESSION['otp'] = $otp;
            
            $text = "Hai, kode verifikasi login *Dashboard* Anda adalah *$otp*.\nDemi keamanan, jangan berikan kode ini kepada siapapun!";
            $texttelegram = "Hai, kode verifikasi login <b>Dashboard</b> Anda adalah <b>$otp</b>.\nDemi keamanan, jangan berikan kode ini kepada siapapun!";

            if ($_POST['btnOTP'] == 'whatsapp') {
                if (empty($r['user_nohp'])) {
                    $error_msg = "Nomor WhatsApp tidak terdaftar.";
                } else {
                    $wa_api_url = "http://114.4.226.114:8000/send/message";
                    $wa_number = gantiformathp($r['user_nohp']);
                    $post_data = http_build_query(["phone" => $wa_number, "message" => $text]);
                    
                    $curl = curl_init();
                    curl_setopt_array($curl, [
                        CURLOPT_URL => $wa_api_url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $post_data,
                        CURLOPT_HTTPHEADER => ["Authorization: Basic cHRzcDpwdHNwa2VyZW4=", "Content-Type: application/x-www-form-urlencoded"]
                    ]);
                    curl_exec($curl);
                    curl_close($curl);
                    
                    $_SESSION['method'] = "WhatsApp";
                    $success_msg = "OTP terkirim ke WhatsApp! Cek Whatsapp Anda.";
                }
            } elseif ($_POST['btnOTP'] == 'telegram') {
                // CASE TELEGRAM (BARU)
                if (empty($r['user_telegram'])) {
                    $error_msg = "ID Telegram tidak terdaftar pada akun ini.";
                } else {
                    // Pastikan $token_bottelegram sudah didefinisikan di file config.php
                    $url_telegram = "https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=" . $r['user_telegram'] . "&text=" . urlencode($texttelegram) . "&parse_mode=html";
                    
                    // Kirim pesan (menggunakan @ untuk menekan error jika koneksi gagal)
                    @file_get_contents($url_telegram);

                    $_SESSION['method'] = "Telegram";
                    $success_msg = "OTP terkirim ke Telegram! Cek Telegram Anda.";
                }
            }
        }
    } else {
        $error_msg = "Username atau Password Salah!";
    }
}

if (isset($_POST['btnLogin'])) {
    if ($_POST['otp'] == $_SESSION['otp'] and $_POST['otp'] <> '') {
        $text = "<b>Telah berhasil Login di Dashboard</b>\nUser : " . $_SESSION['user_nama'] . " (" . $_SESSION['user_nm'] . ")\nLogin Sebagai : " . $_SESSION['role_nama'] . "\nDari IP : " . getUserIP() . "\nMenggunakan OTP : " . $_SESSION['method'] . "\nKoordinat User : <a href='http://maps.google.com/maps?q=" . $_POST['koor'] . "'>" . $_POST['koor'] . "</a>";
        file_get_contents("https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=" . $bot_notif . "&text=" . urlencode($text) . "&parse_mode=html");

        $queryOTP = "UPDATE tbluser SET user_otp = NULL WHERE user_id='" . $_SESSION['user_id'] . "'";
        $result = mysqli_query($link, $queryOTP);
        $_SESSION['login_success'] = true;
        $page = encrypt(date('Ymd')) . "&hal=dashboard/index";
        $link_tujuan = "index.php?token=" . $page;

        // Cetak struktur HTML lengkap dengan SweetAlert
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Login Berhasil!',
                    text: 'Mengalihkan ke dashboard...',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    // Redirect dilakukan setelah alert selesai atau timer habis
                    window.location = '$link_tujuan';
                });
            </script>
        </body>
        </html>";
        exit;
    } else {
        $text = "<b>Telah Gagal Login</b>\nUser : " . $_POST['username'] . "\nDari IP : " . getUserIP() . "\nKoordinat User : <a href='http://maps.google.com/maps?q=" . $_POST['koor'] . "'>" . $_POST['koor'] . "</a>\nKode OTP Tidak Sesuai!";
        file_get_contents("https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=" . $bot_notif . "&text=" . urlencode($text) . "&parse_mode=html");
        $error_msg = "OTP Tidak Sesuai! Silahkan Cek Kembali Telegram Anda!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Login to Nexvorta Dashboard">
    <meta name="author" content="Nexvorta Team">
    <title>Login | <?php echo $title_dashboard; ?></title>
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/dist/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <img src="<?php echo $base_url; ?>assets\img\logo\dashboard.png" alt="Logo Dashboard" class="login-logo">
            <div class="app-title">Dashboard</div>
            <div class="app-subtitle">Dashboard Monitoring</div>
            <div class="app-subtitle mt-2"></div>
        </div>

        <div class="login-right">
            <div class="login-header">
                <h3>Selamat Datang!</h3>
                <p>Silakan masuk untuk mengakses dashboard.</p>
            </div>

            <form action="" method="post" autocomplete="off">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" required>
                    <label for="username"><i class="fa fa-user me-2"></i>Username</label>
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password" required>
                    <label for="passwd"><i class="fa fa-lock me-2"></i>Password</label>
                    <span onclick="togglePassword()" style="position: absolute; right: 15px; top: 18px; cursor: pointer; color: #888;">
                        <i class="fa fa-eye" id="toggleIcon"></i>
                    </span>
                </div>

                <?php if (isset($_SESSION['otp'])): ?>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control text-center fw-bold letter-spacing-2" id="otp" name="otp" placeholder="Kode OTP" style="letter-spacing: 5px; font-size: 1.2rem;">
                        <label for="otp">Masukkan Kode OTP</label>
                    </div>
                    
                    <button type="submit" name="btnLogin" class="btn btn-primary-custom mb-3">MASUK KE DASHBOARD</button>
                <?php else: ?>

                    <!-- <button type="submit" name="btnOTP" value="whatsapp" class="btn-wa">
                        <i class="fab fa-whatsapp fa-lg"></i> Kirim OTP via WhatsApp
                    </button> -->
                    <br>
                    <button type="submit" name="btnOTP" value="telegram" class="btn-tele">
                        <i class="fab fa-telegram fa-lg"></i> Kirim OTP via Telegram
                    </button>
                <?php endif; ?>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary mb-3" onclick="location.href='/nexvorta_apps/dashboard'">KEMBALI KE DASHBOARD</button>
                </div>

                <input type="hidden" id="koor" name="koor">
            </form>

            <div class="footer-copy">
                &copy; <?php echo date('Y'); ?> Nexvorta.<br>All rights reserved.
            </div>
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
    <?php if (isset($error_msg)): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?php echo $error_msg; ?>',
            confirmButtonColor: '#d33'
        });
    <?php endif; ?>

    <?php if (isset($success_msg)): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?php echo $success_msg; ?>',
            confirmButtonColor: '#25D366'
        });
    <?php endif; ?>

    <?php if (isset($info_msg)): ?>
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: '<?php echo $info_msg; ?>',
            confirmButtonColor: '#3085d6'
        });
    <?php endif; ?>
</script>

</html>