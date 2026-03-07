<?php
include_once "config.php";

if (isset($_POST['btnRegister'])) {
    $nama      = mysqli_real_escape_string($link, $_POST['nama']);
    $uname     = mysqli_real_escape_string($link, $_POST['uname']);
    $passwd    = mysqli_real_escape_string($link, $_POST['passwd']);
    $nohp      = mysqli_real_escape_string($link, $_POST['nohp']);
    $telegram  = mysqli_real_escape_string($link, $_POST['idtelegram']);
    $role      = mysqli_real_escape_string($link, $_POST['role']);
    $status    = mysqli_real_escape_string($link, $_POST['status']);

    $cek = mysqli_query($link, "SELECT user_id FROM tbluser WHERE user_nm='$uname'");

    if (mysqli_num_rows($cek) > 0) {
        // Notifikasi Gagal
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire('Gagal', 'Username sudah digunakan!', 'warning');
            });
        </script>";
    } else {
        $pass_hash = md5($keycode . $passwd);
        $query = "INSERT INTO tbluser (user_nm, user_passwd, user_nama, role_id, user_nohp, user_telegram, user_isaktif) 
                  VALUES ('$uname', '$pass_hash', '$nama', '$role', '$nohp', '$telegram', '$status')";

        if (mysqli_query($link, $query)) {
            // Notifikasi Sukses
            echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Registration successful!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'register.php';
                        }
                    });
                });
            </script>";
        } else {
            $error = mysqli_error($link);
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire('Error', '$error', 'error');
                });
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Nexvorta Admin Dashboard</title>
    <link rel="icon" href="assets\img\logo\nexva.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets\dist\css\register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.21/dist/sweetalert2.min.css">
</head>

<body>
    <div class="container">
        <div class="form-box login">
            <form action="#">
                <h1>Login Admin Nexvorta</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>or login with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="" method="POST" style="overflow-y: auto; max-height: 100%;">
                <h1>Registration Nexvorta</h1>

                <div class="input-box">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                    <i class='bx bxs-id-card'></i>
                </div>

                <div class="input-box">
                    <input type="text" name="uname" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="passwd" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="input-box">
                    <input type="text" name="nohp" placeholder="No. WhatsApp (08...)" required>
                    <i class='bx bxl-whatsapp'></i>
                </div>

                <div class="input-box">
                    <input type="text" name="idtelegram" placeholder="ID Telegram (Opsional)">
                    <i class='bx bxl-telegram'></i>
                </div>

                <div class="input-box">
                    <label>Role Akses</label>
                    <select name="role" required>
                        <option value="">-- PILIH ROLE --</option>
                        <?php
                        $qRole = mysqli_query($link, "SELECT * FROM tblrole ORDER BY role_id ASC");
                        while ($rRole = mysqli_fetch_assoc($qRole)) {
                            echo "<option value='{$rRole['role_id']}'>{$rRole['role_nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-box">
                    <label>Status Akun</label>
                    <select name="status">
                        <option value="Y">AKTIF</option>
                        <option value="T">TIDAK AKTIF</option>
                    </select>
                </div>

                <button type="submit" name="btnRegister" class="btn">Register Now</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.21/dist/sweetalert2.all.min.js"></script>
    <script>
        const container = document.querySelector('.container');
        const registerBtn = document.querySelector('.register-btn');
        const loginBtn = document.querySelector('.login-btn');

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        })

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        })
    </script>
</body>

</html>