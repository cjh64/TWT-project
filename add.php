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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - Pharmacy Inventory Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        header {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        #mainbody {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 20px 0;
        }

        #title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.inline {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }

        .form-group.inline label {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        <?php include("topnav.php"); ?>
    </header>

    <div id="mainbody">
        <div id="title">Add Item</div>
        <form name="daf" action="addprocess.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="stockname">Name:</label>
                <input type="text" name="stockname" id="stockname" placeholder="Ibuprofen" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="VITAMIN & MINERAL">VITAMIN & MINERAL</option>
                    <option value="SUPPLEMENT & NUTRITION">SUPPLEMENT & NUTRITION</option>
                    <option value="HEALTH | ORGANIC FOODS & DRINKS">HEALTH | ORGANIC FOODS & DRINKS</option>
                    <option value="MOTHER & BABY CARE">MOTHER & BABY CARE</option>
                </select>
            </div>
            <div class="form-group inline">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" step="any" placeholder="100" required>
            </div>
            <div class="form-group inline">
                <label for="expirydate">Expiry Date:</label>
                <input type="date" name="expirydate" id="expirydate" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
