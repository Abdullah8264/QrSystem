<?php 
session_start();
if(isset($_SESSION['username'])&& isset($_SESSION['ID']))
{     ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Welcome </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
            <?php if($_SESSION['role']== 'admin'){ ?>
                  <!--For QC work order creator-->
                 
                <?php header("Location: ../table.php"); ?>   
            <?php } ?>      	
      </div>

      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
            <?php if($_SESSION['role']== 'user'){ ?>
                  <!--For QC viewer-->
                 
                <?php header("Location: ../viewerhome.php"); ?>   
            <?php } ?>      	
      </div>
     
</body>
</html>
<?php } else{
      header("Location: index.php");
}?>
 