<?php
include '../php/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Update status to 'deleted' instead of deleting the record
    $sql = "UPDATE resources SET status = 'deleted' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Deleted";
    } else {
        echo "Failed";
    }

    $stmt->close();
}

$conn->close();
?>
