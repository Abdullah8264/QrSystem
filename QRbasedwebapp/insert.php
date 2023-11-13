<?php  
$connect = mysqli_connect("localhost", "root", "", "qr_application");
$sql = "INSERT INTO tbl_sample(Mixing_Phase,Actions, Material_name,Material_Weight,Rotator_1,Rotator_2,Mixing_time,Pressure) VALUES('".$_POST["Mixing_Phase"]."','".$_POST["Actions"]."', '".$_POST["Material_name"]."','".$_POST["Material_Weight"]."','".$_POST["Rotator_1"]."','".$_POST["Rotator_2"]."','".$_POST["Mixing_time"]."','".$_POST["Pressure"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>