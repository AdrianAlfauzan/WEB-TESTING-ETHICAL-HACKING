<?php

session_start();

include 'koneksi.php';

$posts = mysqli_query($conn, "SELECT * FROM post");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
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

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }

        nav a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            padding: 8px;
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

        .post {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .post h2 {
            margin-top: 0;
        }

        .post small {
            color: #6c757d;
        }

        .post hr {
            border-top: 1px solid #ced4da;
            margin-top: 10px;
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <header>
        <h1>Berita</h1>
    </header>

    <nav>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
            <a href="admin.php">Admin</a> |
        <?php endif; ?>
        <a href="index.php">Home</a> |
        <a href="gb.php">Forum Diskusi</a>
    </nav>

    <div class="container">

        <form action="search.php" method="get">
            <label for="search">Cari posting:</label>
            <input type="text" id="search" name="search">
            <input type="submit" value="Cari">
        </form>

        <?php while ($row = mysqli_fetch_array($posts)) : ?>
            <div class="post">
                <a href='post.php?id=<?= $row['id'] ?>'>
                    <h2><?= $row['judul'] ?></h2>
                </a>
                <small>Tanggal <?= $row['tanggal'] ?></small>
                <hr>
            </div>
        <?php endwhile; ?>

    </div>

</body>

</html>

