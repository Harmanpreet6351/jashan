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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $jobTitle = $_POST["jobTitle"];
    $companyName = $_POST["companyName"];
    $description = $_POST["description"];

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO jobs (title, company, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $jobTitle, $companyName, $description);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

header("Location: index.php");

// Close the connection
$conn->close();