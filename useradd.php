<?php
include('koneksiuser.php');
include('userfunc.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container">
		<div class="content">
			<h2>Tambah Data User</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
                $pass1		= aman($_POST['pass1']);
				$pass2		= aman($_POST['pass2']);
				$nama		= aman($_POST['nama']);
				$nohp		= aman($_POST['nohp']);
				$lv			= aman($_POST['level']);
				$unamek		= aman($_POST['username']);
				$alamat		= aman($_POST['alamat']);
			
				//tinggal masalah database NIK dijadikan BIG INT
				
			
					if($pass1 == $pass2){
						$pass = md5($pass1);
						$insert = mysqli_query($koneksi, "INSERT INTO `user`(`id_user`, `nama_user`, `alamat_user`, `nohp_user`, `level`, `username`, `password`) VALUES ('','$nama','$alamat','$nohp','$lv','$unamek','$pass')") or die(mysqli_error($koneksi));
						if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
                        }
                        else
                        {
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
                    }
                    else
                    {
						echo '<div class="alert alert-danger">Konfirmasi Password tidak sesuai.</div>';
					}
                }
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-4">
						<input type="text" name="username" class="form-control" placeholder="username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PASSWORD</label>
					<div class="col-sm-4">
						<input type="password" name="pass1" class="form-control" placeholder="PASSWORD" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KONFIRMASI PASSWORD</label>
					<div class="col-sm-4">
						<input type="password" name="pass2" class="form-control" placeholder="KONFIRMASI PASSWORD" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No HP</label>
					<div class="col-sm-4">
						<input type="text" name="nohp" class="form-control" placeholder="Nomor Hp" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ALAMAT</label>
					<div class="col-sm-6">
						<textarea name="alamat" class="form-control" placeholder="ALAMAT"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Level</label>
					<div class="col-sm-3">
						<select name="level" class="form-control">
							<option value="">Jenis Level</option>
							<option value="owner">Owner</option>
							<option value="admin">Admin</option>
							
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						<a href="user.php" class="btn btn-warning">BATAL</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
    </script>
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>