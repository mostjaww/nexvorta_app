<?php
session_start();
include_once "config.php";

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = mysqli_real_escape_string($link, $_POST['username']);

    $role = '';
    $data = null;

    // Cek Customer
    $q1 = mysqli_query(
        $link,
        "SELECT * FROM tblcustomer 
         WHERE username='$user' OR email='$user'"
    );

    if (mysqli_num_rows($q1) > 0) {
        $data = mysqli_fetch_assoc($q1);
        $role = "customer";
    } else {

        // Cek Seller
        $q2 = mysqli_query(
            $link,
            "SELECT * FROM tblseller 
             WHERE username='$user' OR email='$user'"
        );

        if (mysqli_num_rows($q2) > 0) {
            $data = mysqli_fetch_assoc($q2);
            $role = "seller";
        } else {
            $error_msg = "Username atau Email tidak ditemukan.";
        }
    }

    if ($data) {

        // Generate token secure
        $token = bin2hex(random_bytes(32));
        $expired = date("Y-m-d H:i:s", strtotime("+5 minutes"));

        if ($role == "customer") {
            mysqli_query(
                $link,
                "UPDATE tblcustomer 
                 SET token='$token', token_expired='$expired'
                 WHERE id='" . $data['id'] . "'"
            );
        } else {
            mysqli_query(
                $link,
                "UPDATE tblseller 
                 SET token='$token', token_expired='$expired'
                 WHERE id='" . $data['id'] . "'"
            );
        }

        // Buat link reset
        $reset_link = $base_url . "index.php?token="
            . encrypt(date('Ymd'))
            . "&hal=user/reset-password"
            . "&reset_token=" . $token;

        // Kirim ke Telegram
        $text = "Reset Password Nexvorta\n\nKlik link berikut (berlaku 5 menit):\n$reset_link";

        @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram .
            "/sendMessage?chat_id=" . $data['telegram_id'] .
            "&text=" . urlencode($text));

        $success_msg = "Link reset password telah dikirim ke Telegram Anda.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Nexvorta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/forgot-password.css">
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
</head>

<body>

    <div class="card-reset text-center">

        <h3 class="fw-bold mb-2">Forgot Password</h3>
        <p class="text-muted mb-4">Masukkan Username atau Email Anda</p>

        <?php if (!empty($error_msg)) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '<?= $error_msg ?>',
                    confirmButtonColor: '#d33'
                });
            </script>
        <?php endif; ?>

        <?php if (!empty($success_msg)) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Link telah terkirim ke Telegram Anda.',
                    confirmButtonColor: '#0d6efd'
                }).then(() => {
                    window.location = "index.php?token=<?= encrypt(date('Ymd')) ?>&hal=user/forgot-password";
                });
            </script>
        <?php endif; ?>

        <form method="POST">
            <input type="text"
                name="username"
                class="form-control mb-4"
                placeholder="Username / Email"
                required>

            <button type="submit" class="btn btn-primary w-100 btn-reset">
                Kirim Link Reset
            </button>
        </form>

    </div>

</body>

</html>