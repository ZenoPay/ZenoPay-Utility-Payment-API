<?php
$url = 'https://zenoapi.com/api/payments/utilitypayment/process/';
$headers = [
    'Content-Type: application/json',
    'x-api-key: YOUR_API_KEY'
];
$data = [
    "transid" => "ASAJCJ77JJXdSTVM0",
    "utilitycode" => "TOP",
    "utilityref" => "0744963858",
    "amount" => 500,
    "pin" => "2025",
    "msisdn" => "0744963858"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

echo $response;
