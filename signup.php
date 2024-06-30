<!DOCTYPE html>
<html>
<head>
<title>Create A New Account</title>
<style>
body {
    background-color: aqua;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

#title {
    font-size: 30px;
    font-family: 'Tw Cen MT Condensed', sans-serif;
    font-weight: bold;
    text-align: center;
}

table {
    border: 2px solid black;
    border-collapse: collapse;
    margin: auto;
    background-color: lightpink;
    width: 80%;
}

table, td {
    text-align: left;
    padding: 20px;
    
}
td input[type="text"],
td input[type="password"]{
    width: 100%; 
    padding: 10px;
    border: 3px solid #5555;
}
td input[type="submit"] {
    width: 50%; 
    padding: 10px;
}
#SubmitBtn{
    border-radius: 12px;
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}
#SubmitBtn:hover{  
    background-color: #008CBA;
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>
</head>
<body>
<?php
include("topnav.php");
?>
<div id="mainbody">
<form action="signup_process.php" method="POST">
    <br>
    <br>
    <br>
    <div id="title">Create A New Account</div><p>
    <table cellpadding="10px">
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td></td>
            <td>Username :</td>
            <td><input type="text" name="username" placeholder="Enter a new username" required></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Name :</td>
            <td><input type="text" name="name" placeholder="Enter Your Name" required></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Create a password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{6,}$" 
                       title="at least one number, one uppercase letter, one lowercase letter, one special character, and at least 6 or more characters" required></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Confirm Your Password:</td>
            <td><input type="password" name="confirmpassword" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                       title="at least one number and one uppercase, lowercase letter and special character, and at least 6 or more characters" required />
            <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" id="SubmitBtn" name="SubmitBtn" value="Submit"></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><a href="index.php">Back to Main Menu</a></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>
