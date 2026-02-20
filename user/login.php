<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Login to Nexvorta Dashboard">
    <meta name="author" content="Nexvorta Team">
    <title>Login | Nexvorta - Export & Import Solutions</title>
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container-fluid min-vh-100 d-flex align-items-center">
        <div class="row shadow-lg rounded-4 overflow-hidden mx-auto" style="max-width: 900px;">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 d-none d-lg-flex text-white flex-column justify-content-center align-items-center p-5" style="background-color: #667eea;">
                <img src="<?php echo $base_url; ?>assets/img/hero.png"
                    class="mb-4" style="max-width:200px;">

                <h2 class="fw-bold">NEXVORTA</h2>
                <p class="text-center opacity-75">
                    Export & Import Solutions<br>
                    Solusi Ekspor & Impor Terpercaya untuk Pertumbuhan Bisnis Anda
                </p>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 bg-white p-5">

                <div class="mb-4 text-center">
                    <h3 class="fw-bold">Login to Continue</h3>
                    <p class="text-muted">Masuk untuk melanjutkan</p>
                </div>

                <form method="post" autocomplete="off">

                    <!-- USERNAME -->
                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control rounded-3"
                            id="username"
                            name="username"
                            placeholder="Username"
                            required>
                        <label for="username">
                            <i class="fa fa-user me-2"></i>Username
                        </label>
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-floating mb-3 position-relative">
                        <input type="password"
                            class="form-control rounded-3"
                            id="passwd"
                            name="passwd"
                            placeholder="Password"
                            required>
                        <label for="passwd">
                            <i class="fa fa-lock me-2"></i>Password
                        </label>

                        <span onclick="togglePassword()"
                            class="position-absolute top-50 end-0 translate-middle-y me-3"
                            style="cursor:pointer;">
                            <i class="fa fa-eye text-secondary" id="toggleIcon"></i>
                        </span>
                    </div>

                    <?php if (isset($_SESSION['otp'])): ?>

                        <!-- OTP -->
                        <div class="form-floating mb-4">
                            <input type="text"
                                class="form-control text-center fw-bold"
                                id="otp"
                                name="otp"
                                placeholder="Kode OTP"
                                style="letter-spacing:5px; font-size:1.2rem;">
                            <label for="otp">Kode OTP</label>
                        </div>

                        <button type="submit" name="btnLogin"
                            class="btn btn-primary w-100 rounded-3 py-2">
                            Masuk ke Dashboard
                        </button>

                    <?php else: ?>

                        <button type="submit" name="btnOTP" value="telegram"
                            class="btn btn-outline-primary w-100 rounded-3 py-2">
                            <i class="fab fa-telegram me-2"></i>Kirim OTP via Telegram
                        </button>

                    <?php endif; ?>

                    <div class="text-center mt-3">
                        <a href="<?php echo $base_url; ?>"
                            class="text-decoration-none text-muted small">
                            ← Kembali ke Beranda
                        </a>
                    </div>

                    <input type="hidden" id="koor" name="koor">
                </form>

                <div class="text-center mt-4 small text-muted">
                    &copy; <?php echo date('Y'); ?> Nexvorta. All rights reserved.
                </div>

            </div>
        </div>
    </div>

</body>

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