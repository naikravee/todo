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
	
	$id = $_GET['task_id'];
	$query = " DELETE FROM users_table WHERE user_id = '$id' ";
	$run = mysqli_query($con, $query);
	
	if($run == true)
	{
	?>
	<script type="text/JavaScript">
		alert("Task Deleted Successfully");
		window.open('index.php','_self');
	</script>
	<?php
	}
	else
	{
		echo "error ". mysqli_error($query);
	}
		
		
?>