<?php
include('koneksiuser.php');
include('userfunc.php');
include('includes/header.php');
include('includes/navbar.php');
?>

	<div class="container">
		<div class="content">
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$id = $_GET['id_user'];
				$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
					if($delete){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			}
			?>
            <br>
<h2>MANAGEMENT USER</h2>
<br>
            <label >Tambah User :</label>
           <a href="useradd.php" class="btn btn-primary ml-2">Tambah</a>
		   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
Tambah Versi Modal</button>
<br>
			
			<?php  $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
			
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>NO.</th>
					<th>ID USER</th>
					<th>NAMA USER</th>
					<th>NOHP</th>
					<th>LEVEL</th>
					<th>USERNAME</th>
					<th>SETTING</th>
				</tr>
				<?php
				if($urut){
					$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status='$urut' ORDER BY id_user ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['id_user'].'</td>
							<td>'.$row['nama_user'].'</td>
							<td>'.$row['nohp_user'].'</td>
							<td>'.$row['level'].'</td>
							<td>'.$row['username'].'</td>
							<td>
								<a href="userprofile.php?id_user='.$row['id_user'].'" title="Lihat Detail"><i class="fas fa-list"></i></a>
								<a href="useredit.php?id_user='.$row['id_user'].'" title="Rubah Data"><i class="fas fa-edit"></i></a>
								<a href="user.php?aksi=delete&id_user='.$row['id_user'].'" title="Hapus Data" onclick="return confirm(\'Yakin?\')"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
                ?>
                <!--
                <a href="avatar.php?id_user='.$row['id_user'].'" title="Foto Profile"><i class="fas fa-camera-retro"></i></a>
				<a href="userpassword.php?id_user='.$row['id_user'].'" title="Ganti Password"><i class="fas fa-key"></i></a> -->
			</table>
			</div>
		</div>
    </div>

	<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
						<input type="text" name="username" class="form-control" placeholder="username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">PASSWORD</label>
					<div class="col-sm-9">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>