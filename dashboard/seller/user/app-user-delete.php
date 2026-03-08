<?php
session_start();
include 'API/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk keamanan
    $sql = "DELETE FROM tbluser WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='app-user.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, silakan coba lagi!');</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['message'] = "ID tidak ditemukan!";
    $_SESSION['msg_type'] = "warning";
}

// Redirect kembali ke halaman utama
header("Location: app-user.php");
exit();
?>
