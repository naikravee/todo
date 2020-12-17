<?php

	// start the session session_start();
	session_start();
	
	// include the database connection file
	include('dbcon.php');
	
	// if user already logged in redirect to home page
	if($_SESSION['userid'])
	{
		header('location:index.php');
	}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<!-- Fontawsome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
    <title>To Do List</title>
  </head>
  <body>
    
	<div class="container-fluid">
	
		<div class="header">
			<h1>Welcome to Php Mini Project-To Do List</h1>
		</div>
		<div class="content">
			<form method="post" action="registration.php">
		
		<div class="card shadow-lg login">
			<div class="card-body">
			<div class="row">
				<div class="col">
					<label for="username" class="col">Username:</label>
				</div>
				<div class="col">
					<input type="text" class="input-group" name="username" value="" required>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="password" class="col">Password:</label>
				</div>
				<div class="col">
					<input type="password" class="input-group" name="password" value="" required>
				</div>
			</div>
				<button class="btn btn-info mt-2" name="register">Register</button>
				<h6>Already registered ? <a href="login.php">Login Here</a></h6>
			</div>
		</div>
		</form>	
		</div>
		
	</div>
	<?php
	
	// if user clicks register button, check if user already exists.
	if(isset($_POST['register']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
			
		$query = " SELECT * FROM user WHERE username = '$username' ";
		$run = mysqli_query($con, $query);
			
		// if user already exists, warning message will be displayed
		if(mysqli_num_rows($run) >= 1)
		{
		?>
			<script type="text/JavaScript">
				alert("User already exists!");
				window.open('registration.php','_self');
			</script>
			<?php
		}
		
		// if user doesnot exists, new user will be created.
		else
		{
		$query = " INSERT INTO user (username, password) VALUES ('$username','$password') ";
		$run = mysqli_query($con, $query);
			
			if($run == true)
			{
			?>
				<script type="text/JavaScript">
					alert("User registered successfully!");
					window.open('login.php','_self');
				</script>
			<?php
			}
			else
			{
				echo "Error";
			}
		}
	}
	
	?>
	

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>