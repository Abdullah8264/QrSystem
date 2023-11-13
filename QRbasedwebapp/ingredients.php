<?php

// Start a session
session_start();

// Include the Composer autoload file
require __DIR__ . "/vendor/autoload.php";

// Check if the form was submitted
if(isset($_POST["submit"])) {

  // Check if a file was selected
  if(empty($_FILES["fileToUpload"]["name"])) {
    echo "No file selected.";
    $uploadOk = 0;
  } else if(isset($_FILES["fileToUpload"])) {

    $target_dir = "qr/";
    $file_name = time() . '_' . basename($_FILES["fileToUpload"]["name"]); // append timestamp to file name
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check === false) {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        // Decode the QR code using Zxing
        $qrcode = new \Zxing\QrReader($target_file);
        $text = $qrcode->text();

        // Assign the output to a variable
        $output = "QR code contents: " . $text;

        // Store the output in a session variable
        $_SESSION["output"] = $output;

      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }
} 

// Check if the output exists in the session
if(isset($_SESSION["output"])) {
  $output = $_SESSION["output"];
}

// Display the form and the output (if it exists)
?>
<!DOCTYPE html>
<html>
<head>
  
	<title>Batch</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="qroutput.css">

</head>
<body>
	<!-- Navigation menu -->
	<nav class="navbar">
		<a href="oper_control.php" >OPERATOR CONTROL</a>
		<a href="mixer_interface.php">MIXER INTERFACE</a>
		<a href="ingredients.php">INGREDIENTS</a>
		<a href="other_operations.php">OTHER OPERATIONS</a>
		<a href="alarms.php">ALARMS</a>
	</nav>

	<div class="container">
		<h1>BATCH</h1>
		<?php if(isset($output)): ?>
		<div class="output">
			<div class="output-text" style="color: rgb(72, 72, 72);"><?php echo $output; ?></div>
		</div>
    <?php endif; ?>
	
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="form-group rounded">
            <label for="fileToUpload">Upload Qr code:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" name="submit">Scan</button>
        </div>
        
    </form>
</div>

	<script>
		function validateForm() {
			var fileInput = document.getElementById("fileToUpload");
			var filePath = fileInput.value;
			if (filePath == "") {
				alert("Please select a file to upload.");
				return false;
			}
			return true;
		}
	</script>
</body>
</html>

