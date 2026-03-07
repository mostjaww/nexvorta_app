<?php
session_start();
include_once "../config.php";

/* =========================
   HAPUS SEMUA SESSION
========================= */

$_SESSION = array();

session_unset();
session_destroy();

/* =========================
   REDIRECT KE LOGIN
========================= */

$page = encrypt(date('Ymd')) . "&hal=user/login";
$link_login = "index.php?token=" . $page;

header("Location: $link_login");
exit;
