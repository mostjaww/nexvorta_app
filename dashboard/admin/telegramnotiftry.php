<?php
include_once "config.php";
//echo "https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=-506914504&text=" . urlencode($message) . "&parse_mode=html";
//die();
$query = "SELECT
(NEW_KD_PROPINSI || '-' || NEW_KD_DATI2 || '-' || NEW_KD_KECAMATAN || '-' || NEW_KD_KELURAHAN || '-' || NEW_KD_BLOK || '-' || NEW_NO_URUT || '-' || NEW_KD_JNS_OP) AS NOP, 
HIST_ID, TO_CHAR(HIST_TIME,'DD-MON-YYYY HH24:MI:SS') AS HIST_TIME, OLD_THN_PAJAK_SPPT, OLD_SIKLUS_SPPT, 
OLD_JLN_OP_SPPT, OLD_BLOK_KAV_NO_OP_SPPT, OLD_RW_OP_SPPT, OLD_RT_OP_SPPT, 
OLD_NM_WP_SPPT, OLD_JLN_WP_SPPT, OLD_BLOK_KAV_NO_WP_SPPT, OLD_RW_WP_SPPT, OLD_RT_WP_SPPT, OLD_KELURAHAN_WP_SPPT, OLD_KECAMATAN_WP_SPPT, OLD_KOTA_WP_SPPT, OLD_KD_POS_WP_SPPT, OLD_STATUS_WP_SPPT, 
OLD_NPWP_SPPT, OLD_NO_PERSIL_SPPT, OLD_LUAS_BUMI_SPPT, OLD_LUAS_BNG_SPPT, OLD_KD_KLS_TANAH, OLD_THN_AWAL_KLS_TANAH, OLD_KD_KLS_BNG, OLD_THN_AWAL_KLS_BNG, OLD_NJOP_BUMI_SPPT, OLD_NJOP_BNG_SPPT, OLD_NJOP_SPPT, OLD_NJOPTKP_SPPT, OLD_NJKP_SPPT, OLD_TARIF_SPPT, OLD_PBB_TERHUTANG_SPPT, OLD_FAKTOR_PENGURANG_SPPT, OLD_PBB_YG_HRS_DIBAYAR_SPPT, OLD_TGL_JATUH_TEMPO_SPPT, OLD_KD_BANK_TUNGGAL,
OLD_KD_BANK_PERSEPSI, OLD_KD_TP, OLD_STATUS_PEMBAYARAN_SPPT, OLD_STATUS_TAGIHAN_SPPT, OLD_STATUS_CETAK_SPPT, 
OLD_TGL_TERBIT_SPPT, OLD_TGL_CETAK_SPPT,OLD_NIP_PENCETAK_SPPT, OLD_UPDATED_AT, NEW_THN_PAJAK_SPPT, NEW_SIKLUS_SPPT, NEW_JLN_OP_SPPT,NEW_BLOK_KAV_NO_OP_SPPT, NEW_RW_OP_SPPT, NEW_RT_OP_SPPT, NEW_NM_WP_SPPT, NEW_JLN_WP_SPPT, NEW_BLOK_KAV_NO_WP_SPPT, NEW_RW_WP_SPPT, NEW_RT_WP_SPPT, NEW_KELURAHAN_WP_SPPT,NEW_KECAMATAN_WP_SPPT, NEW_KOTA_WP_SPPT, NEW_KD_POS_WP_SPPT, NEW_STATUS_WP_SPPT, NEW_NPWP_SPPT, NEW_NO_PERSIL_SPPT, NEW_LUAS_BUMI_SPPT, NEW_LUAS_BNG_SPPT, NEW_KD_KLS_TANAH, NEW_KD_KLS_BNG, NEW_THN_AWAL_KLS_TANAH, NEW_THN_AWAL_KLS_BNG, NEW_NJOP_BUMI_SPPT, NEW_NJOP_BNG_SPPT, NEW_NJOP_SPPT, NEW_NJOPTKP_SPPT, NEW_NJKP_SPPT,NEW_TARIF_SPPT, NEW_PBB_TERHUTANG_SPPT, NEW_FAKTOR_PENGURANG_SPPT, NEW_PBB_YG_HRS_DIBAYAR_SPPT, NEW_TGL_JATUH_TEMPO_SPPT,NEW_KD_BANK_TUNGGAL, NEW_KD_TP, NEW_KD_BANK_PERSEPSI, 
NEW_STATUS_PEMBAYARAN_SPPT, NEW_STATUS_TAGIHAN_SPPT, NEW_STATUS_CETAK_SPPT, NEW_TGL_TERBIT_SPPT,NEW_TGL_CETAK_SPPT, NEW_NIP_PENCETAK_SPPT, NEW_UPDATED_AT,OLD_KD_DATI2
FROM
IPROTAXPBB.NOTIFIKASI_EPADI
WHERE
STATUS = 0 AND ROWNUM <= 1 ORDER BY HIST_ID ASC";
$stid = oci_parse($link_pbb, $query);
oci_execute($stid);

