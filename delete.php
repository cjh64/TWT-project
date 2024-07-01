<?php 
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