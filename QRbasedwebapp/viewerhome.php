<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Viewer Table</title>
  <link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
<div>
 <a href="logout.php" class="btns brn-dark">Logout</a>
 </div>
  <?php
  
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "qr_application");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the table
    $sql = "SELECT * FROM tbl_sample";
    $result = mysqli_query($conn, $sql);

    // Check if any data exists in the table
    if (mysqli_num_rows($result) > 0) {
      // Start creating the table
      echo "<table>";
      echo "<thead>";
      echo "<tr><th>Mixing Phase</th><th>Steps</th><th>Actions</th><th>Material Name</th><th>Material Weight</th><th>Rotator 1</th><th>Rotator 2</th><th>Mixing Time</th><th>Pressure</th></tr>";
      echo "</thead>";
      echo "<tbody>";

      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["Mixing_Phase"] . "</td>";
        echo "<td>" . $row["steps"] . "</td>";
        echo "<td>" . $row["Actions"] . "</td>";
        echo "<td>" . $row["Material_name"] . "</td>";
        echo "<td>" . $row["Material_Weight"] . "</td>";
        echo "<td>" . $row["Rotator_1"] . "</td>";
        echo "<td>" . $row["Rotator_2"] . "</td>";
        echo "<td>" . $row["Mixing_time"] . "</td>";
        echo "<td>" . $row["Pressure"] . "</td>";
        echo "</tr>";
      }

      // End table
      echo "</tbody>";
      echo "</table>";
    } else {
      echo "No data found.";
    }

    // Close connection
    mysqli_close($conn);
  ?>
</body>
</html>
