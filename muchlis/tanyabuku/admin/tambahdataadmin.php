<h2>Tambah Admin</h2>

<form method="post" enctype="multipart/form-data">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="Username">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="Password">
	</div>
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" class="form-control" name="nama_lengkap">
	</div>
	<button class="btn btn-primary" name="save"> SIMPAN </button>
</form>
<?php 
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO admin(Username,Password,nama_lengkap)VALUES('$username','password','nama_lengkap')");

	echo "<div class='alert alert-info'>Data Tersimpan !</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tambahadmin'>";
}
 ?>
