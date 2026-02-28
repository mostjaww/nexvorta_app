<?php
session_start();

$maintenance = false;
$ip_boleh = array("192.168.80.47", "192.168.80.88", "192.168.80.11", "192.168.80.86", "103.15.240.106");
if ($maintenance) {
	if (isset($_SERVER['REMOTE_ADDR']) and in_array($_SERVER['REMOTE_ADDR'], $ip_boleh)) {
		##do nothing
	} else {

		error_reporting(E_ALL);
		ini_set('display_errors', 1); ## to debug your maintenance view 

		require_once 'maintenance.php'; ## call view
		return;
	}
}

include_once 'config.php';
// $tgl = encrypt(date('Ymd'));
if (@$_GET['token'] == '') {
	include_once 'login.php';
} elseif ($_GET['token'] <> encrypt(date('Ymd'))) {
	include_once 'login.php';
} else {
	$halaman = $_GET['hal'] . ".php";
	if (file_exists($halaman)) {
		include_once $halaman;
	} else {
		include_once '404.php';
	}
}
