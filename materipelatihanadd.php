<?php
include("koneksiuser.php");
include("userfunc.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<?php
	error_reporting(0)
	?>
	<div class="container">
		<div class="content">
			<h2>TAMBAH TOPIK PELATIHAN</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
				//$id 		= aman($_POST['id_topik']);
				$topik		= aman($_POST['topik']);
				$tglmulai	= aman($_POST['tgl_mulai']);
				$tglakhir	= aman($_POST['tgl_akhir']);
				$deskripsi	= aman($_POST['deskripsi']);
				$file		= aman($_POST['file']);
				$status		= aman($_POST['status']);
				$kuota		= aman($_POST['kuota']);
				
				//tinggal masalah database NIK dijadikan BIG INT
				$cek = mysqli_query($koneksi, "SELECT * FROM 'topik_pelatihan'");
				if(mysqli_num_rows($cek) == 0){
					$insert = mysqli_query($koneksi, "INSERT INTO `topik_pelatihan`(`id_topik`, `topik`, `tgl_mulai`, `tgl_akhir`, `deskripsi`, `file`, `status`, `kuota`) VALUES ('','$topik','$tglmulai','$tglakhir','$deskripsi','$file','$status','$kuota')") or die(mysqli_error($koneksi));
						if($insert){
							echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{
							echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}
					}else{
						echo '<div class="alert alert-danger">Konfirmasi Password tidak sesuai.</div>';
					}
			}
			
			?>
			
			<form class="form-horizontal" action="" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">topik</label>
					<div class="col-sm-4">
						<input type="text" name="topik" class="form-control" placeholder="Topik" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Mulai</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_mulai" class="form-control" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Akhir</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tgl_akhir" class="form-control" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Deskripsi</label>
					<div class="col-sm-4">
						<input type="textarea" name="deskripsi" class="form-control" placeholder="Deskripsi" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">file</label>
					<div class="col-sm-4">
						<input type="file" name="file" class="form-control" placeholder="File" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">STATUS</label>
					<div class="col-sm-2">
						<select name="status" class="form-control" required>
							<option value="">STATUS</option>
							<option value="1">AKTIF</option>
							<option value="2">TIDAK AKTIF</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">KUOTA</label>
					<div class="col-sm-2">
						<select name="kuota" class="form-control" required>
							<option value="">STATUS</option>
							<option value="1">TERSEDIA</option>
							<option value="2">TIDAK TERSEDIA</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						<a href="materipelatihan.php" class="btn btn-warning">BATAL</a>
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
include("includes/scripts.php");
include("includes/footer.php");
    ?>