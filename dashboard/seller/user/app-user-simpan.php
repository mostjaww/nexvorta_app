<?php
session_start();
include_once 'API/config.php';
include_once 'function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username   = htmlspecialchars($_POST['username']);
    $password   = sha1($_POST['password']); // Enkripsi password dengan SHA1 lalu MD5
    $email      = htmlspecialchars($_POST['email']);
    $nomorwa    = htmlspecialchars($_POST['nomorwa']);
    $jabatan_id = htmlspecialchars($_POST['jabatan']);
    $role_id    = $_POST['role'];

    // Validasi input sederhana
    if (empty($username) || empty($_POST['password']) || empty($email) || empty($nomorwa) || empty($jabatan_id) || empty($role_id)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email tidak valid!');</script>";
    } else {
        // Cek apakah username, email, atau nomorwa sudah digunakan
        $check_sql  = "SELECT * FROM tbluser WHERE username = ? OR email = ? OR nomorwa = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("sss", $username, $email, $nomorwa);
        $check_stmt->execute();
        $result     = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Username, email, atau nomor WhatsApp sudah digunakan!'); window.location.href='app-user.php';</script>";
            exit();
        } else {
            // Simpan data jika tidak ada duplikasi
            $sql = "INSERT INTO tbluser (username, password, email, nomorwa, jabatan_id, role_id) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $username, $password, $email, $nomorwa, $jabatan_id, $role_id);

            if ($stmt->execute()) {
                echo "<script>alert('Akun Berhasil Dibuat!'); window.location.href='app-user.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan, silakan coba lagi!'); window.location.href='app-user.php';</script>";
            }
            exit();
        }
    }
}
