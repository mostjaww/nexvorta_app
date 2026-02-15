<?php
include_once('config.php');
$path = "https://api.telegram.org/bot" . $token_bottelegram . '/';
$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];
$chatName = $update["message"]["chat"]["first_name"] . " " . $update["message"]["chat"]["last_name"];
$message = $update["message"]["text"];
$perintah = explode("#", $message);
switch (true) {
    case strpos($perintah[0], "/start") === 0:
        $reply_utf8 = "Hallo $chatName \nSelamat Datang di Chat Bot aplikasi " . $title . " Kabupaten Deli Serdang. \nID Telegram Anda adalah " . $chatId;
        //  $reply_utf82 = "Nama $chatName memiliki ID : $chatId, mohon di daftarkan!";
        break;
    case strpos($perintah[0], "/showid") === 0:
        $reply_utf8 = "Hallo $chatName \nID Telegram Anda adalah: $chatId";
        //$reply_utf82 = "Nama $chatName memiliki ID : $chatId, mohon di daftarkan!";
        break;
    default:
        $reply_utf8 = "Halo $chatName \nPerintah tersebut tidak dikenali! \nCoba : /help";
}
//END Switch
//$fullurl = $path . "/sendmessage?chat_id=" . $chatId . "&text=" . urlencode($reply_utf8)."&parse_mode=html";
//echo $fullurl;
file_get_contents($path . "/sendmessage?chat_id=" . $chatId . "&text=" . urlencode($reply_utf8) . "&parse_mode=html");
// file_get_contents($path . "/sendmessage?chat_id=-1001676401899&text=" . urlencode($reply_utf82) . "&parse_mode=html");
