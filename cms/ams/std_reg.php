<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students Registration</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div class="form-wrap">
        <div class="form-items"></div>
            <h2 class="form-title">Students Registration</h2>
            <form action="./include/reg.php" method="post">
                <div class="form-row">
                    <div class="item">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="item">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="item">
                        <label for="reg_number">Registration Number</label>
                        <input type="text" id="reg_number" name="reg_number" required>
                    </div>
                    <div class="item">
                        <label for="class">Class</label>
                        <select id="class" name="class" required>
                            <option value="JSS1">JSS1</option>
                            <option value="JSS2">JSS2</option>
                            <option value="JSS3">JSS3</option>
                            <option value="SS1">SS1</option>
                            <option value="SS2">SS2</option>
                            <option value="SS3">SS3</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="item">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    <div class="item">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="button-container">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    <footer class="footer-nav-bar">
        <a href="index.php">Home |</a>
        <a href="enrolled_std.php">Enrolled Students |</a>
        <a href="mark_attendance.php">Mark Attendance |</a>
        <a href="download_att.php">Download Attendance</a>
    </footer>
</body>
</html>
