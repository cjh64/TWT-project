<?php
	session_start();
	//destroying all session
	
	$_SESSION = array();
	session_destroy();// Destroying All Sessions
	{
		header("Location: login.php"); // Redirecting To Home Page
	}
?>