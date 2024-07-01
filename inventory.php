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

        .container {
            display: flex;
            flex: 1;
            padding: 20px;
            height: 100%;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            padding: 15px;
            height: 500%;
            text-align: center; 
        }

        .sidebar h2 {
            color: #f2f2f2;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 100px;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            padding: 10px;
            text-decoration: none;
            border-radius: 4px;
            text-align: center; 
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
        }

        .search-bar {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-bar input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }

        .search-bar input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
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

        .delete-icon {
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="sidebar">
            <h2>Filter by Category</h2>
            <ul class="category-list">
                <li><a href="inventory.php">All Category</a></li>
                <li><a href="inventory.php?category=<?php echo urlencode('SUPPLEMENT & NUTRITION'); ?>">SUPPLEMENT & NUTRITION</a></li>
                <li><a href="inventory.php?category=<?php echo urlencode('VITAMIN & MINERAL'); ?>">VITAMIN & MINERAL</a></li>
                <li><a href="inventory.php?category=<?php echo urlencode('HEALTH | ORGANIC FOODS & DRINKS'); ?>">HEALTH | ORGANIC FOODS & DRINKS</a></li>
                <li><a href="inventory.php?category=<?php echo urlencode('MOTHER & BABY CARE'); ?>">MOTHER & BABY CARE</a></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <div class="content">
            <h1>Current Medicine Inventory</h1>

            <div class="search-bar">
                <form method="GET" action="inventory.php">
                    <input type="text" name="search" placeholder="Search for medicine...">
                    <input type="submit" value="Search">
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
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

                    // Check if search query is set
                    if (!empty($_GET['search'])) {
                        $search = $conn->real_escape_string($_GET['search']);
                        $sql .= !empty($_GET['category']) ? " AND" : " WHERE";
                        $sql .= " (name LIKE '%{$search}%' OR category LIKE '%{$search}%')";
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
                            echo "<td><a href='deleteprocess.php?id=".$row["id"]."'><span class='delete-icon'>&#10060;</span>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No records found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php 
    include ("footer.php");
    ?>

</body>
</html>
