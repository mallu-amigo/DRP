<?php
require 'db_connect.php';

// Get today's date (format: YYYY-MM-DD)
$today = date("Y-m-d");

// SQL: Fetch the most recently inserted alert for today's date
$sql = "SELECT alert_type, districts, alert_date 
        FROM alerts 
        WHERE DATE(scraped_at) = ? 
        ORDER BY scraped_at DESC 
        LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Count how many districts in this alert
    $districtCount = count(explode(",", $row['districts']));
    $row['district_count'] = $districtCount;

    // Return only the latest alert as JSON
    echo json_encode($row);
} else {
    // No alerts for today
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
