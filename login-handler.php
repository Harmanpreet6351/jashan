<?php

session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "jobportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the email to search for
$email = $_POST['email'];

// Prepare and bind the statement
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute the statement
$stmt->execute();

// Store the result
$result = $stmt->get_result();

// Check if a row is returned
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    // Output the result
    if($_POST['passwd']==$row['passwd']) {
        $_SESSION['user'] = $row['email'];
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
} else {
    head("Location: login.php");
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
