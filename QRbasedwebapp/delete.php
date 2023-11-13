<?php  
	$connect = mysqli_connect("localhost", "root", "", "qr_application");
	$sql = "DELETE FROM tbl_sample WHERE steps='".$_POST["steps"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>