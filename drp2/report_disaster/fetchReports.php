<?php

require '../php/db_connect.php';

header('Content-Type: application/json');  // Ensure JSON response

$sql = "SELECT title, location_input, datetime, description, urgency, user_name, user_contact, file 
        FROM disaster_reports 
        WHERE status != 'deleted' 
        ORDER BY id DESC 
        LIMIT 2";

$result = $conn->query($sql);

$reports = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
}

echo json_encode($reports);

$conn->close();