while ($r = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {

    //die('----#' . $r['OLD_KD_DATI2'] . '#-------------');
    if ($r['OLD_KD_DATI2'] <> '') {
        $perubahan = 0;
        $message = "Telah terjadi Perubahan pada tanggal : " . $r['HIST_TIME'] . " # " . $r['HIST_ID'] . " NOP : <b>" . $r['NOP'] . "</b> TAHUN : <b>" . $r['NEW_THN_PAJAK_SPPT'] . "</b> Nama : <b>" . $r['NEW_NM_WP_SPPT'] . " </b>dengan detail berikut :\n\r";
        if ($r['OLD_KD_KECAMATAN'] != $r['NEW_KD_KECAMATAN']) {
            $message .= "Kode Kecamatan Awal : " . $r['OLD_KD_KECAMATAN'] . "\n\rKode Kecamatan Baru : " . $r['NEW_KD_KECAMATAN'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_KD_KELURAHAN'] != $r['NEW_KD_KELURAHAN']) {
            $message .= "Kode Kelurahan Awal : " . $r['OLD_KD_KELURAHAN'] . "\n\rKode Kelurahan Baru : " . $r['NEW_KD_KELURAHAN'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_KD_BLOK'] != $r['NEW_KD_BLOK']) {
            $message .= "Kode Blok Awal : " . $r['OLD_KD_BLOK'] . "\n\rKode Blok Baru : " . $r['NEW_KD_BLOK'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_NO_URUT'] != $r['NEW_NO_URUT']) {
            $message .= "No Urut Awal : " . $r['NEW_NO_URUT'] . "\n\rNo. Urut Baru : " . $r['NEW_NO_URUT'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_KD_JNS_OP'] != $r['NEW_KD_JNS_OP']) {
            $message .= "Kode Jenis OP Awal : " . $r['OLD_KD_JNS_OP'] . "\n\rKode Jenis OP Baru : " . $r['NEW_KD_JNS_OP'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_SIKLUS_SPPT'] != $r['NEW_SIKLUS_SPPT']) {
            $message .= "Siklus SPPT Awal : " . $r['OLD_SIKLUS_SPPT'] . "\n\rSiklus SPPT Baru : " . $r['NEW_SIKLUS_SPPT'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_NM_WP_SPPT'] != $r['NEW_NM_WP_SPPT']) {
            $message .= "Nama WP Awal : " . $r['OLD_NM_WP_SPPT'] . "\n\rNama WP Baru : " . $r['NEW_NM_WP_SPPT'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_LUAS_BUMI_SPPT'] != $r['NEW_LUAS_BUMI_SPPT']) {
            $message .= "Luas Bumi Awal : " . number_format($r['OLD_LUAS_BUMI_SPPT'], 0) . "\n\rLuas Bumi Baru : " . number_format($r['NEW_LUAS_BUMI_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }

        if ($r['OLD_KD_KLS_TANAH'] != $r['NEW_KD_KLS_TANAH']) {
            $message .= "Kode Kelas Tanah Awal : " . number_format($r['OLD_KD_KLS_TANAH'], 0) . "\n\rKode Kelas Tanah Baru : " . number_format($r['NEW_KD_KLS_TANAH'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_THN_AWAL_KLS_TANAH'] != $r['NEW_THN_AWAL_KLS_TANAH']) {
            $message .= "Tahun Awal Kelas Tanah Awal : " . $r['OLD_THN_AWAL_KLS_TANAH'] . "\n\rTahun Awal Kelas Tanah Baru : " . $r['NEW_THN_AWAL_KLS_TANAH'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_NJOP_BUMI_SPPT'] != $r['NEW_NJOP_BUMI_SPPT']) {
            $message .= "NJOP Bumi SPPT Awal : " . number_format($r['OLD_NJOP_BUMI_SPPT'], 0) . "\n\rNJOP Bumi SPPT Baru : " . number_format($r['NEW_NJOP_BUMI_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_LUAS_BNG_SPPT'] != $r['NEW_LUAS_BNG_SPPT']) {
            $message .= "Luas Bangunan Awal : " . number_format($r['OLD_LUAS_BNG_SPPT'], 0) . "\n\rLuas Bangunan Baru : " . number_format($r['NEW_LUAS_BNG_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_KD_KLS_BNG'] != $r['NEW_KD_KLS_BNG']) {
            $message .= "Kode Kelas Bangunan Awal : " . number_format($r['OLD_KD_KLS_BNG'], 0) . "\n\rKode Kelas Bangunan Baru : " . number_format($r['NEW_KD_KLS_BNG'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_THN_AWAL_KLS_BNG'] != $r['NEW_THN_AWAL_KLS_BNG']) {
            $message .= "Tahun Awal Kelas Bangunan Awal : " . $r['OLD_THN_AWAL_KLS_BNG'] . "\n\rTahun Awal Kelas Bangunan Baru : " . $r['NEW_THN_AWAL_KLS_BNG'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_NJOP_BNG_SPPT'] != $r['NEW_NJOP_BNG_SPPT']) {
            $message .= "NJOP Bangunan SPPT Awal : " . number_format($r['OLD_NJOP_BNG_SPPT'], 0) . "\n\rNJOP Bangunan SPPT Baru : " . number_format($r['NEW_NJOP_BNG_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_NJOP_SPPT'] != $r['NEW_NJOP_SPPT']) {
            $message .= "NJOP SPPT Awal : " . number_format($r['OLD_NJOP_SPPT'], 0) . "\n\rNJOP SPPT Baru : " . number_format($r['NEW_NJOP_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_TARIF_SPPT'] != $r['NEW_TARIF_SPPT']) {
            $message .= "Tarif SPPT Awal : " . $r['OLD_TARIF_SPPT'] . "\n\rTarif SPPT Baru : " . $r['NEW_TARIF_SPPT'] . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_PBB_TERHUTANG_SPPT'] != $r['NEW_PBB_TERHUTANG_SPPT']) {
            $message .= "PBB Terhutang SPPT Awal : " . number_format($r['OLD_PBB_TERHUTANG_SPPT'], 0) . "\n\rPBB Terhutang SPPT Baru : " . number_format($r['NEW_PBB_TERHUTANG_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_FAKTOR_PENGURANG_SPPT'] != $r['NEW_FAKTOR_PENGURANG_SPPT']) {
            $message .= "Faktor Pengurang SPPT Awal : " . number_format($r['OLD_FAKTOR_PENGURANG_SPPT'], 0) . "\n\rFaktor Pengurang SPPT Baru : " . number_format($r['NEW_FAKTOR_PENGURANG_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }
        if ($r['OLD_PBB_YG_HRS_DIBAYAR_SPPT'] != $r['NEW_PBB_YG_HRS_DIBAYAR_SPPT']) {
            $message .= "PBB Yang Harus di Bayar Awal : " . number_format($r['OLD_PBB_YG_HRS_DIBAYAR_SPPT'], 0) . "\n\rPBB Yang Harus di Bayar Baru : " . number_format($r['NEW_PBB_YG_HRS_DIBAYAR_SPPT'], 0) . "\n\r";
            $perubahan = 1;
        }

        if ($perubahan == 1) {
            echo $message;
            file_get_contents("https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=-706420002&text=" . urlencode($message) . "&parse_mode=html");
            file_get_contents("https://api.telegram.org/bot" . $token_bottelegram . "/sendMessage?chat_id=-506914504&text=" . urlencode($message) . "&parse_mode=html");
        }
    } else {
        $query3 = "UPDATE IPROTAXPBB.NOTIFIKASI_EPADI SET STATUS = 1 WHERE OLD_KD_PROPINSI IS NULL";
        echo $query3;
        $stid3 = oci_parse($link_pbb, $query3);
        oci_execute($stid3);
    }

    $query2 = "UPDATE IPROTAXPBB.NOTIFIKASI_EPADI SET STATUS = 1 WHERE HIST_ID = " . $r['HIST_ID'];
    echo $query2;
    $stid2 = oci_parse($link_pbb, $query2);
    oci_execute($stid2);
}
