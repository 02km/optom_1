<?php
// process_register.php

// Database connection details
$servername = "localhost";
$username = "tolksdorf";
$password = "tolks2024";
$dbname = "tolksdorf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate input
$firstname = filter_var($_POST['register-firstname'], FILTER_SANITIZE_STRING);
$surname = filter_var($_POST['register-lastname'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['register-email'], FILTER_VALIDATE_EMAIL);
$password = $_POST['register-password'];
$confirm_password = $_POST['register-confirm-password'];

// Validate email
if (!$email) {
    echo "Invalid email format.";
    exit();
}

// Validate password match
if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit();
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into database
$sql = "INSERT INTO users (firstname, surname, email, password) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $firstname, $surname, $email, $hashed_password);

if ($stmt->execute()) {
header("Location: homepage.html.php");
} else {
    echo "Registration failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
