<?php
session_start();
include_once "config.php";

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name      = mysqli_real_escape_string($link, trim($_POST['name']));
    $username  = mysqli_real_escape_string($link, trim($_POST['username']));
    $email     = mysqli_real_escape_string($link, trim($_POST['email']));
    $birth     = mysqli_real_escape_string($link, trim($_POST['birth']));
    $password  = trim($_POST['password']);
    $telegram  = mysqli_real_escape_string($link, trim($_POST['telegram_id']));

    if (empty($name) || empty($username) || empty($email) || empty($birth) || empty($password) || empty($telegram)) {
        $error = "Semua field wajib diisi!";
    } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter!";
    } else {

        // Cek username / email
        $cek = mysqli_query($link, "SELECT id FROM tblcustomer WHERE username='$username' OR email='$email'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Username atau Email sudah digunakan!";
        } else {

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Generate OTP 6 digit
            $otp = rand(100000, 999999);

            $query = "INSERT INTO tblcustomer 
                      (name, username, email, birth, password, telegram_id, otp, is_active, created_at)
                      VALUES 
                      ('$name','$username','$email','$birth','$password_hash','$telegram','$otp','Need Activation',NOW())";

            if (mysqli_query($link, $query)) {

                // Kirim OTP ke Telegram
                $text = "Halo $name 👋\n\n"
                    . "Kode OTP Aktivasi Nexvorta Anda:\n\n"
                    . "🔐 $otp\n\n"
                    . "Jangan bagikan kode ini ke siapapun.";

                @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram .
                    "/sendMessage?chat_id=" . $telegram .
                    "&text=" . urlencode($text));

                $_SESSION['pending_activation'] = $username;

                echo "<script>
                    window.location='index.php?token=" . encrypt(date('Ymd')) . "&hal=user/activated';
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

    <div class="container-fluid vh-100">
        <div class="h-100 row">

            <!-- LEFT BRANDING -->
            <div class="left-panel d-lg-flex align-items-center p-5 col-lg-6 d-none">
                <div style="z-index:2;">
                    <h1 class="fw-bold display-4">Nexvorta</h1>
                    <p class="mb-4 lead">Global Export & Import Platform</p>
                    <p class="opacity-75">
                        Daftar sekarang dan mulai perjalanan bisnis internasional Anda bersama Nexvorta.
                    </p>
                </div>
            </div>

            <!-- RIGHT FORM -->
            <div class="d-flex align-items-center justify-content-center bg-light col-lg-6">

                <div class="p-5 card glass-card">

                    <div class="mb-4 text-center">
                        <h3 class="fw-bold">Create Customer Account</h3>
                        <p class="text-muted small">Join Nexvorta Global Platform</p>
                    </div>

                    <?php if (!empty($error)) { ?>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '<?php echo $error; ?>'
                            });
                        </script>
                    <?php } ?>

                    <form method="POST" autocomplete="off">

                        <div class="mb-3 form-floating">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            <label>Full Name</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <label>Email Address</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input type="date" name="birth" class="form-control" required>
                            <label>Date of Birth</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                            <label>Username</label>
                        </div>

                        <div class="position-relative mb-2 form-floating">
                            <input type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                oninput="checkStrength()"
                                required>

                            <label>Password</label>

                            <span onclick="togglePassword()"
                                class="top-50 position-absolute me-3 translate-middle-y end-0"
                                style="cursor:pointer;">
                                <i class="text-secondary fa fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>

                        <div class="mt-3 password-rules small">

                            <div id="ruleLength" class="rule-item">
                                <i class="me-2 fa fa-circle"></i>
                                Minimal 6 karakter
                            </div>

                            <div id="ruleUpper" class="rule-item">
                                <i class="me-2 fa fa-circle"></i>
                                Mengandung huruf besar (A-Z)
                            </div>

                            <div id="ruleNumber" class="rule-item">
                                <i class="me-2 fa fa-circle"></i>
                                Mengandung angka (0-9)
                            </div>

                            <div id="ruleSymbol" class="rule-item">
                                <i class="me-2 fa fa-circle"></i>
                                Mengandung simbol (!@#$)
                            </div>

                        </div>

                        <div class="mt-2 password-strength">
                            <div id="strengthBar"></div>
                        </div>

                        <div class="mt-3 mb-4 form-floating">
                            <input type="text" name="telegram_id" class="form-control" placeholder="Telegram ID" required>
                            <label>Telegram ID</label>
                        </div>

                        <button type="submit" class="py-2 w-100 btn btn-primary fw-semibold btn-register">
                            Register Account
                        </button>

                        <div class="mt-4 text-center">
                            <small>Already have account?</small><br>
                            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=customer/login"; ?>"
                                class="text-decoration-none fw-semibold">
                                Login Now
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function togglePassword() {
        const password = document.getElementById("password");
        const icon = document.getElementById("toggleIcon");

        if (password.type === "password") {
            password.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            password.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function checkStrength() {

        const password = document.getElementById("password").value;
        const bar = document.getElementById("strengthBar");

        let strength = 0;

        const hasLength = password.length >= 6;
        const hasUpper = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSymbol = /[^A-Za-z0-9]/.test(password);

        if (hasLength) strength += 25;
        if (hasUpper) strength += 25;
        if (hasNumber) strength += 25;
        if (hasSymbol) strength += 25;

        // Update bar width
        bar.style.width = strength + "%";

        // Update bar color
        if (strength <= 25) {
            bar.style.background = "#dc3545"; // red
        } else if (strength <= 50) {
            bar.style.background = "#fd7e14"; // orange
        } else if (strength <= 75) {
            bar.style.background = "#0d6efd"; // blue
        } else {
            bar.style.background = "#198754"; // green
        }

        updateRule("ruleLength", hasLength);
        updateRule("ruleUpper", hasUpper);
        updateRule("ruleNumber", hasNumber);
        updateRule("ruleSymbol", hasSymbol);
    }

    function updateRule(id, valid) {

        const el = document.getElementById(id);
        const icon = el.querySelector("i");

        if (valid) {
            el.classList.add("valid");
            icon.classList.remove("fa-circle");
            icon.classList.add("fa-check-circle");
        } else {
            el.classList.remove("valid");
            icon.classList.remove("fa-check-circle");
            icon.classList.add("fa-circle");
        }
    }
</script>

</html>