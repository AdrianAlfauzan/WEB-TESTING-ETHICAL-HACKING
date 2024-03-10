<?php

session_start();

include 'koneksi.php';

$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

$insert = mysqli_query($conn, "INSERT INTO guestbook (id, tanggal, nama, pesan) VALUES(NULL, NOW(), '{$nama}', '{$pesan}')");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .success-message {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .back-link {
            text-decoration: none;
            color: #007bff;
            margin-top: 20px;
            display: inline-block;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .back-link:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="success-message">
            <p><?php if ($insert) {
				echo "Pesan Anda sudah disimpan.";
				}?>
			</p>
        </div>
        <a href="gb.php" class="back-link">Kembali ke Forum Diskusi</a>
    </div>

</body>

</html>
