<?php 
include("koneksiuser.php");
include("userfunc.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container">
		<div class="content">
			<h2>Materi Pelatihan</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['id_topik'];
				$cek = mysqli_query($koneksi, "SELECT * FROM topik_pelatihan WHERE id_topik='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM topik_pelatihan WHERE id_topik='$id'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			}
			?>
			<label>Tambah Materi Pelatihan :</label>
			<a href="materipelatihanadd.php" class="btn btn-primary">Tambah</a>
			<br>
			<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
						
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>NO</th>
					<th>ID Topik</th>
					<th>Topik</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Akhir</th>
					<th>Deskripsi</th>
					<th>File</th>
					<th>Status</th>
					<th>Kuota</th>
					<th>Setting</th>
				</tr>
				<?php
				if($urut){
					$sql = mysqli_query($koneksi, "SELECT * FROM topik_pelatihan WHERE status='$urut' ORDER BY id_topik ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM topik_pelatihan ORDER BY id_topik ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id_topik'].'</td>
							<td>'.$row['topik'].'</td>
							<td>'.$row['tgl_mulai'].'</td>
							<td>'.$row['tgl_akhir'].'</td>
							<td>'.$row['deskripsi'].'</td>
							<td>'.$row['file'].'</td>
							<td>';
							if($row['status'] == 1){
								echo '<span class="btn btn-success">Aktif</span>';
							}else{
								echo '<span class="btn btn-danger">Tidak Aktif</span>';
							}
							
						echo '
							</td>
							<td>';
							if($row['kuota'] == 1){
								echo '<span class="btn btn-success">Tersedia</span>';
							}else{
								echo '<span class="btn btn-danger">Tidak Tersedia</span>';
							}
							
						echo '
							</td>

							<td>
								<a href="materipeltihan.php?home=profileuser&id_user=" title="Lihat Detail"><i class="fas fa-list"></i></a>
								<a href="materipelatihanedit.php?id_user='.$row['id_topik'].'" title="Rubah Data"><i class="fas fa-edit"></i></a>
								<a href="materipelatihan.php?aksi=delete&id_topik='.$row['id_topik'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><i class="fas fa-trash-alt"></i></a>
								</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>
<!-- 
	<a href="password.php?id_user='.$row['id_topik'].'" title="Foto Profile"><i class="fas fa-camera-retro"></i></a>
								<a href="avatar.php?id_user='.$row['id_topik'].'" title="Ganti Password"><i class="fas fa-key"></i></a>
-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<?php
include("includes/scripts.php");
include("includes/footer.php");
?>
