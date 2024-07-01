<?php
session_start();

// Include the top navigation
include('topnav.php');
include('session.php');
// Dummy Inventory class for simulation
class Inventory {
    public function checkLogin() {
        // Simulated login check
    }
}


// Handle form submission for adding or updating orders
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];
    $address = $_POST['address'];
    $order_date = $_POST['order_date'];
    $delivery_date = $_POST['delivery_date'];
    
    if (!empty($_POST['order_id'])) {
        // Update existing order
        $order_id = $_POST['order_id'];
        $sql = "UPDATE customer SET name='$customer_name', item='$item', quantity=$quantity, total_price=$total_price, 
                address='$address', order_date='$order_date', delivery_date='$delivery_date' WHERE id=$order_id";
    } else {
        // Insert new order
        $sql = "INSERT INTO customer (name, item, quantity, total_price, address, order_date, delivery_date)
                VALUES ('$customer_name', '$item', $quantity, $total_price, '$address', '$order_date', '$delivery_date')";
    }

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        alert("Record added successfully!");
        window.location.href = "customer.php";
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Handle delete request
if (isset($_GET['delete_id'])) 
{
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM customer WHERE id=$delete_id";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
        alert("Record deleted successfully!");
        window.location.href = "customer.php";
        </script>';
        } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f4f4f4; /* Light gray background */
        }
        .card-header {
            background-color: #333; /* Dark gray background */
            color: #fff; /* White text */
            padding: 10px;
            border-bottom: 2px solid #575757; /* Medium gray border */
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .btn-primary {
            background-color: #333; /* Dark gray background */
            border-color: #333; /* Dark gray border */
        }
        .btn-primary:hover {
            background-color: #575757; /* Medium gray on hover */
            border-color: #575757; /* Medium gray border on hover */
        }
        .btn-warning {
            background-color: #575757; /* Medium gray background */
            border-color: #575757; /* Medium gray border */
        }
        .btn-warning:hover {
            background-color: #333; /* Dark gray on hover */
            border-color: #333; /* Dark gray border on hover */
        }
        .btn-danger {
            background-color: #575757; /* Medium gray background */
            border-color: #575757; /* Medium gray border */
        }
        .btn-danger:hover {
            background-color: #333; /* Dark gray on hover */
            border-color: #333; /* Dark gray border on hover */
        }
        .table-responsive {
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 5px;
            padding: 10px;
            background-color: #fff; /* White background */
        }
        .table {
            width: 100%;
            margin-bottom: 0;
            color: #495057; /* Dark gray text */
        }
        .table th,
        .table td {
            padding: 10px;
            vertical-align: middle;
            border-top: 1px solid #ddd; /* Light gray border */
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Very light gray for striped rows */
        }
        .modal-header {
            background-color: #333; /* Dark gray background */
            color: #fff; /* White text */
            border-bottom: none;
        }
        .modal-title {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }
        .form-group label {
            font-weight: bold;
        }
        textarea {
            resize: none;
            height: 80px; /* Adjusted height */
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-0 shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-10">
                            <h3 class="card-title mb-0">Customer Orders</h3>
                        </div>
                        <div class="col-lg-2 text-right">
                            <button type="button" id="addOrder" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#orderModal"><i class="fas fa-plus"></i> New Order</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="orderList" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Address</th>
                                    <th>Order Date</th>
                                    <th>Delivery Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch customer data from the database
                                $sql = "SELECT id, name, item, quantity, total_price, address, order_date, delivery_date FROM customer";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['item']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['order_date']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['delivery_date']) . "</td>";
                                        echo "<td>
                                                <button class='btn btn-sm btn-warning' onclick='editOrder(" . $row['id'] . ")'>Edit</button>
                                                <a href='?delete_id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No records found</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="orderModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="modal-title mb-0"><i class="fas fa-plus"></i> Add Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="orderForm">
                <input type="hidden" name="order_id" id="order_id">
            <div class="form-group">
                <label for="customer_name">Name:</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="item">Item:</label>
                <input type="text" name="item" id="item" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date:</label>
                <input type="date" name="order_date" id="order_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="delivery_date">Delivery Date:</label>
                <input type="date" name="delivery_date" id="delivery_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary rounded-0"><i class="fas fa-save"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<!-- Custom Script -->
<script>
$(document).ready(function() {
    $('#orderList').DataTable();

    $('#orderForm').on('submit', function(event) {
        let orderDate = new Date($('#order_date').val());
        let deliveryDate = new Date($('#delivery_date').val());
        let totalPrice = $('#total_price').val();
        let quantity = $('#quantity').val();

        if (deliveryDate < orderDate) {
            alert('Delivery date cannot be earlier than order date.');
            event.preventDefault();
        }

        if (totalPrice <= 0 || isNaN(totalPrice)) {
            alert('Total price must be a positive number.');
            event.preventDefault();
        }

        if (quantity <= 0 || isNaN(quantity)) {
            alert('Quantity must be a positive number.');
            event.preventDefault();
        }
    });
});

function editOrder(id) {
    // Fetch order data from the server using AJAX
    $.ajax({
        url: 'get_order.php', // Replace with your server-side script to fetch order data
        type: 'GET',
        data: { id: id },
        success: function(response) {
            var order = JSON.parse(response);
            $('#order_id').val(order.id);
            $('#customer_name').val(order.name);
            $('#item').val(order.item);
            $('#quantity').val(order.quantity);
            $('#total_price').val(order.total_price);
            $('#address').val(order.address);
            $('#order_date').val(order.order_date);
            $('#delivery_date').val(order.delivery_date);
            $('#orderModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching order details:', error);
        }
    });
}

</script>

</body>
</html>
