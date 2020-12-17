<?php

// Turn off all error reporting
error_reporting(0);

$username = "root";
$password = "";
$db = "todolist";

$con = mysqli_connect('localhost', $username, $password, $db);

if($con == true)
{
	echo "";
}
else 
{
	echo "Failed to connect MySql " . mysqli_connect_error();
}
?>