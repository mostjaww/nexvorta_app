<?php
include_once "header.php";
$query = "SELECT trkelurahan.* FROM trkelurahan INNER JOIN trkecamatan_trkelurahan ON trkelurahan.id = trkecamatan_trkelurahan.trkelurahan_id WHERE trkecamatan_trkelurahan.trkecamatan_id =" . $_GET["id"];
$hasil = mysqli_query($link, $query);

echo "<option value=''>Pilih Kelurahan : </option>";

while ($r = mysqli_fetch_assoc($hasil)) {
    $id = $r['id'];
    $nama = $r['n_kelurahan'];
    echo "<option value='$id'>$nama</option>";
}
