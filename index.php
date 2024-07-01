<?php
// Start the session
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    include ("topnav.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        .menubar {
            background-color: #ffffff;
            color: #333;
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
        }

        .menubar .left a,
        .menubar .right a {
            color: #333;
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

        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .text-overlay {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .button-overlay {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .button-overlay a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button-overlay a:hover {
            background-color: #0056b3;
        }


        .clock {
            font-size: 18px;
        }

        img {
            width: 100%;
            height: auto;
            opacity: 0.7;
        }
    </style>
   
</head>

<body>

    <div class="container">
        <img src="https://plus.unsplash.com/premium_photo-1682129923019-a2343cbcfddf?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="mainpage-image">
        <div class="text-overlay">
            <h2>Welcome to the Pharmacy Inventory System</h2>
            <p>Use the navigation menu to manage your inventory.</p>
        </div>
        <div class="button-overlay">
            <a href="login.php">Get Started</a>
        </div>
    </div>

    <?php 
    include ("footer.php");
    ?>
</body>

</html>
