<?php
session_start();
include_once '../API/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'] ?? '';
    if (!$username) {
        $_SESSION['notif'] = '<div class="alert alert-danger" role="alert">User tidak ditemukan.</div>';
        header("Location: app-account-settings.php");
        exit;
    }
    $user_q = mysqli_query($conn, "SELECT id FROM tbluser WHERE username='$username'");
    $user_row = mysqli_fetch_assoc($user_q);
    $user_id = $user_row['id'] ?? 0;
    if ($user_id <= 0) {
        $_SESSION['notif'] = '<div class="alert alert-danger" role="alert">User tidak ditemukan.</div>';
        header("Location: app-account-settings.php");
        exit;
    }
    $nama_depan    = $_POST['nama_depan'] ?? '';
    $nama_belakang = $_POST['nama_belakang'] ?? '';
    $alamat        = $_POST['alamat'] ?? '';
    $provinsi      = $_POST['provinsi'] ?? '';
    $kabupaten     = $_POST['kabupaten'] ?? '';
    $kecamatan     = $_POST['kecamatan'] ?? '';
    $negara        = $_POST['negara'] ?? '';
    $kode_pos      = $_POST['kode_pos'] ?? '';
    $bahasa        = $_POST['bahasa'] ?? '';

    $cek = mysqli_query($conn, "SELECT * FROM tblprofile WHERE user_id='$user_id'");
    if (mysqli_num_rows($cek) > 0) {
        $sql = "UPDATE tblprofile SET 
            nama_depan=?, nama_belakang=?, alamat=?, provinsi=?, kabupaten=?, kecamatan=?, negara=?, kode_pos=?, bahasa=?
            WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $nama_depan, $nama_belakang, $alamat, $provinsi, $kabupaten, $kecamatan, $negara, $kode_pos, $bahasa, $user_id);
        $success = $stmt->execute();
        $_SESSION['notif'] = $success
            ? '<div class="alert alert-success" role="alert">Profil berhasil diperbarui.</div>'
            : '<div class="alert alert-danger" role="alert">Gagal memperbarui profil.</div>';
        $stmt->close();
    } else {
        $sql = "INSERT INTO tblprofile (user_id, nama_depan, nama_belakang, alamat, provinsi, kabupaten, kecamatan, negara, kode_pos, bahasa)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssssss", $user_id, $nama_depan, $nama_belakang, $alamat, $provinsi, $kabupaten, $kecamatan, $negara, $kode_pos, $bahasa);
        $success = $stmt->execute();
        $_SESSION['notif'] = $success
            ? '<div class="alert alert-success" role="alert">Profil berhasil disimpan.</div>'
            : '<div class="alert alert-danger" role="alert">Gagal menyimpan profil.</div>';
        $stmt->close();
    }
    header("Location: app-account-settings.php");
    exit;
}
?>
