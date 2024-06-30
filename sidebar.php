<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Inventory Management System</title>
    <style>
    .sidebar {
        float: left;
        width: 200px;
        background-color: #333;
        color: #fff;
        padding: 15px;
        display: flex;
        flex-direction: column;
        align-items: center; /* Center-align items vertically */
    }

    .sidebar h2 {
        color: #f2f2f2;
        text-align: center;
        margin-bottom: 20px;
    }

    .category-list {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: center; /* Center-align list items */
    }

    .category-list li {
        margin-bottom: 10px;
    }

    .category-list a {
        display: block;
        color: #ddd;
        padding: 10px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .category-list a:hover {
        background-color: #575757;
    }
</style>
</head>
<div class="sidebar">
    <h2>Filter by Category</h2>
    <ul class="category-list">
        <li><a href="index.php">All Category</a></li>
        <li><a href="index.php?category=<?php echo urlencode('SUPPLEMENT & NUTRITION'); ?>">SUPPLEMENT & NUTRITION</a></li>
        <li><a href="index.php?category=<?php echo urlencode('VITAMIN & MINERAL'); ?>">VITAMIN & MINERAL</a></li>
        <li><a href="index.php?category=<?php echo urlencode('HEALTH | ORGANIC FOODS & DRINKS'); ?>">HEALTH | ORGANIC FOODS & DRINKS</a></li>
        <li><a href="index.php?category=<?php echo urlencode('MOTHER & BABY CARE'); ?>">MOTHER & BABY CARE</a></li>
    </ul>
</div>
</html>