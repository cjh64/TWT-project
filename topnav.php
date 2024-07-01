<?php
//session
include('session.php');
?>
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

        li {
            float: left;
        }

        li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-weight: bold;
        }

        li a:hover {
            background-color: yellow;
            color: black;
        }

        /* Responsive layout - when the screen is less than 400px wide,
           make the navigation links stack on top of each other
           instead of next to each other */
        @media screen and (max-width: 400px) {
            .topnav a {
                float: none;
                width: 100%;
            }
        }

        li {
            float: left;
            margin-right: 10px;
        }

		
        h1 {
            color: white; /* Change the color of h1 */
			background-color:
            text-align: center; /* Center align h1 */
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-weight: bold;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: yellow;
            color: black;
        }

        li.dropdown {
            display: inline-block;
            float: right;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 10;
            background-color: lightgray;
            min-width: 50px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: yellow;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
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
</head>
<body>


<ul>
    <li><a href="index.php">Main Menu</a></li>
    <li><a href="inventory.php">Inventory</a></li>
    <li class="clock" id="clock"></li> 
    <li class="dropdown">
        <a href="#" class="dropbtn">Hi, <?php echo $name; ?></a>
        <div class="dropdown-content">
            <a href="signup.php">Create New Account</a>
            <a href="#">Edit Profile</a>
            <a href="#">Change Password</a>
            <a href="logout.php">Logout</a>
        </div>
    </li>
</ul>

</body>
</html>
