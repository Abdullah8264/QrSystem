<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qr_application";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Truncate the table
$sql = "TRUNCATE TABLE tbl_sample";
if (mysqli_query($conn, $sql)) {
    header("Location: table.php");
} else {
  echo "Error truncating table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>