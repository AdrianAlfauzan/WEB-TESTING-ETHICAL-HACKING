<?php

session_start();

include 'koneksi.php';

$search = $_GET['search'];
$posts = mysqli_query($conn, "SELECT * FROM post WHERE judul LIKE '%{$search}%' OR konten LIKE '%{$search}%'");

?><!DOCTYPE html>
<html lang="en">

<head>
	<title>Blog</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	
	<h1 style="text-align: center">Berita</h1>
	<hr>
	
	<div style="text-align: center">
		<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
		<a href="admin.php">Admin</a> | 
		<?php endif; ?>
		<a href="index.php">Home</a> | 
		<a href="gb.php">Forum Diskusi</a>
	</div>
	
	<hr>
		
	<h3>Hasil pencarian untuk "<?php echo $search; ?>"</h3>
	
	<?php echo mysqli_num_rows($posts); ?> hasil
		
	<hr>
		
	<?php
	
	while($row = mysqli_fetch_array($posts)) {
	
		echo "<a href='post.php?id={$row['id']}'><h2>{$row['judul']}</h2></a>";
		echo "<small>Tanggal {$row['tanggal']}</small>";
		echo "<hr>";
		
	}
	
	?>
	
</body>

</html>
