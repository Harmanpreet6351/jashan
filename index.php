<?php

session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}

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

// Define the query

$sql = "SELECT * FROM jobs";

if(isset($_GET['q'])) {
    $q = $_GET['q'];
    $sql = "SELECT * FROM jobs WHERE title LIKE ?";
    $result = $conn->execute_query($sql, ["%$q%"]);
} else {
    $result = $conn->query($sql);
}

// Execute the query


// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job List Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'navbar.php'; ?>
    <div class="container col mt-5">
        <h1 class="mb-4 text-center">Job List</h1>
        <!-- Search Bar -->
        <form class="mb-4 mx-auto" style="max-width: 500px">
            <div class="input-group">
                <input type="text" name="q" style="height: 70px;" class="form-control" placeholder="Search for jobs..." aria-label="Search for jobs" aria-describedby="searchButton">
                <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
            </div>
        </form>
        <!-- Job List -->
        <div class="mx-auto" style="max-width: 700px;">
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="card mb-5 shadow border border-dark">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $row['company'] ?></h6>
                    <p class="card-text"><?= $row['description'] ?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- Add more job cards as needed -->
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
