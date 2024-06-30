<?php
//session
	include ('session.php');
?>
<html>
	<head>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}
	
	li{
		float: left;
		}
		
		li a{
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-weight: bold;
		}
		
		li a:hover{
			background-color: yellow;
			color: black;
		}
		
		/* Respensive layout - when the screen is less than 400px wide,
		   make the mavigation links stack on top of each others
		   instead of next to each others */
		 @media screen and (max-width: 400px){
			   .topnav a {
				   float: none;
				   width: 100%;
			   }
		 }
		 li{
			float: left;
			 margin-right: 10px;
		}

		li a, .dropbtn{
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-weight: bold;
		}

		li a:hover, .dropdown:hover .dropbtn{
			background-color: yellow;
			color: black;
		}

		li.dropdown{
			display: inline-block;
			float:right;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			right: 10; 
			background-color:lightgray;
			min-width: 50px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			color:black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}
		.dropdown-content a hover
		{
			background-color: yellow;
		}
		.dropdown:hover .dropdown-content
		{
			display:block;
		}
	</style>
	</head>
	<body>
	
	<ul>
		<li><a href="index.php">Main Menu</a></li>     
		<li><a href="inventory.php">Inventory</a></li>
		<li><a href="signup.php">Create New Account</a></li>
		<li class="dropdown"><a href="#" class= "dropbtn">Hi, <?php echo $name;?></a>
		<div class="dropdown-content">
			<a href="#">Edit Profile</a>
    		<a href="#">Change Password</a>
    		<a href="logout.php">Logout</a>
		<li>
	</ul>
	
	</body>
	</html>
	
		