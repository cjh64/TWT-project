<?php
session_start();

// Include necessary files
include_once('db_config.php');
include('session.php');
include('topnav.php');
include('footer.php');

if (strlen($_SESSION['username']) == 0) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['update'])) {
    $oldpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    $username = $_SESSION['username'];

    $sql = mysqli_query($conn, "SELECT password FROM user WHERE username='$username' AND password='$oldpassword'");
    $num = mysqli_fetch_array($sql);

    if ($num) {
        $ret = mysqli_query($conn, "UPDATE user SET password='$newpassword' WHERE username='$username'");
        echo "<script>alert('Password Changed Successfully !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    } else {
        echo "<script>alert('Old Password does not match !!');</script>";
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            padding: 15px;
        }
        .card-body {
            padding: 30px;
            background-color: #fff; /* Updated background color */
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 12px;
            font-size: 14px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        }
        .btn-primary {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            width:100%;
        }
        .btn-primary:hover {
            background-color: #218838; /* Darker shade for hover effect */
        }
    </style>
    <script language="javascript" type="text/javascript">
        function valid() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match !!");
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Change Password</h3>
                    </div>
                    <form class="form" method="post" name="changepassword" onSubmit="return valid();">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="currentpassword">Current Password</label>
                                <input type="password" class="form-control" id="currentpassword" name="currentpassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newpassword">New Password</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,}$" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,}$" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg" name="update">Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
