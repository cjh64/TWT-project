<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include('session.php');

if (isset($_POST['submit'])) {
    $stockname = $_POST['stockname'];
    $category  = $_POST['category'];
    $quantity  = $_POST['quantity'];
    $expirydate = $_POST['expirydate'];

    $stmt = $conn->prepare("INSERT INTO medicines (`name`, `category`, `quantity`, `expiry_date`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssis', $stockname, $category, $quantity, $expirydate);

    if ($stmt->execute()) {
        echo '<script>alert("Record inserted successfully!"); window.location.href="inventory.php";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($conn);
?>

