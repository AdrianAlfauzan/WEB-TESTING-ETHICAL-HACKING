<?php
session_start();
include 'koneksi.php';

$pesan = mysqli_query($conn, "SELECT * FROM guestbook ORDER BY tanggal");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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

        .guestbook {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .guestbook small {
            color: #6c757d;
        }

        .guestbook p {
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .guestbook hr {
            border-top: 1px solid #ced4da;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .guestbook form {
            margin-top: 20px;
        }

        .guestbook form input[type="text"],
        .guestbook form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .guestbook form input[type="submit"] {
            padding: 8px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .guestbook form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <header>
        <h1>My Blog</h1>
    </header>

    <div class="container">

        <nav style="text-align: center;">
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                <a href="admin.php">Admin</a> |
            <?php endif; ?>
            <a href="index.php">Home</a> |
            <a href="gb.php">Forum Diskusi</a>
        </nav>

        <div class="guestbook">
            <h2>Forum Diskusi</h2>

            <?php while ($row = mysqli_fetch_array($pesan)) : ?>
                <small>Oleh <b><?= $row['nama'] ?></b> pada <?= $row['tanggal'] ?></small>
                <p><?= $row['pesan'] ?></p>
                <hr>
            <?php endwhile; ?>

            <h3>Kirim pesan</h3>

            <form action="gb_post.php" method="post">
                Nama: <br>
                <input type="text" name="nama"><br>
                Pesan: <br>
                <textarea name="pesan" cols="40" rows="5"></textarea>
                <br>
                <input type="submit" value="Kirim">
            </form>
        </div>

    </div>

</body>

</html>
