<?php
include_once "config.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$query = "SELECT file_path FROM document WHERE id = '$id' LIMIT 1";
$result = mysqli_query($link, $query);

if ($row = mysqli_fetch_assoc($result)) {
    // Pastikan path mengarah ke folder uploads
    $file = $row['file_path'];
    if (!file_exists($file)) {
        $file = "uploads/" . $row['file_path'];
    }

    if (file_exists($file)) {
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if ($ext === 'pdf') {
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=\"" . basename($file) . "\"");
            readfile($file);
            exit;
        } else {
            header("Content-Disposition: inline; filename=\"" . basename($file) . "\"");
            header("Content-Type: application/octet-stream");
            readfile($file);
            exit;
        }
    } else {
        die("File tidak ditemukan di folder uploads/");
    }
} else {
    die("Data tidak ditemukan.");
}
