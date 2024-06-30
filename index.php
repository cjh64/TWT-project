<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Inventory Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: flex-start;
        }

        .header a {
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .header a:hover {
            background-color: #575757;
        }

        .container {
            display: flex;
            flex: 1;
            padding: 20px;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            padding: 15px;
            height: 100%;
        }

        .sidebar h2 {
            color: #f2f2f2;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            padding: 10px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #fff;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php 
include ("topnav.php");
?>
    <div class="container">
        <div class="sidebar">
            <h2>Filter by Category</h2>
            <ul class="category-list">
                <li><a href="index.php">All</a></li>
                <li><a href="index.php?category=<?php echo urlencode('SUPPLEMENT & NUTRITION'); ?>">SUPPLEMENT & NUTRITION</a></li>
                <li><a href="index.php?category=<?php echo urlencode('VITAMIN & MINERAL'); ?>">VITAMIN & MINERAL</a></li>
                <li><a href="index.php?category=<?php echo urlencode('HEALTH | ORGANIC FOODS & DRINKS'); ?>">HEALTH | ORGANIC FOODS & DRINKS</a></li>
                <li><a href="index.php?category=<?php echo urlencode('MOTHER & BABY CARE'); ?>">MOTHER & BABY CARE</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Current Medicine Inventory</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database configuration
                    require_once 'db_config.php';

                    // Define SQL query
                    $sql = "SELECT id, name, category, quantity, expiry_date FROM medicines";

                    // Check if category filter is set
                    if (!empty($_GET['category'])) {
                        $category = urldecode($_GET['category']);
                        $sql .= " WHERE category = '{$category}'";
                    }

                    // Execute query
                    $result = $conn->query($sql);

                    // Display results
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["category"]."</td>";
                            echo "<td>".$row["quantity"]."</td>";
                            echo "<td>".$row["expiry_date"]."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
