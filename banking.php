<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "banking_system";

// Connect to MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$accountName = $_POST['accountName'];
$email = $_POST['email'];
$accountType = $_POST['accountType'];
$initialDeposit = $_POST['initialDeposit'];
$contact = $_POST['contact'];

// Validate inputs
if (!empty($accountName) && !empty($email) && !empty($accountType) && !empty($initialDeposit) && !empty($contact)) {
    // Prepare SQL query
    $sql = "INSERT INTO accounts (account_name, email, account_type, initial_deposit, contact) 
            VALUES ('$accountName', '$email', '$accountType', $initialDeposit, '$contact')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Account Created Successfully!</h1>";
        echo "<p>Account Holder: $accountName</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Account Type: $accountType</p>";
        echo "<p>Initial Deposit: $initialDeposit</p>";
        echo "<p>Contact: $contact</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "All fields are required!";
}

// Close connection
$conn->close();
?>
