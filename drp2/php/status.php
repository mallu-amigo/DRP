<?php
header("Content-Type: application/json");

// Get transaction status from URL parameters
$txStatus = $_GET['txStatus'] ?? 'FAILED';

// Return JSON response
echo json_encode(["status" => $txStatus]);
?>
