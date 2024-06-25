<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Enrolled Students</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div class="table-wrap">
        <h2>Enrolled Students</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Registration Number</th>
                    <th>Class</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include './include/db.php';

                // fetch enrolled students data from the database
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['reg_number'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No students found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer-nav-bar">
        <a href="index.php">Home |</a>
        <a href="enrolled_std.php">Enrolled Students |</a>
        <a href="mark_attendance.php">Mark Attendance |</a>
        <a href="download_att.php">Download Attendance</a>
    </footer>
</body>
</html>