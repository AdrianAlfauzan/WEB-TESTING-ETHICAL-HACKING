<?php
session_start();

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: admin_login.php");
    exit(); // Penting untuk menghentikan eksekusi skrip setelah pengalihan
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .admin-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .admin-link a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }

        .admin-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <header>
        <h1>My Blog</h1>
    </header>

    <div class="container">

        <div class="admin-link">
            <a href="admin_logout.php">Logout</a>
        </div>

        <hr>

        <h3 style="text-align: center;">Halaman administrasi blog</h3>

        <p style="text-align: center;">Coming soon...</p>

    </div>

</body>

</html>
