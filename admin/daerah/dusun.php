<?php
include_once "header.php";
$query = "SELECT trdusun.* FROM trdusun INNER JOIN trkelurahan_trdusun ON trdusun.id = trkelurahan_trdusun.trdusun_id WHERE	trkelurahan_trdusun.trkelurahan_id = " . $_GET["id"];
$hasil = mysqli_query($link, $query);

echo "<option value=''>Pilih Dusun : </option>";

while ($r = mysqli_fetch_assoc($hasil)) {
    $id = $r['id'];
    $nama = $r['n_dusun'];
    echo "<option value='$id'>$nama</option>";
}
