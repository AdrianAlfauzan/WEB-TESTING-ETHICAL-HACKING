<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");

    if (mysqli_num_rows($login) == 0) {
        $error_message = "Username atau password salah!";
    } else {
        $_SESSION['admin'] = 1;
        header("Location: admin.php");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah pengalihan
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form p {
            margin: 0;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        form input[type="submit"] {
            padding: 8px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Login Admin</h1>
    </header>

    <div class="container">

        <form action="" method="post">
            <?php if (isset($error_message)) : ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <p>Username:</p>
            <input type="text" name="username">

            <p>Password:</p>
            <input type="password" name="password">

            <br>
            <br>
            <input type="submit" name="submit" value="Login">

        </form>

    </div>

</body>

</html>
