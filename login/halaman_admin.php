<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pegawai</title>
</head>
<body>
	<?php 
	session_start();


	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h1>Halaman Pegawai</h1>

	<p>Selamat Datang <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>

	<br/>
	<br/>

	</body>
</html>