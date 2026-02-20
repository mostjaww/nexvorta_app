<?php
$maintenance = false;
$ip_boleh = array(
    "192.168.80.47",
    "192.168.80.88",
    "192.168.80.11",
    "192.168.80.86",
    "103.15.240.106"
);

if ($maintenance) {
    if (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], $ip_boleh)) {
        // boleh akses
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        require_once 'maintenance.php';
        return;
    }
}

include_once 'config.php';

// Validasi token tetap digunakan
if (!isset($_GET['token']) || $_GET['token'] != encrypt(date('Ymd'))) {
    include_once 'dashboard.php';
} else {

    // Jika tidak ada parameter hal → default dashboard
    if (!isset($_GET['hal']) || $_GET['hal'] == '') {
        include_once 'dashboard.php';
    } else {
        $allowed_pages = [
            'dashboard',
            'about-us',
            'products/crafts-umkm',
            'products/agriculture-plantations',
            'products/livestockfarm',
            'user/login',
            'privacy-policy',
            'terms'
        ];

        if (isset($_GET['hal']) && in_array($_GET['hal'], $allowed_pages)) {
            include_once $_GET['hal'] . '.php';
        } else {
            include_once '404.php';
        }
    }
}
