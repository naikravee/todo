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
		
		// display the task to be updated
		$id = $_GET['task_id'];
		$query = " SELECT * FROM users_table WHERE user_id = '$id' ";
		$run = mysqli_query($con, $query);
		$result = mysqli_fetch_assoc($run);
?>

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
	
	
    <title>ToDoList</title>
  </head>
  <body>
  
    <div class="container-fluid">
	
		<div class="header">
			<div class="dropdown">
			  <button  style="float:right;" class="btn btn-dark dropdown-toggle mt-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-user fa-lg" aria-hidden="true"></i>
			  </button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="logout.php">Logout</a>
				<a class="dropdown-item" href="changepswd.php">Change password</a>
			  </div>
			</div>
			<a class="btn btn-secondary mt-3" href="index.php" style="float:left;">Back</a>
			<h1>Welcome to Php Mini Project-To Do List</h1>
		</div>
		<div class="content">
			<form method="post" action="update.php">
				<div class="card shadow-lg">
					<div class="card-body">
						<div class="row">
						<div class="col">
							<label for="task">Enter Task:</label>
						</div>
						<div class="col-sm-6">
							<input type="text" name="task" class="input-group" value="<?php echo $result['task']; ?>" required>
							<input type="hidden" name="id" class="input-group" value="<?php echo $result['user_id']; ?>" required>
						</div>
						<div class="col-sm-2 col-md-2">
							<button class="btn btn-info btn-sm" name="update">Update</button>
						</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		
	<?php
	
	// if user clicks update button, task gets updated in particular user field in database
	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$task = $_POST['task'];
		
		echo $query = " UPDATE users_table SET task = '$task' WHERE user_id = '$id' ";
		$run = mysqli_query($con, $query);
			
		if($run == true)
		{
		?>
			<script type="text/JavaScript">
				alert("Task Updated Successfully");
				window.open('index.php','_self');
			</script>
		<?php
		}
		else
		{
			echo "error" . (mysqli_error($query));
		}
	}
	
	?>


    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>