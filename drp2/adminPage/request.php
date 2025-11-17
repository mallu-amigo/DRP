<?php
include '../php/db_connect.php';

$sql = "SELECT id, title, description, location_input, datetime, urgency, user_name, user_contact FROM resources WHERE status != 'deleted' ORDER BY datetime DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .table-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #B91C1C;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #DC2626;
            color: white;
        }
        button {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        button:hover {
            background: darkred;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h2>Resource Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Date & Time</th>
                    <th>Urgency</th>
                    <th>Requester Name</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='row-{$row['id']}'>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td>{$row['location_input']}</td>";
                        echo "<td>{$row['datetime']}</td>";
                        echo "<td>{$row['urgency']}</td>";
                        echo "<td>{$row['user_name']}</td>";
                        echo "<td>{$row['user_contact']}</td>";
                        echo "<td><button onclick='deleteRequest({$row['id']})'>Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No requests found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteRequest(id) {
            if (confirm("Are you sure you want to remove this request?")) {
                fetch("delete_request.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: "id=" + id
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data.trim() === "Deleted") {
                            document.getElementById("row-" + id).style.display = "none";
                        } else {
                            alert("Failed to delete.");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            }
        }
    </script>
</body>
</html>