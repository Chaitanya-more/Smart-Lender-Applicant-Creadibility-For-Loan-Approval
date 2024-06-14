<?php
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];

// Database connection parameters
$hostname = "localhost";
$username_db = "root";
$password_db = "root";
$database = "awadhut";

// Create connection
$conn = new mysqli($hostname, $username_db, $password_db, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO u_login (name, email, username, password, mobile) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $username, $password, $mobile);

    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>