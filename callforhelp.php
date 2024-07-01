<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Call for Help</title>
  <style>
    body {
      background: linear-gradient(to bottom, #4682B4, #B0E0E6);
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .nav {
      background-color: #00008B;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .nav-title {
      color: #fff;
      font-size: 24px;
      margin-left: 20px;
      font-family: 'Courier New', monospace;
      font-weight: bold;
    }

    .nav-links {
      display: flex;
      margin-right: 20px;
      font-family: 'Garamond', serif;
    }

    .nav-links a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
      font-size: 18px;
    }

    .nav-links a:hover {
      color: #ccc;
    }

    .container {
      max-width: 90%;
      margin: 100px auto 40px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h1 {
      color: #333;
      font-size: 28px;
      margin-bottom: 20px;
    }

    p {
      color: #666;
      font-size: 18px;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .contact-details {
      text-align: left;
      margin-top: 20px;
    }

    .contact-details p {
      margin: 5px 0;
      font-size: 18px;
      color: #333;
    }

    .contact-details a {
      color: #4682B4;
      text-decoration: none;
    }

    .contact-details a:hover {
      text-decoration: underline;
    }

    form {
      margin-top: 20px;
    }

    form h3 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    form label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    form input,
    form textarea,
    form select {
      display: block;
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      box-sizing: border-box;
      color: #333; 
      font-weight: 400; 
    }

    form input::placeholder,
    form textarea::placeholder {
      color: #999; 
      font-family: Monospace;
      font-weight: 300; 
    }

    form button {
      padding: 10px 20px;
      background-color: #4682B4;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    form button:hover {
      background-color: #315f86;
    }
  </style>
</head>
<body>
  <div class="nav">
    <div class="nav-title">Pharmacy Inventory System</div>
    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="inventory.php">Inventory</a>
      <a href="call_for_help.php">Call for Help</a>
    </div>
  </div>

  <div class="container">
    <h1>Call for Help</h1>
    <p>If you're a new staff member and need assistance, use this form to contact a supervisor:</p>

    <div class="contact-details">
      <p><strong>Emergency Hotline:</strong> +6012-3456789</p>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $staffUsername = htmlspecialchars($_POST['staffUsername']);
        $department = htmlspecialchars($_POST['department']);
        $issue = htmlspecialchars($_POST['issue']);
        $message = htmlspecialchars($_POST['message']);

        // Example of saving data to a file (you can modify this to save to a database or send an email)
        $file = fopen("help_requests.txt", "a");
        fwrite($file, "Name: $name\nStaff Username: $staffUsername\nDepartment: $department\nIssue: $issue\nMessage: $message\n\n");
        fclose($file);

        echo "<p>Thank you for your request, $name. A supervisor will assist you shortly.</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h3>Request Supervisor Assistance</h3>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" required>
      
      <label for="staffUsername">Staff Username:</label>
      <input type="text" id="staffUsername" name="staffUsername" placeholder="Enter your staff username" required>

      <label for="department">Department:</label>
      <select id="department" name="department" required>
        <option value="">Select your department</option>
        <option value="Pharmacy">Pharmacy</option>
        <option value="Inventory">Inventory</option>
        <option value="Customer Service">Customer Service</option>
        <option value="IT">IT</option>
      </select>

      <label for="issue">Type of Issue:</label>
      <select id="issue" name="issue" required>
        <option value="">Select the type of issue</option>
        <option value="Technical">Technical Problem</option>
        <option value="Inventory">Inventory Question</option>
        <option value="Customer">Customer Inquiry</option>
        <option value="Procedure">Procedural Question</option>
        <option value="Other">Other</option>
      </select>
      
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="5" placeholder="Describe your issue in detail" required></textarea>
      
      <button type="submit">Submit Help Request</button>
    </form>
  </div>
</body>
</html>