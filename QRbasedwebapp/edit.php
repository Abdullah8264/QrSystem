<?php  
	$connect = mysqli_connect("localhost", "root", "", "qr_application");
	$steps = $_POST["steps"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE tbl_sample SET ".$column_name."='".$text."' WHERE steps='".$steps."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>