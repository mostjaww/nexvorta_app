<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Site Maintenance</title>
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
</head>

<body>
    <img src="<?php echo $base_url; ?>assets\img\404.png" alt="Maintenance Illustration" class="image">
    <h1>Maintenance</h1>
    <p>Mohon maaf, layanan kami sedang dalam perbaikan. Kami akan segera kembali!</p>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    h1 {
        color: #0d6efd;
    }

    p {
        font-size: 18px;
        color: #555;
    }

    .image {
        width: 100%;
        max-width: 300px;
        margin-bottom: 20px;
    }
</style>

</html>