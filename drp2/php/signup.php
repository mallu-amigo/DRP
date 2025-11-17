<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    header('Content-Type: application/x-www-form-urlencoded');

    $name = trim($_POST['name']);
    $email = trim($_POST["email"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);

    // Checking if the user already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "exists";
        exit;
    }

    // Inserting into the database
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "success";
    } else {
        http_response_code(500); // Set HTTP error code
        echo "error";
    }
}
