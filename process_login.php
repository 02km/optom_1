<?php
// process_login.php

ob_start();
session_start();

require_once 'config.php';

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
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: homepage.html.php");
        exit();
    } else {
        echo "Invalid email or password.";
        ob_end_flush();
        exit();
    }
} else {
    echo "Invalid email or password.";
    ob_end_flush();
    exit();
}

$stmt->close();
$conn->close();
?>
<?php
