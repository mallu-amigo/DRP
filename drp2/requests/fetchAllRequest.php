<?php

require '../php/db_connect.php';

$sql = "SELECT * FROM resources WHERE status IS NULL OR status != 'deleted' ORDER BY datetime DESC";

$result = $conn->query($sql);

$disasters = array();

while($row=$result->fetch_assoc()){
    $disasters[] = $row;
}

echo json_encode($disasters);