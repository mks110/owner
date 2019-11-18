<?php 

include 'koneksi.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

mysql_query("UPDATE juduldashboard SET judul='$judul', deskripsi='$deskripsi'");

header("location:judul.php?pesan=update");

?>