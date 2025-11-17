<?php
include '../php/db_connect.php';

$sql = "SELECT id, title, description, location_input, datetime, urgency, file, user_name, user_contact FROM disasters WHERE is_deleted = 0 ORDER BY date DESC";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 80px 20px 20px;
        }

        /* Container for the table */
        .table-container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background: #DC2626;
            color: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-weight: bold;
        }

        /* tr:hover {
            background-color: #f1f1f1;
        } */

        /* Action button styling */
        button {
            background:rgb(255, 0, 0);
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background: #DC2626;
        }

        /* coding the header */

        #header {
            width: 100%;
            height: 65px;
            background-color: white;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0px 2px 5px 1px #ccc;
        }

        #menu_icon {
            color: #B91C1C;
            margin-right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        #project_name {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 20px;
        }

        .menu_icon {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            float: left;
        }

        .login_icon,
        .logout_icon {
            float: right;
            border: #B91C1C solid 1px;
            border-radius: 10px;
            height: 40px;
            width: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px;
            padding-top: 3px;
        }

        .logout_icon {
            float: right;
            border: #B91C1C solid 1px;
            border-radius: 10px;
            height: 40px;
            width: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-right: 10px;
            padding-top: 3px;
            position: absolute;
            top: 10px;
            right: 10px;
            display: none;
        }

        .login_icon:hover,
        .logout_icon:hover {
            background-color: #ffefef;
            color: white;
            transition: .2s;
        }



        #user_icon {
            color: #B91C1C;
            font-size: 15px;
            margin-right: 5px;
        }

        .login_icon h2,
        .logout_icon h2 {
            color: #B91C1C;
            text-align: center;
            font-size: 17px;
            font-family: sans-serif;
            font-weight: 100;
        }

        #buttons {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #report,
        #request {
            margin: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #DC2626;
            color: white;
            font-size: 20px;
            cursor: pointer;
            width: 150px;
            margin-left: 30px;
        }

        #report:hover,
        #request:hover {
            background-color: #B91C1C;
            transition: .2s;
        }
    </style>

</head>

<body>


    <div class="table-container">
        <h2>Reported Disasters</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Date & Time</th>
                    <th>Urgency</th>
                    <th>Attachment</th>
                    <th>Reporter Name</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../php/db_connect.php';
                $sql = "SELECT id, title, description, location_input, datetime, urgency, file, user_name, user_contact 
                FROM disaster_reports 
                WHERE status = 'active' 
                ORDER BY datetime DESC";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr id='row-{$row['id']}'>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td>{$row['location_input']}</td>";
                        echo "<td>{$row['datetime']}</td>";
                        echo "<td>{$row['urgency']}</td>";

                        // Handling file (image/video/pdf)
                        if (!empty($row['file'])) {
                            $file_ext = pathinfo($row['file'], PATHINFO_EXTENSION);
                            if (in_array(strtolower($file_ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo "<td><img src='../uploads/{$row['file']}' width='50' height='50' alt='Attachment'></td>";
                            } elseif (in_array(strtolower($file_ext), ['mp4', 'avi', 'mov'])) {
                                echo "<td><video width='50' height='50' controls><source src='../uploads/{$row['file']}' type='video/mp4'></video></td>";
                            } else {
                                echo "<td><a href='../uploads/{$row['file']}' target='_blank'>View File</a></td>";
                            }
                        } else {
                            echo "<td>No File</td>";
                        }

                        echo "<td>{$row['user_name']}</td>";
                        echo "<td>{$row['user_contact']}</td>";
                        echo "<td><button onclick='deleteReport({$row['id']})' >Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No reports found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    </div>

    <script>
        function deleteReport(id) {
            if (confirm("Are you sure you want to delete this report?")) {
                fetch("../adminPage/delete_report.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: "id=" + id
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data.trim() === "Deleted") {
                            document.getElementById("row-" + id).remove(); // Remove row from frontend
                        } else {
                            alert("Failed to delete.");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            }
        }
    </script>
</body>