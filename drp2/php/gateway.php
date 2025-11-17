<?php
header("Content-Type: application/json");

$inputData = json_decode(file_get_contents("php://input"), true);

if (!isset($inputData["name"], $inputData["email"], $inputData["phone"], $inputData["amount"])) {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

// Assign variables
$name = $inputData["name"];
$email = $inputData["email"];
$phone = $inputData["phone"];
$amount = $inputData["amount"];

// Cashfree API credentials
$clientId = "CF10438447D3M6AL7VQ3SC73ESL5OG";
$clientSecret = "cfsk_ma_test_73627d3cfc8b41bad9d5614704506ad2_93e9a8e0";

$orderId = "ORDER_" . time();

// Build order payload
$postData = [
    "order_id" => $orderId,
    "order_amount" => $amount,
    "order_currency" => "INR",
    "order_note" => "Donation for Disaster Relief",
    "customer_details" => [
        "customer_id" => "CUST_" . time(),
        "customer_name" => $name,
        "customer_email" => $email,
        "customer_phone" => $phone
    ],
    "order_meta" => [
        "return_url" => "http://localhost/drp2/home/home.php"
    ]
];

// Call Cashfree API
$ch = curl_init("https://sandbox.cashfree.com/pg/orders");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "x-client-id: $clientId",
    "x-client-secret: $clientSecret"
]);

$response = curl_exec($ch);
if ($response === false) {
    echo json_encode(["status" => "error", "message" => "Curl error: " . curl_error($ch)]);
    exit;
}

curl_close($ch);

// Decode response and send minimal required info to JS
$responseData = json_decode($response, true);

if (isset($responseData['status']) && $responseData['status'] === 'OK' && isset($responseData['payment_session_id'])) {
    echo json_encode([
        "status" => "success",
        "payment_session_id" => $responseData['payment_session_id']
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to create payment session",
        "raw_response" => $responseData
    ]);
}
?>
