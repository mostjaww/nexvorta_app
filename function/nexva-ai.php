<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$userMessage = $data['message'] ?? '';

if (!$userMessage) {
    echo json_encode(["reply" => "Pesan kosong."]);
    exit;
}

$payload = [
    "model" => "llama3",
    "prompt" => "You are Nexva, AI assistant for Nexvorta export import platform. Answer professionally.\n\nUser: " . $userMessage,
    "stream" => false
];

$ch = curl_init("http://localhost:11434/api/generate");

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => json_encode($payload)
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["reply" => "cURL Error: " . curl_error($ch)]);
    exit;
}

curl_close($ch);

$result = json_decode($response, true);

echo json_encode([
    "reply" => $result['response'] ?? "Maaf, terjadi kesalahan."
]);
