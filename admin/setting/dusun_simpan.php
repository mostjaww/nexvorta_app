<?php
include_once "header.php";
if (!empty($_POST)) {
    $nama_kecamatan = $_POST["nama"];
    $kode_kecamatan = $_POST["kode"];

    $query = "INSERT INTO trdusun (n_dusun,kode_daerah) VALUES ('" . $nama_kecamatan . "','" . $kode_kecamatan . "')";

    $hasil = mysqli_query($link, $query);
    if (!$hasil) {
        echo mysqli_error($link);
        die();
    } else {
        $id_kecamatan = $_GET['id'];
        $id_kelurahan = mysqli_insert_id($link);
        $queryrelasi = "INSERT INTO trkelurahan_trdusun (trkelurahan_id, trdusun_id) values ('" . $id_kecamatan . "', '" . $id_kelurahan . "')";
        $hasilrelasi = mysqli_query($link, $queryrelasi);
        if (!$hasilrelasi) {
            echo mysqli_error($link);
            die();
        } else {
            header("Location: index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/dusun&id=" . $_GET['id'] . "&name=" . $_GET['name']);
            exit();
        }
    }
} else {
    header("Location: index.php?token=" . encrypt(date('Ymd')) . "&hal=setting/dusun");
    exit();
}
