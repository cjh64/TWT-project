<html>
	<head>
    <title>Login</title>
	<style>
	#mainbody
	{
	 background-color:aqua;
	 padding: 160px;
	 }
	#title
	{
		font-size: 50px;
		font-family: Tw Cen MT Condensed;
		font-weight: bold;
		text-align: center;
	}
	table{
		border: 2px solid black;
		border-collapse : collapse;
		margin: auto;
		background-color: lightskyblue;
	}
	table,td{
		text-align: right;
	}
    td input[type="text"],
    td input[type="password"] {
    width: 70%; 
    padding: 5px;
    transition: width 0.4s ease-in-out;
    }

    td input[type="text"]:focus,
    td input[type="password"]:focus {
    width: 100%;
    }
	</style>
	</head>
	<body>
	<!--<?php 
	include ("topnav.php");
	?> -->
	<div id="mainbody">
	<form action="login_process.php"method="POST">
		<div id="title">
            <p>Pharmacy Inventory Management System</p>
        </div>
	<table cellpadding=10px>
	<tr>
		<td style="width: 80px"></td>	
		<td></td>
		<td></td>
		<td style="width: 50px"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
</tr>
<tr>
		<td></td>
		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter a new username" pattern="[A-Za-z0-9]+" title="Please enter alphabet or numbers only!" required></td
		<td></td>
</tr>
<tr>
	<td></td>
	<td>Password:</td>
	<td><input type="password" name="password"required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" name="loginBtn" value="Login"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><a href="register_form.php">Register</a></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>

</form>
</div>

</body>
</html>

