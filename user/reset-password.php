<?php
session_start();
include_once "config.php";

$error = '';
$success = '';

if (!isset($_GET['token'])) {
    die("Token tidak valid.");
}

$token = $_GET['reset_token'] ?? '';
$now = date("Y-m-d H:i:s");

$role = '';
$data = null;

// Cek customer
$q1 = mysqli_query(
    $link,
    "SELECT * FROM tblcustomer 
     WHERE token='$token' 
     AND token_expired >= '$now'"
);

if (mysqli_num_rows($q1) > 0) {
    $data = mysqli_fetch_assoc($q1);
    $role = "customer";
} else {

    // Cek seller
    $q2 = mysqli_query(
        $link,
        "SELECT * FROM tblseller 
         WHERE token='$token' 
         AND token_expired >= '$now'"
    );

    if (mysqli_num_rows($q2) > 0) {
        $data = mysqli_fetch_assoc($q2);
        $role = "seller";
    } else {
        $error_msg = "Token tidak valid atau sudah expired.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $new_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($role == "customer") {

        mysqli_query(
            $link,
            "UPDATE tblcustomer 
             SET password='$new_pass',
                 token=NULL,
                 token_expired=NULL
             WHERE id='" . $data['id'] . "'"
        );
    } else {

        mysqli_query(
            $link,
            "UPDATE tblseller 
             SET password='$new_pass',
                 token=NULL,
                 token_expired=NULL
             WHERE id='" . $data['id'] . "'"
        );
    }

    $success = "Password berhasil direset.";
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

    <?php if ($success): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= $success ?>'
            }).then(() => {
                window.location = 'index.php?token=<?= encrypt(date('Ymd')) ?>&hal=user/login';
            });
        </script>
    <?php endif; ?>
    <?php if (!empty($error_msg)) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Akses Ditolak',
                text: '<?= $error_msg ?>',
                confirmButtonColor: '#d33'
            }).then(() => {
                window.location = "index.php?token=<?= encrypt(date('Ymd')) ?>&hal=user/login";
            });
        </script>
    <?php endif; ?>

    <div class="card-reset text-center">

        <h3 class="fw-bold mb-2">Reset Password</h3>
        <p class="text-muted mb-4">Masukkan Kode OTP dan Password Baru Anda</p>

        <form method="POST">
            <input type="password"
                name="password"
                class="form-control mb-3"
                placeholder="Password Baru"
                required>

            <button type="submit" class="btn btn-success w-100">
                Reset Password
            </button>
        </form>

    </div>

</body>

</html>