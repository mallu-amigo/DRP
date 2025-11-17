<?php 

require '../php/db_connect.php';

$name = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$district = $_POST['district'];
$gender = $_POST['gender'];
$age = $_POST['age'];

$sql = "INSERT INTO volunteers (name, age, phone, email, district, gender, registered_at) VALUES ('$name', '$age', '$phone', '$email', '$district', '$gender', NOW())"; 

if ($conn->query($sql) === TRUE) {
    echo "Registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}