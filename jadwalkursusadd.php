<?php
include("koneksiuser.php");
include("userfunc.php");
include("includes/header.php");
include("includes/navbar.php");
error_reporting(0);
?>

	<div class="container">
		<div class="content">
			<h2>Tambah Jadwal Pelatihan</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
				$id			= aman($_POST['no_jadwal']);
				$hari		= aman($_POST['hari']);
				$jam		= aman($_POST['jam']);
				$tanggal	= aman($_POST['tanggal']);
				$idtopik	= aman($_POST['idtopik']);
				$idmateri	= aman($_POST['idmateri']);
				
				//tinggal masalah database NIK dijadikan BIG INT
				$cek = mysqli_query($koneksi, "SELECT * FROM jadwal_kursus WHERE no_jadwal='$id'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO `jadwal_kursus`(`hari`, `jam`, `tanggal`, `id_topik`, `id_materi`) VALUES ('$hari','$jam','$tanggal','$idtopik','$idmateri')") or die(mysqli_error($koneksi));
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
					<label class="col-sm-3 control-label">Hari</label>
					<div class="col-sm-2">
						<select name="hari" class="form-control">
							<option value="">Hari</option>
							<option value="Senin">Senin</option>
							<option value="Selasa">Selasa</option>
							<option value="Rabu">Rabu</option>
							<option value="Kamis">Kamis</option>
							<option value="Jumat">Jumat</option>
							<option value="Sabtu">Sabtu</option>
							<option value="Minggu">Minggu</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">jam</label>
					<div class="col-sm-2">
						<input type="time" name="jam" class="form-control" placeholder="JAM">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-2">
						<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tanggal" class="form-control" placeholder="0000-00-00">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">id topik</label>
					<div class="col-sm-2">
						<select name="idtopik" class="form-control">
							<option value="">id</option>
							<?php 
							$sql_topik = mysqli_query($koneksi, "SELECT * FROM topik_kursus") or die
								(mysqli_error($koneksi));
								while($id_topik = mysqli_fetch_array($sql_topik)){
									echo '<center><option value="'.$id_topik['id_topik'].'">'.$id_topik['id_topik'].$id_topik['topik'].'</option></center>';
								}
							?>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">id Materi</label>
					<div class="col-sm-2">
						<select name="idmateri" class="form-control">
							<option value="">- ID -</option>
							<?php 
							$sql_topik = mysqli_query($koneksi, "SELECT * FROM materi_kursus") or die
								(mysqli_error($koneksi));
								while($id_topik = mysqli_fetch_array($sql_topik)){
									echo '<option value="'.$id_topik['id_materikursus'].'">'.$id_topik['id_materikursus'].$id_topik['materi_kursus'].'</option>';
								}
							?>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
						<a href="jadwalkursus.php" class="btn btn-warning">KEMBALI</a>
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
