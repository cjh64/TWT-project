<?php
	include ('db_config.php');

	$username   = $_POST['username'];
	$password   = md5($_POST['password']);


	//check if there are any same name created
	$check  = "SELECT username FROM user
			   WHERE username = '$username'";
	$result = mysqli_query($conn, $check) or die(mysql_error());

	//if exists, js popup msg
	if (mysqli_num_rows($results)>0)
	{
		echo'<script>
			alert("This username already been used, please try again with other username");
			window.location.href="signup.php";</script>';
	}else{
		//if not exist, pop out
		$mysql = "INSERT INTO user
				  (username,password)
				   VALUES('$username','$password)";
				   
		if(mysqli_query($conn,$mysql)){
		//papar js popup msg jika pengguna berjaya daftar
		echo '<script>
			  alert("New Account Registered Successfully!");
			  window.location.href= "login.php";</script>';
			  //return to login page
		}else  {
			echo "Error;" .mysqli_error($conn);
		}
	}
	// Close connection
	mysqli_close($conn);
	?>
	
