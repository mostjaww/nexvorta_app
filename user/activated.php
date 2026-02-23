<?php
session_start();
include_once "config.php";

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $otp_input = mysqli_real_escape_string($link, $_POST['otp']);

    if (!isset($_SESSION['pending_activation'])) {
        $error = "Session tidak ditemukan.";
    } else {

        $username = $_SESSION['pending_activation'];

        $query = mysqli_query($link, "SELECT otp FROM tblcustomer WHERE username='$username' AND is_active='Need Activation'");

        if (mysqli_num_rows($query) > 0) {

            $data = mysqli_fetch_assoc($query);

            if ($otp_input == $data['otp']) {

                mysqli_query($link, "UPDATE tblcustomer 
                                     SET is_active='Active', otp=NULL 
                                     WHERE username='$username'");

                unset($_SESSION['pending_activation']);
                $success = true;
            } else {
                $error = "Kode OTP tidak sesuai.";
            }
        } else {
            $error = "Akun tidak ditemukan atau sudah aktif.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun - Nexvorta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/activated.css">
</head>

<body>

    <div class="text-center otp-card">

        <h3 class="mb-2 brand-title">Aktivasi Akun</h3>
        <p class="mb-4 subtitle">
            Masukkan kode OTP yang dikirim ke Telegram Anda
        </p>

        <?php if (!empty($error)) { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'OTP Salah',
                    text: '<?php echo $error; ?>'
                });
            </script>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="text-center alert alert-success">
                Aktivasi berhasil! Akun Anda sudah aktif.
            </div>

            <a href="index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/login"; ?>" class="mt-3 w-100 btn btn-success">
                <i class="me-2 fa fa-home"></i> Kembali ke Login
            </a>
        <?php } ?>

        <?php if (!$success) { ?>
            <form method="POST">

                <input type="text"
                    name="otp"
                    class="mb-4 form-control otp-input"
                    maxlength="6"
                    placeholder="______"
                    required
                    autofocus>

                <button type="submit" class="w-100 btn btn-primary btn-activate">
                    <i class="me-2 fa fa-check-circle"></i> Aktivasi Sekarang
                </button>

            </form>
        <?php } ?>

    </div>

</body>

</html>