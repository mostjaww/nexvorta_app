<?php
session_start();
include_once "config.php";

/* ===============================
   CEK LOGIN CUSTOMER
=============================== */

if (!isset($_SESSION['user_id']) || $_SESSION['login_type'] != "customer") {

    $page = encrypt(date('Ymd')) . "&hal=user/login";
    $link_login = "index.php?token=" . $page;

    header("Location: $link_login");
    exit;
}

/* ===============================
   DATA CUSTOMER LOGIN
=============================== */

$customer_id   = $_SESSION['user_id'];
$customer_name = $_SESSION['name'];
$username      = $_SESSION['username'];
?>


<main class="flex-fill">

    

</main>


<?php include 'function/footer.php'; ?>