<?php
include("includes/header.php");
include("includes/navbar.php");
include("koneksiuser.php");
include("userfunc.php");
?>

	<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Profile User</h2>
			<hr />
			
			<?php
			$id = $_GET['id_user'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
				if($delete){
					echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info">Data gagal dihapus.</div>';
				}
			}
			?>
			<center><img class="img-responsive img-circle center-block" src="../img/adminlte.png" width="150"><br /></center>
			<?php 
			//echo $row['foto']; 
			?>
			<table class="table table-striped">
				<tr>
					<th width="20%">ID USER</th>
					<td><?php echo $row['id_user']; ?></td>
				</tr>
				<tr>
					<th>NAMA LENGKAP</th>
					<td><?php echo $row['nama_user']; ?></td>
				</tr>
				<tr>
					<th>NO HP</th>
					<td><?php echo $row['nohp_user']; ?></td>
				</tr>
				<tr>
					<th>ALAMAT</th>
					<td><?php echo $row['alamat_user']; ?></td>
				</tr>
				<tr>
					<th>LEVEL</th>
					<td><?php echo $row['level']; ?></td>
				</tr>
				<tr>
					<th>USERNAME</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
			</table>
			
			<a href="user.php" class="btn btn-warning"><i class="fas fa-backspace"></i>BACK</a>
			<a href="useredit.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="userprofile.php?aksi=delete&id_user=<?php echo $row['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<?php
include("includes/scripts.php");
include("includes/footer.php");
?>