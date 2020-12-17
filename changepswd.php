<?php

	// start the session session_start();
	session_start();
	
	// include the database connection file
	include('dbcon.php');
	
	// if user already logged in redirect to home page and if not restrict user from going back to home page.
	if($_SESSION['userid'])
	{
		echo "";
	}
	else
	{
		header('location:login.php');
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
		<a class="btn btn-secondary mt-3" href="index.php" style="float:left;">Back</a>
			<h1>Welcome to Php Mini Project-To Do List</h1>
		</div>
		<div class="content">
			<form method="post" action="changepswd.php">
		
			<div class="card shadow-lg login">
			<div class="card-body">
			<div class="row">
			
				<div class="col">
					<label for="password_1" class="col">Enter New password:</label>
				</div>
				<div class="col">
					<input type="password" class="input-group" name="password_1" value="">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="password_2" class="col">Confirm New password:</label>
				</div>
				<div class="col">
					<input type="password" class="input-group" name="password_2" value="">
				</div>
			</div>	
			<button class="btn btn-info mt-2" name="change">Change</button>
			</div>
			</div>
		</form>	
		</div>
		
	</div>
	
	<?php

	
	// if user clicks on change password,
	if(isset($_POST['change']))
	{
			
	// define variables for particular user's id $ new passwords
	$id = $_SESSION['userid'];
	$pswd1 = $_POST['password_1'];
	$pswd2 = $_POST['password_2'];
	
		// new password & confirm password enetered will be checked.
		if($pswd1 == $pswd2)
		{
			// query to update the new password entered.
			$query = " UPDATE user SET password = '$pswd2' WHERE id = '$id' ";
			$run = mysqli_query($con, $query);
			
			// if password changed user gets an alert.
			if($run == true)
			{
			?>
			<script type="text/JavaScript">
				alert("Password changed successfully!");
				window.open('index.php','_self'); // redirect to home page.
			</script>
			<?php
			}
		}
		else // if password does not match an alert will be given saying password doe not match.
		{
		?>
			<p class="text-danger"><?php echo "New password and Confirm password does not match!";?></p>
		<?php
		}	
	}
		
	?>
	


    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>

	
	