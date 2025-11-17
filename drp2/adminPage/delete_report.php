<?php
include '../php/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);  // Ensure ID is an integer

    $sql = "UPDATE disaster_reports SET status = 'deleted' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Deleted"; // Send success message back to JS
    } else {
        echo "Failed";
    }

    $stmt->close();
    $conn->close();
}
?>
