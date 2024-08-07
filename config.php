<?php
$servername = "localhost";
$username = "tolksdorf";
$password = "tolks2024";
$dbname = "tolksdorf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
?>
<?php
