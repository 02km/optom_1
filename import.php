<?php
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

// Path to your CSV file
$csvFile = 'C:\Users\mokak\OneDrive - Eduvos\Desktop\products optom v1 csv.csv';

// Open the file for reading
if (($handle = fopen($csvFile, 'r')) !== FALSE) {
    // Get the first row, which contains the column names
    $header = fgetcsv($handle, 1000, ",");

    // Loop through the file line-by-line
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Prepare an SQL statement for execution
        $sql = "INSERT INTO products (images_url, name, brand, group_name, selling_price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ssssd", $data[0], $data[1], $data[2], $data[3], $data[4]);

        // Execute the statement
        $stmt->execute();
    }

    // Close the file
    fclose($handle);

    echo "Data imported successfully.";
} else {
    echo "Error opening the file.";
}

// Close the database connection
$conn->close();
?>
<?php
