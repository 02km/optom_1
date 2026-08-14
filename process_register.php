<?php
ob_start();
session_start();

require_once 'config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate input
$firstname = isset($_POST['register-firstname']) ? trim(htmlspecialchars($_POST['register-firstname'], ENT_QUOTES, 'UTF-8')) : '';
$surname = isset($_POST['register-lastname']) ? trim(htmlspecialchars($_POST['register-lastname'], ENT_QUOTES, 'UTF-8')) : '';
$email = filter_var($_POST['register-email'], FILTER_VALIDATE_EMAIL);
$password = $_POST['register-password'];
$confirm_password = $_POST['register-confirm-password'];

// Validate name fields are not empty after sanitization
if (empty($firstname) || empty($surname)) {
    echo "Name and surname are required.";
    exit();
}

// Validate name length
if (strlen($firstname) > 100 || strlen($surname) > 100) {
    echo "Name or surname is too long.";
    exit();
}

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
    exit();
} else {
    echo "Registration failed. Please try again later.";
    // In production, log $stmt->error instead of exposing it
}

$stmt->close();
$conn->close();
?>
<?php
