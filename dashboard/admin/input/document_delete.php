<?php
include_once "config.php"; // Langsung koneksi DB saja, tanpa load layout

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID aman

    $query = "DELETE FROM document WHERE id = $id";
    $hasil = mysqli_query($link, $query);

    if (!$hasil) {
        die("Gagal menghapus data: " . mysqli_error($link));
    } else {
        header("Location: index.php?token=" . encrypt(date('Ymd')) . "&hal=input/document");
        exit();
    }
} else {
    echo "Data tidak valid.";
    exit();
}
