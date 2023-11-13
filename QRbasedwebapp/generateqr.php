<?php
require_once "phpqrcode/qrlib.php"; // Include the QR Code library

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qr_application";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database table
$sql = "SELECT * FROM tbl_sample";
$result = $conn->query($sql);

// Output the table data as an HTML table
echo "<table>";
if ($result->num_rows > 0) {
  // Output the table header row
  echo "<tr>";
  while ($field = $result->fetch_field()) {
    echo "<th>" . ucfirst($field->name) . "</th>";
  }
  echo "</tr>";
  
  // Output each row of the table
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "</tr>";
    
    // Write the row to a text file
    $file = fopen("table.txt", "a");
    fwrite($file, implode(",", $row) . "\n");
    fclose($file);
  }
} else {
  // Output if table is empty
  echo "<tr><td colspan='" . $result->field_count . "'>No data found in table</td></tr>";
}
echo "</table>";

// Generate QR code image from the table data and save to directory
$directory = "qr/"; // Directory path
$filename = "image.png"; // Filename
// Generate a unique filename
$filename = "image_" . time() . ".png";

// Save the QR code image to the directory with the unique filename
QRcode::png(ob_get_clean(), $directory . $filename);

// Output the QR code image
echo '<img src="' . $directory . $filename . '">';

