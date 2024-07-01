<?php
include('db_config.php');
// Get data from the signup form
$username = $_POST['username'];
$name = $_POST['name'];
$password = md5($_POST['password']);
$confirmpassword = md5($_POST['confirmpassword']); // Assuming you have a field named confirm_password in your form

// Check if passwords match
if ($password !== $confirmpassword) {
    echo '<script>
        alert("Passwords do not match, please try again.");
        window.location.href = "signup.php";
    </script>';
    exit; // Stop execution if passwords don't match
}

// Check if the username already exists
$check = "SELECT username FROM user WHERE username = '$username'";
$results = mysqli_query($conn, $check);

if (mysqli_num_rows($results) > 0) {
    // Username already exists
    echo '<script>
        alert("This username is already in use, please try another one.");
        window.location.href = "signup.php";
    </script>';
} else {
    // Username is unique, proceed with insertion
    $insertSql = "INSERT INTO user (username, name, password) VALUES ('$username', '$name', '$password')";

    if (mysqli_query($conn, $insertSql)) {
        // Successful registration
        echo '<script>
            alert("New account registered successfully!");
            window.location.href = "login.php";
        </script>';
    } else {
        // Error in insertion
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
