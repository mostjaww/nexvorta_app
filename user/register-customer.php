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
        $error = "All fields are required!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long!";
    } else {

        // Cek username / email
        $cek = mysqli_query($link, "SELECT id FROM tblcustomer WHERE username='$username' OR email='$email'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Username or Email already in use!";
        } else {

            // HASH PASSWORD MENGGUNAKAN KEYCODE
            $password_hash = md5($keycode . $password);

            // Generate OTP
            $otp = rand(100000, 999999);

            $query = "INSERT INTO tblcustomer 
                  (name, username, email, birth, password, telegram_id, otp, is_active, created_at)
                  VALUES 
                  ('$name','$username','$email','$birth','$password_hash','$telegram','$otp','Need Activation',NOW())";

            if (mysqli_query($link, $query)) {

                // Kirim OTP ke Telegram
                $text = "Hello $name 👋\n\n"
                    . "Thank you for registering an account at Nexvorta.\n\n"
                    . "To continue the account activation process, please use the following OTP code:\n\n"
                    . "🔐 $otp\n\n"
                    . "This OTP code is only valid for a few minutes and is confidential.\n"
                    . "Do not share this code with anyone.\n\n"
                    . "Thank you for your trust in Nexvorta.\n\n"
                    . "— Nexvorta Team";

                @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram .
                    "/sendMessage?chat_id=" . $telegram .
                    "&text=" . urlencode($text));

                $_SESSION['pending_activation'] = $username;

                echo "<script>
                    window.location='index.php?token=" . encrypt(date('Ymd')) . "&hal=user/activated';
                </script>";
                exit;
            } else {
                $error = "An error occurred while saving the data.";
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
    <title>Register Customer | Nexvorta - Export & Import Solutions</title>
    <link rel="shortcut icon" href="assets/img/nexva.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/css/register.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="h-100 row">

            <!-- LEFT BRANDING -->
            <div class="left-panel d-lg-flex align-items-center p-5 col-lg-6 d-none">
                <div style="z-index:2;">
                    <h1 class="fw-bold display-4"><img src="assets/img/nexva.png" width="80"> Nexvorta</h1>
                    <p class="mb-4 lead">Global Export & Import Platform</p>
                    <p class="opacity-75">
                        Register now and start your international business journey with Nexvorta.
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

                    <form method="POST" id="registerForm" autocomplete="off">

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
                                onkeyup="checkStrength()"
                                required>

                            <label>Password</label>

                            <span onclick="togglePassword()"
                                class="top-50 position-absolute me-3 translate-middle-y end-0"
                                style="cursor:pointer;">
                                <i class="text-secondary fa fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>

                        <div class="mt-3 password-rules small">

                            <div id="ruleLength" class="rule-item text-muted">
                                <i class="bi bi-circle-fill me-1"></i>
                                Minimum 6 characters
                            </div>

                            <div id="ruleUpper" class="rule-item text-muted">
                                <i class="bi bi-circle-fill me-1"></i>
                                Contains uppercase letter (A-Z)
                            </div>

                            <div id="ruleNumber" class="rule-item text-muted">
                                <i class="bi bi-circle-fill me-1"></i>
                                Contains number (0-9)
                            </div>

                            <div id="ruleSymbol" class="rule-item text-muted">
                                <i class="bi bi-circle-fill me-1"></i>
                                Contains symbol (!@#$)
                            </div>

                        </div>

                        <div class="progress mt-2" style="height:6px;">
                            <div id="strengthBar" class="progress-bar bg-danger" style="width:0%"></div>
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
                            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/login"; ?>"
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
    document.getElementById("registerForm").addEventListener("submit", function(e) {

        const valid = checkStrength();

        if (!valid) {
            e.preventDefault();

            Swal.fire({
                icon: 'warning',
                title: 'Weak Password',
                text: 'Password must contain at least one uppercase letter, one number, one symbol, and be at least 6 characters long.'
            });
        }

    });

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

        const hasLength = password.length >= 6;
        const hasUpper = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSymbol = /[^A-Za-z0-9]/.test(password);

        updateRule("ruleLength", hasLength);
        updateRule("ruleUpper", hasUpper);
        updateRule("ruleNumber", hasNumber);
        updateRule("ruleSymbol", hasSymbol);

        let strength = 0;

        if (hasLength) strength++;
        if (hasUpper) strength++;
        if (hasNumber) strength++;
        if (hasSymbol) strength++;

        let percent = (strength / 4) * 100;

        bar.style.width = percent + "%";

        bar.classList.remove("bg-danger", "bg-warning", "bg-info", "bg-success");

        if (percent <= 25) {
            bar.classList.add("bg-danger");
        } else if (percent <= 50) {
            bar.classList.add("bg-warning");
        } else if (percent <= 75) {
            bar.classList.add("bg-info");
        } else {
            bar.classList.add("bg-success");
        }

    }

    function updateRule(id, valid) {

        const el = document.getElementById(id);
        const icon = el.querySelector("i");

        if (valid) {

            el.classList.add("valid");

            icon.classList.remove("bi-circle-fill");
            icon.classList.add("bi-check-circle-fill");

        } else {

            el.classList.remove("valid");

            icon.classList.remove("bi-check-circle-fill");
            icon.classList.add("bi-circle-fill");

        }

    }
</script>

</html>