<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<table class="table table-hover table-bordered">
	<tr>
		<th>Judul</th>
		<th>Deskripsi</th>
		<th>Aksi</th>	
	</tr>
	<?php 
	include "koneksi.php";
	$query_mysql = mysql_query("SELECT * FROM `juduldashboard`")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
	<tr>
		
		<td><?php echo $data['judul']; ?></td>
		<td><?php echo $data['deskripsi']; ?></td>
		<td>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit">Edit</button>
		</td>
	</tr>
	<?php } ?>
</table>

<!-- Modal Edit -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Judul</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <!-- -->
	  <?php 
	include "koneksi.php";
	$query_mysql = mysql_query("SELECT * FROM juduldashboard")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
	<form action="updatejudul.php" method="post">		
		<table class="table table-hover table-bordered">
			<tr>
				<td>Judul</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
					<input class ="table table-hover table-bordered" type="text" name="judul" value="<?php echo $data['judul'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>Deskripsi</td>
				<td><input class ="table table-hover table-bordered" type="textarea" name="deskripsi" value="<?php echo $data['deskripsi'] ?>"></td>					
			</tr>	
			<tr>
				<td></td>
				<td><input class ="btn btn-primary" type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
	<?php } ?>
	<!-- -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>