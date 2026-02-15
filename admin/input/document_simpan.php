<?php
include_once "header.php"; // <- sama seperti contohmu, bukan config.php langsung

if (!empty($_POST)) {
    $nomor_surat = $_POST["nomor_surat"];
    $nama_surat  = $_POST["nama_surat"];
    $jenis_surat = $_POST["jenis_surat"];

    // Handle upload file
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_name   = basename($_FILES["file"]["name"]);
    $target_file = $upload_dir . time() . "_" . $file_name;
    $file_type   = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi tipe file
    $allowed_types = ['pdf', 'doc', 'docx', 'jpg', 'png'];
    if (!in_array($file_type, $allowed_types)) {
        echo "Tipe file tidak diizinkan!";
        exit();
    }

    // Proses upload + simpan database
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $tanggal_upload = date('Y-m-d H:i:s');
        $query = "INSERT INTO document 
                  (nomor_surat, nama_surat, jenis_surat, file_path, tanggal_upload) 
                  VALUES 
                  ('" . $nomor_surat . "', '" . $nama_surat . "', '" . $jenis_surat . "', '" . $target_file . "', '" . $tanggal_upload . "')";

        $hasil = mysqli_query($link, $query);
        if (!$hasil) {
            echo mysqli_error($link);
            die();
        } else {
            header("Location: index.php?token=" . encrypt(date('Ymd')) . "&hal=input/document");
            exit();
        }
    } else {
        echo "Gagal upload file.";
        exit();
    }
} else {
    header("Location: index.php?token=" . encrypt(date('Ymd')) . "&hal=input/document");
    exit();
}
