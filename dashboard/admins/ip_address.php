<?php
// // Mendapatkan IP pengunjung menggunakan getenv()
// function get_client_ip() {
//     $ipaddress = '';
//     if (getenv('HTTP_CLIENT_IP'))
//         $ipaddress = getenv('HTTP_CLIENT_IP');
//     else if(getenv('HTTP_X_FORWARDED_FOR'))
//         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
//     else if(getenv('HTTP_X_FORWARDED'))
//         $ipaddress = getenv('HTTP_X_FORWARDED');
//     else if(getenv('HTTP_FORWARDED_FOR'))
//         $ipaddress = getenv('HTTP_FORWARDED_FOR');
//     else if(getenv('HTTP_FORWARDED'))
//        $ipaddress = getenv('HTTP_FORWARDED');
//     else if(getenv('REMOTE_ADDR'))
//         $ipaddress = getenv('REMOTE_ADDR');
//     else
//         $ipaddress = 'IP tidak dikenali';
//     return $ipaddress;
// }

// echo "IP Address: " . get_client_ip() . "<br>";
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
// function get_client_ip_2() {
//     $ipaddress = '';
//     if (isset($_SERVER['HTTP_CLIENT_IP']))
//         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//     else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     else if(isset($_SERVER['HTTP_X_FORWARDED']))
//         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//     else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
//         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//     else if(isset($_SERVER['HTTP_FORWARDED']))
//         $ipaddress = $_SERVER['HTTP_FORWARDED'];
//     else if(isset($_SERVER['REMOTE_ADDR']))
//         $ipaddress = $_SERVER['REMOTE_ADDR'];
//     else
//         $ipaddress = 'IP tidak dikenali';
//     return $ipaddress;
// }


  
// Mendapatkan jenis web browser pengunjung
// function get_client_browser() {
//     $browser = '';
//     if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
//         $browser = 'Netscape';
//     else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
//         $browser = 'Firefox';
//     else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
//         $browser = 'Chrome';
//     else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
//         $browser = 'Opera';
//     else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
//         $browser = 'Internet Explorer';
//     else
//         $browser = 'Other';
//     return $browser;
// }

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$ip = getUserIP();
echo "IP Anda adalah: $ip<br>";

// Dapatkan info lokasi
$ipInfo = json_decode(file_get_contents("http://ip-api.com/json/$ip"));

if ($ipInfo && $ipInfo->status == 'success') {
    echo "Negara: " . $ipInfo->country . "<br>";
    echo "Kota: " . $ipInfo->city . "<br>";
    echo "ISP: " . $ipInfo->isp . "<br>";
    echo "Koordinat: " . $ipInfo->lat . ", " . $ipInfo->lon . "<br>";
} else {
    echo "Gagal mendapatkan informasi lokasi.";
}
?>