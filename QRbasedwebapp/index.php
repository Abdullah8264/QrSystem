<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['ID'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>QC Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style>
    body {
		background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
  </style>
</head>
<body>
<div style="position: absolute; top: 10%; left: 20%; transform: translate(-50%, -50%);">
    <h1 style="color: white;">QC LOGIN</h1>
	<hr style="border: 2px solid #fff; width: 600%;">
</div>

      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh" >
	  
      	<form class=" p-3 rounded"
      	      action="php/check-login.php" 
      	      method="post" 
      	      style="width: 450px; background-color: #494848;">
				<h1 class="text-center p-3 fw-bold mb-2 text-uppercase" style="color: white;">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label" style="color: white; font-family: Times New Roman;" >User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label" style="color: white;font-family: Times New Roman;">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label" style="color: white;font-family: Times New Roman;">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  
			  <option selected value="admin">QC Work order creator</option>
			  <option  value="user">QC viewer</option>
		  </select>
		 
		  <button type="submit" 
        	class="btn btn-primary" 
        	style="font-family: 'Times New Roman', Times, serif;">LOGIN</button>

		</form>
      </div>
</body>
</html>
<?php }else{
	header("Location: home.php");
} ?>