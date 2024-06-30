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
	</style>
	</head>
	<body>
	
	<ul>
		<li><a href="#">Main Menu</a></li>     
		<li><a href="index.php">Inventory</a></li>
		<li><a href="#">Create New Account</a></li>
        <li style= "float:right"><a href="logout.php">Logout</a></li>
	</ul>
	
	</body>
	</html>
	
		