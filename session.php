<?php
	//start session
	session_start();
	
	//db connection
	include ('db_config.php');
	
	$username = $_SESSION['username'];
	
	//get the data based on the primary key
	$mysql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
	$row = mysqli_fetch_array($mysql);
	
	$username = $row['username'];
	
	//if not found
	if(!isset($username))
	{
		header ("Location : login.php"); //return to login page
	} 
?>
	