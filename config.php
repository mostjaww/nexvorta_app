<?php
$keycode = "NexvortaApps!!!";

// --- KONEKSI 1 (Dashboard) ---
$host	= "127.0.0.1";
$user	= "root";
$pass	= "";
$name   = "admin_nexvorta";
$link = mysqli_connect($host, $user, $pass, $name);

if (!$link) {
	die("Koneksi ke conn gagal: " . mysqli_connect_error());
}

function encrypt($str)
{
    $hasil = crc32($str);
    return $hasil;
}

$base_url = 'http://localhost/nexvorta_apps/';