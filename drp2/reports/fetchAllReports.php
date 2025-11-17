<?php

require '../php/db_connect.php';

$sql = "SELECT * FROM disaster_reports WHERE status != 'deleted' ORDER BY id DESC ";

$result = $conn->query($sql);

$disasters = array();

while($row=$result->fetch_assoc()){
    $disasters[] = $row;
}

echo json_encode($disasters);