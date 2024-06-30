	<?php
	//start session
	session_start();
	
	//connect to db
	include('db_config.php');
	
	//get the data from login page
	$username =$_POST['username'];
	$password = ($_POST['password']);//encrypt the password with md5
	
	//if they clicked on the button,
	if (isset($_POST['loginBtn']))
	{
		//check the email from db
		$mysql ="SELECT *FROM user
				 WHERE username ='$username' AND password='$password'";
		$result = mysqli_query($conn,$mysql);
		$row    = mysqli_fetch_array($result);
		
		//correct credentials
		if(mysqli_num_rows($result)>0)
		{
		// get the name and the primary key(username)
		$_SESSION['username'] = $row['username'];//simpan data session
            $name= $row['name'];
		
		//popup msg if success
		echo'<script>alert("Welcome,'.$name.'");
			window.location.href="index.php";</script>';
		}
		 else //if wrong credential
		 {
		 echo'<script>alert("Wrong credentials, Please Login again!");
			window.location.href="login.php";</script>';
			//return to login
		 }
	}
	//close connection DB
	mysqli_close($conn);
	?> 