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
            $error_msg = "Username or Email not found.";
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
        $text = "Reset Password Nexvorta\n\nPlease click the link below (valid for 5 minutes):\n$reset_link";

        @file_get_contents("https://api.telegram.org/bot" . $token_bottelegram .
            "/sendMessage?chat_id=" . $data['telegram_id'] .
            "&text=" . urlencode($text));

        $success_msg = "Reset password link has been sent to your Telegram.";
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
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js"></script>
    <link rel="stylesheet" href="assets/css/forgot-password.css">
    <link href="assets/css/login.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/nexva.png" type="image/x-icon">
</head>

<body>

    <div class="card-reset text-center">

        <div class="mb-3 text-start">
            <a href="<?php echo $base_url; ?>index.php?token=<?php echo encrypt(date('Ymd')) . "&hal=user/login"; ?>"
                class="btn-back">
                <i class="fa-arrow-left me-2 fa"></i>Back to Home
            </a>
        </div>

        <h3 class="fw-bold mb-2">Forgot Password</h3>
        <p class="text-muted mb-4">Enter your Username or Email to receive a reset link</p>

        <?php if (!empty($error_msg)) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: '<?= $error_msg ?>',
                    confirmButtonColor: '#d33'
                });
            </script>
        <?php endif; ?>

        <?php if (!empty($success_msg)) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Reset link has been sent to your Telegram.',
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
                Send Reset Link
            </button>
        </form>

    </div>

</body>

</html>