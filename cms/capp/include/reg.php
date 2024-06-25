<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $role = htmlspecialchars($_POST["role"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Validate input data
    if (empty($firstname) || empty($lastname) || empty($role) || empty($gender) || empty($username) || empty($password)) {
        echo "Error: All fields are required.";
    } else {
        // Check if username already exists
        $check_username_query = "SELECT * FROM registrations WHERE username=?";
        $stmt = $conn->prepare($check_username_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Error: Username already exists.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $insert_query = "INSERT INTO registrations (firstname, lastname, role, gender, username, password)
                             VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ssssss", $firstname, $lastname, $role, $gender, $username, $hashed_password);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful! Please sign in to proceed to your dashboard'); window.location.href='../index.php';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
    $stmt->close();
    $conn->close();
}