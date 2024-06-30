<?php
require_once 'db_config.php';

$sql = "SELECT ID, Name, Category, Quantity, `Expiry Date` FROM medicines";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["ID"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["Quantity"]."</td>";
        echo "<td>".$row["Expiry Date"]."</td>";
        echo "<td>".$row["Category"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}

$conn->close();
?>
