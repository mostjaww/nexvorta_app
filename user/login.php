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

    <div class="d-flex align-items-center container-fluid min-vh-100">
        <div class="shadow-lg mx-auto rounded-4 overflow-hidden row" style="max-width: 900px;">

            <!-- LEFT SIDE -->
            <div class="d-lg-flex flex-column align-items-center justify-content-center p-5 text-white col-lg-6 d-none" style="background-color: #0077b6;">
                <img src="<?php echo $base_url; ?>assets/img/hero.png"
                    class="mb-4" style="max-width:200px;">

                <h2 class="fw-bold">NEXVORTA</h2>
                <p class="opacity-75 text-center">
                    Export & Import Solutions Terpercaya untuk Pertumbuhan Bisnis Anda
                </p>
            </div>

            <!-- RIGHT SIDE -->
            <div class="bg-white p-5 col-lg-6">

                <div class="mb-4 text-center">
                    <h3 class="fw-bold">Nexvorta Login</h3>
                    <p class="text-muted">Login to continue</p>
                </div>

                <div class="mb-3 text-start">
                    <a href="<?php echo $base_url; ?>"
                        class="btn-back">
                        <i class="fa-arrow-left me-2 fa"></i>Kembali
                    </a>
                </div>

                <form method="post" autocomplete="off">

                    <!-- USERNAME -->
                    <div class="mb-3 form-floating">
                        <input type="text" class="rounded-3 form-control" id="username" name="username" placeholder="Username" required>
                        <label for="username">
                            <i class="me-2 fa fa-user"></i>Username
                        </label>
                    </div>

                    <!-- PASSWORD -->
                    <div class="position-relative form-floating">
                        <input type="password" class="rounded-3 form-control" id="passwd" name="passwd" placeholder="Password" required>
                        <label for="passwd">
                            <i class="me-2 fa fa-lock"></i>Password
                        </label>

                        <span onclick="togglePassword()"
                            class="top-50 position-absolute me-3 translate-middle-y end-0"
                            style="cursor:pointer;">
                            <i class="text-secondary fa fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                    <div class="mb-3 text-end">
                        <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/forgot-password"; ?>"
                            class="text-primary text-decoration-none small">
                            Lupa Password?
                        </a>
                    </div>

                    <?php if (isset($_SESSION['otp'])): ?>

                        <!-- OTP -->
                        <div class="mb-4 form-floating">
                            <input type="text"
                                class="text-center form-control fw-bold"
                                id="otp"
                                name="otp"
                                placeholder="Kode OTP"
                                style="letter-spacing:5px; font-size:1.2rem;">
                            <label for="otp">Kode OTP</label>
                        </div>

                        <button type="submit" name="btnLogin"
                            class="py-2 rounded-3 w-100 btn btn-primary">
                            Masuk ke Dashboard
                        </button>

                    <?php else: ?>

                        <button type="submit" name="btnOTP" value="telegram"
                            class="py-2 rounded-3 btn-primary-outline w-100 btn">
                            <i class="me-2 fab fa-telegram"></i>Kirim OTP via Telegram
                        </button>

                    <?php endif; ?>

                    <div class="mt-1 text-center">
                        Belum punya akun?
                        <a href="#" onclick="pilihRegister(event)"
                            class="text-primary text-decoration-none small fw-semibold">
                            Daftar di sini
                        </a>
                    </div>

                    <input type="hidden" id="koor" name="koor">
                </form>

                <div class="mt-4 text-muted text-center small">
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
    function pilihRegister(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Registrasi Sebagai',
            text: 'Silakan pilih tipe akun yang ingin Anda daftarkan',
            icon: 'question',
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: 'Customer',
            denyButtonText: 'Seller',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#0077b6',
            denyButtonColor: '#00b4d8',
            cancelButtonColor: '#6c757d',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Customer
                window.location.href = "index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/register-customer"; ?>";
            } else if (result.isDenied) {
                // Seller
                window.location.href = "index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/register-seller"; ?>";
            }
        });
    }
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