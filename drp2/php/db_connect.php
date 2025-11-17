<?php

$conn = new mysqli('localhost', 'root', '','drp');

if($conn->connect_error){
    die("connection failed:" . $conn->connect_error);
}