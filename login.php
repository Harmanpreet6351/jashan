<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-form {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .login-form .form-floating {
            position: relative;
            margin-bottom: 10px;
        }
        .login-form input[type="email"],
        .login-form input[type="password"] {
            height: auto;
            font-size: 16px;
        }
        .login-form button {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="login-handler.php" method="post" class="login-form mt-5">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="name@example.com">
                <label for="inputEmail">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="passwd" class="form-control" id="inputPassword" placeholder="Password">
                <label for="inputPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
            <p class="mt-3 mb-2 text-muted text-center">&copy; 2024</p>
        </form>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
