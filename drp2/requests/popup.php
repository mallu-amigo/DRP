<?php

require '../php/db_connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql ="SELECT * FROM resources WHERE id = '$id'";
    $result = $conn->query($sql);
    $report = $result->fetch_assoc();

    echo json_encode($report);
} else {
    echo json_encode(['error' => 'Invalid id']);
}