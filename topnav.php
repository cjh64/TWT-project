<?php
//session
include('session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styles */
        header {
            background-color: black;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        h1 {
            margin: 0;
            padding: 10px 0;
        }

        /* Menubar styles */
        .menubar {
            background-color: #ffffff;
            color: black;
            text-align: center;
            font-size: 18px;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
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

        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown .button {
            font-family: Arial, sans-serif;
            font-size: 18px;
            border: none;
            background-color: white;
            color: black;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown .button:hover {
            background-color: whitesmoke;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: lightgray;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: yellow;
            color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Clock styles */
        .clock {
            color: black;
            background-color: whitesmoke;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Pharmacy Inventory System</h1>
        <div class="menubar">
            <div class="left">
                <a href="index.php">Main Menu</a>
                <a href="contact_us.php">Contact Us</a>
                <a href="customer.php">Customer Order</a> <!-- Added Customer Order link -->
            </div>
            <div class="right">
                <div class="dropdown">
                    <button class="button">Inventory</button>
                    <div class="dropdown-content">
                        <a href="inventory.php">View all inventory</a>
                        <a href="add.php">Add Inventory</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="button">Hi, <?php echo $name; ?></button>
                    <div class="dropdown-content">
                        <a href="signup.php">Create New Account</a>
                        <a href="editprofile.php">Edit Profile</a>
                        <a href="change-password.php">Change Password</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
                <div id="clock" class="clock"></div>
            </div>
        </div>
    </header>

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

</body>

</html>
