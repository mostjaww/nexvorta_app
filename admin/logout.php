<?php
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Logout</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>

<body>

    <script>
        Swal.fire({
            title: 'Berhasil Keluar!',
            text: 'Anda telah keluar dari Dashboard.',
            icon: 'success',
            timer: 2000, // Otomatis pindah setelah 2 detik
            showConfirmButton: false
        }).then(() => {
            // Redirect ke halaman login setelah alert selesai/ditutup
            window.location.href = '/admin/';
        });
    </script>

</body>

</html>