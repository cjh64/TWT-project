<?php
//session
include ('session.php');
?>
<html>

<head>

	<style>
		.menubar {
			background-color: #ffffff;
			color: white;
			text-align: center;
			font-size: 18px;
			padding: 10px 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		.menubar .left,
		.menubar .right {
			display: flex;
			align-items: center;
			color: black;
		}



		.menubar .left a,
		.menubar .right a {
			color: black;
			text-decoration: none;
			padding: 10px 15px;
			border-radius: 5px;
			transition: background-color 0.3s, color 0.3s;
			margin: 0 5px;
		}

		.menubar .left a:hover,
		.menubar .right a:hover {
			background-color: whitesmoke;
			color: black;
		}

		/* ul {
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
		
		Respensive layout - when the screen is less than 400px wide,
		   make the mavigation links stack on top of each others
		   instead of next to each others
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
		}*/

		header {
			background-color: black;
			color: white;
			padding: 10px 0;
			text-align: center;
		}
	</style>
</head>

<body>

	<header>
		<h1>Pharmacy Inventory System</h1>
		<div class="menubar">
			<div class="left">
				<a href="index.php">Main Menu</a>
				<a href="inventory.php">View Inventory</a>
				<a href="contact_us.php">Contact Us</a>
			</div>
			<div class="right">
				<div id="clock" class="clock"></div>
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</header>

</body>

<script>
	function updateClock() {
		var now = new Date();
		var hours = now.getHours();
		var minutes = now.getMinutes();
		var seconds = now.getSeconds();
		var ampm = hours >= 12 ? 'PM' : 'AM';
		hours = hours % 12;
		hours = hours ? hours : 12; // the hour '0' should be '12'
		minutes = minutes < 10 ? '0' + minutes : minutes;
		seconds = seconds < 10 ? '0' + seconds : seconds;
		var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
		document.getElementById('clock').innerHTML = strTime;
	}
	setInterval(updateClock, 1000);
</script>

</html>
