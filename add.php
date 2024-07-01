<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<html>
<head>
<style>
#mainbody
{
	background-color: aqua;
	padding: 20px;
}
#title
{
	font-size: 30px;
	font-family: Tw Cen MT Condensed;
	font-weight: bold;
	text-align: center;
}
table {
	
	border: 2px solid black;
	border-collapse: collapse;
	margin: auto;
	background-color: yellowgreen;
	
}
#label{
	text-align: right;
}
</style>
</head>

<body>
<?php
include ("topnav.php");
?>
<div id= "mainbody">
<form name="daf" action="addprocess.php"; method="POST" enctype="multipart/form-data">
	<div id="title"><p>Add item</p></div>
<table cellpadding=5px>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Name :</td>
	<td><input type="text" name="stockname" size="50"
					placeholder="Ibuprotein" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Category :</td>
    <td>
    <select name="category" id="category">
    <option value="VITAMIN & MINERAL">VITAMIN & MINERAL</option>
    <option value="SUPPLEMENT & NUTRITION">SUPPLEMENT & NUTRITION</option>
    <option value="HEALTH | ORGANIC FOODS & DRINKS">HEALTH | ORGANIC FOODS & DRINKS</option>
    <option value="MOTHER & BABY CARE">MOTHER & BABY CARE</option>
    </select>
    </td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label"> Quantity :</td>
	<td><input type="number" name="quantity" step="any" placeholder="100" required></td>
	<td></td>
<tr>
	<td></td>
	<td id="label"> Expiry Date :</td>
	<td><input type="date" name="expirydate" id="date" value="" title="expirydate" class="form-control" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td id="label"><input type="submit" name="submit" value="submit"></td>.
	<td></td>
</tr>

<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
</div>
</body>
</html>