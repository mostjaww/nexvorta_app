<?php
include_once 'config.php';

if ($_GET['token'] == '') {
    header("Location: logout.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ePadi Deli Serdang">
    <meta name="author" content="Duo Tri">
    <title><?php echo $title_dashboard; ?></title>
    <link rel="shortcut icon" href="<?php echo $title_icon; ?>">
    <link rel="manifest" href="/epadi/manifest.json">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/dist/css/style.css" rel="stylesheet">
    <link href="assets/dist/css/custom.css" rel="stylesheet">
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="assets/plugins/jquery.sumoselect/sumoselect.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--<link href="assets/dist/css/select.html" rel="stylesheet" type="text/css"/>-->
    <script type="text/javascript" src="/epadi/main.js"></script>
    <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/plugins/modals/component.css" rel="stylesheet">
    <link href="assets/plugins/weather-icons/css/weather-icons.min.css" rel="stylesheet">
    <link href="assets/plugins/weather-icons/css/weather-icons-wind.min.css" rel="stylesheet">
    <link href="assets/plugins/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sneat-bootstrap-html-admin-template-free@1.0.0/assets/vendor/css/theme-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
</head>

<script>
    // Hilangkan loader saat halaman selesai dimuat
    window.addEventListener('load', function() {
        var loader = document.querySelector('.page-loader-wrapper');
        if (loader) {
            // Efek transisi opacity sebelum dihilangkan
            loader.style.opacity = '0';
            setTimeout(function() {
                loader.style.display = 'none';
            }, 500); // Waktu 500ms sesuai dengan transisi CSS
        }
    });
</script>

<body class="fixed">
    <div class="page-loader-wrapper">
        <div class="loader-container">
            <div class="bouncing-dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <p class="loader-text">Menyiapkan Website Dashboard</p>
        </div>
    </div>

    <style>
        .page-loader-wrapper {
            background: #f4f7f6;
            /* Sedikit abu-abu biar tidak silau */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader-container {
            text-align: center;
        }

        .bouncing-dots {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .dot {
            width: 15px;
            height: 15px;
            margin: 0 5px;
            background-color: #007bff;
            /* Warna Biru */
            border-radius: 50%;
            animation: bounce 0.6s infinite alternate;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
            background-color: #17a2b8;
            /* Warna Cyan/Info */
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
            background-color: #28a745;
            /* Warna Hijau */
        }

        .loader-text {
            font-family: 'Helvetica Neue', sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: #555;
            letter-spacing: 0.5px;
        }

        @keyframes bounce {
            to {
                transform: translateY(-20px);
                opacity: 0.7;
            }
        }
    </style>