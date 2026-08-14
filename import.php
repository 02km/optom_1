<?php
ob_start();

require_once 'config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Path to your CSV file
$csvFile = 'products.csv';

$imported = 0;
$failed = 0;
$failedRows = [];

// Open the file for reading
if (($handle = fopen($csvFile, 'r')) !== FALSE) {
    // Get the first row, which contains the column names
    $header = fgetcsv($handle, 1000, ",");

    // Loop through the file line-by-line
    $rowNum = 1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rowNum++;

        // Validate selling_price is numeric
        if (!is_numeric($data[4])) {
            $failed++;
            $failedRows[] = "Row $rowNum: non-numeric selling_price";
            continue;
        }

        // Prepare an SQL statement for execution
        $sql = "INSERT INTO products (images_url, name, brand, group_name, selling_price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ssssd", $data[0], $data[1], $data[2], $data[3], $data[4]);

        // Execute the statement
        if ($stmt->execute()) {
            $imported++;
        } else {
            $failed++;
            $failedRows[] = "Row $rowNum: " . $stmt->error;
        }
        $stmt->close();
    }

    // Close the file
    fclose($handle);

    echo "Import complete. $imported rows imported successfully.";
    if ($failed > 0) {
        echo " $failed rows failed:";
        foreach ($failedRows as $msg) {
            echo "\n- $msg";
        }
    }
} else {
    echo "Error opening the file.";
}

// Close the database connection
$conn->close();
?>
<?php
