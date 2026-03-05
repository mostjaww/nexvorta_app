<?php
ini_set(option: 'display_errors', value: 1);
ini_set(option: 'display_startup_errors', value: 1);
error_reporting(error_level: E_ALL);

$host = "localhost";
$username = "root";
$port = 3306; // Convert port to integer
$password = "";
$dbname = "dpmptsp";

$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/sneat/";

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
