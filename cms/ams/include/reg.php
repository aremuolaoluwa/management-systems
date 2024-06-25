<?php
// db conn
include ('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $student_id = filter_var($_POST['reg_number'], FILTER_SANITIZE_STRING);
    $class = filter_var($_POST['class'], FILTER_SANITIZE_STRING);
    $dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING); // Assuming dob is in a string format like 'YYYY-MM-DD'
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING); // Assuming phone is stored as a string

    // Prepare SQL statement to insert data into the students table
    $sql = "INSERT INTO students (first_name, last_name, reg_number, class, dob, phone) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $first_name, $last_name, $student_id, $class, $dob, $phone);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='../std_reg.php';</script>";
    } else {
        // Log errors instead of displaying them directly
        error_log("Error: " . $sql . "\n" . $conn->error);
        echo "<script>alert('Registration failed! Please try again later'); window.location.href='../std_reg.php';</script>";
    }
    
    $stmt->close();
    $conn->close();
}

