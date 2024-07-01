<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
// session
include ('session.php');

// get id from db
$id = $_GET["id"];

//delete data from db medicines
$mysql= "DELETE FROM medicines
WHERE No = '$id'";

if (mysqli_query($conn, $mysql)) {
	//popout js msg successful
echo '<script>alert("Record deleted!");
window.location.href="inventory.php";</script>';
} else {
echo "Error ;".mysqli_error($conn);
}
?>	