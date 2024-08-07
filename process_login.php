<?php
// process_login.php

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

// Get user input and sanitize it
$email = filter_var($_POST['login-email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['login-password'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User found, validate password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password is correct, log the user in
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location:  homepage.html.php"); // Redirect to dashboard or home page
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that email.";
}

$stmt->close();
$conn->close();
?>
