<?php
	session_start();
	//destroying all session
	if(session_destroy()){
		header("Location: login.php");
		//redirect ke main page
		}
	?>