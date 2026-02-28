<?php
$data = json_decode(file_get_contents("php://input"), true);

$name = htmlspecialchars($data['name']);
$message = htmlspecialchars($data['message']);

$botToken = "7890870095:AAH-onk-Sv3eZnw7PlRz3aXxkCN1R-HREsw";
$chatId = "5183095350";

$text = "📢 New Report from Customer\n\n";
$text .= "👤 Name: $name\n";
$text .= "📝 Message: $message\n";
$text .= "🌐 Website: Nexvorta Marketplace";

$url = "https://api.telegram.org/bot" . $botToken . '/' . "sendMessage";

$params = [
    "chat_id" => $chatId,
    "text" => $text
];

$options = [
    "http" => [
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($params)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo json_encode(["status" => "success"]);
