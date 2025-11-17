<?php

session_start();

require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]); // Trim spaces


    //checking if the user is registered or not

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare(($sql));
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "invalid email";
        exit;
    }


    //checking if the password is correct or not

    $row = $result->fetch_assoc();
    $hash = $row['password'];

    if (password_verify($password, $hash)) {
        
        $user_details = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($user_details);
        $row = $result->fetch_assoc();

        $_SESSION['userName'] = $row['name'];

        echo "success";

    } else {
        echo "invalid password";
    }
}
