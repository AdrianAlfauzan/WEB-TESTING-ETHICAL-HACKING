<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$q  = mysqli_query($conn, "SELECT * FROM post WHERE id = {$id}") or die(mysqli_error($conn));
$post = mysqli_fetch_array($q);
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

        .post {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .post h2 {
            margin-top: 0;
            color: #007bff;
        }

        .post small {
            color: #6c757d;
        }

        .post hr {
            border-top: 1px solid #ced4da;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .post p {
            line-height: 1.6;
        }

        .post img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Responsif */
        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .post {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Berita</h1>
    </header>

    <div class="container">

        <nav style="text-align: center;">
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
                <a href="admin.php">Admin</a> |
            <?php endif; ?>
            <a href="index.php">Home</a>
            <a href="gb.php">Forum Diskusi</a>
        </nav>

        <div class="post">
            <h2><?php echo $post['judul'] ?></h2>
            <small>Tanggal <?php echo $post['tanggal'] ?></small>
            <hr>
            <?php echo $post['konten'] ?>
        </div>

    </div>

</body>

</html>
