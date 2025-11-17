<?php

header('Content-Type: application/json'); // Ensures response is JSON

$conn = new mysqli('localhost', 'root', '', 'drp');

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'] ?? "";
    $description = $_POST['description'] ?? "";
    $location = $_POST['location'] ?? "";
    $datetime = $_POST['datetime'] ?? "";
    $urgency = $_POST['urgency'] ?? "";
    $username = $_POST['username'] ?? "";
    $contact = $_POST['contact'] ?? "";
    $filePath = "";

    // Handling file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $uploadDir = "../uploads/";
        $filename = basename($_FILES['file']['name']);
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $filePath = $uploadDir . $filename;

        if (!move_uploaded_file($fileTmpPath, $filePath)) {
            error_log("File upload failed: " . print_r($_FILES, true));
            echo json_encode(["status" => "error", "message" => "File upload failed"]);
            exit;
        }
    }

    // Insert into database
    $sql = "INSERT INTO resources (title, description, location_input, datetime, urgency, user_name, user_contact, file) 
            VALUES ('$title', '$description', '$location', '$datetime', '$urgency', '$username', '$contact', '$filePath')";

    if ($conn->query($sql) === TRUE) {
        // Fetch all volunteer emails
        $volunteerQuery = "SELECT email FROM volunteers";
        $result = $conn->query($volunteerQuery);

        if ($result->num_rows > 0) {
            $subject = "New Resource Request!";
            $message = "A new resource request has been made:\n\n";
            $message .= "Title: $title\n";
            $message .= "Location: $location\n";
            $message .= "Urgency: $urgency\n";
            $message .= "Description: $description\n";
            $message .= "Requested by: $username ($contact)\n\n";
            $message .= "Please take necessary actions.";

            $headers = "From: drp@gmail.com"; // Change to your sender email

            // Send email to all volunteers
            while ($row = $result->fetch_assoc()) {
                mail($row['email'], $subject, $message, $headers);
            }
        }

        echo json_encode(["status" => "success", "message" => "New record created successfully, emails sent"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }
}
$conn->close();
