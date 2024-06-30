<?php

// Include database connection
include('db_config.php');

// Retrieve user data from database based on username
$username = $_SESSION['username'];

$mysql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$row = mysqli_fetch_array($mysql);

$name= $row['name'];

// Check if username is set in session
if (!isset($_SESSION['username'])) 
{
    echo 'window.location.assign("login.php")';
}
?>