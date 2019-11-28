<h2>Tambah Admin</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Username</label>
		<input type="email" class="form-control" name="user">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="Password" class="form-control" name="pass">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	
	<button class="btn btn-primary" name="save"> SIMPAN </button>
</form>
<?php 
if (isset($_POST['save']))
{
		$koneksi->query("INSERT INTO admin
		(username,password,nama_lengkap)
		VALUES('$_POST[user]','$_POST[pass]','$_POST[nama]')");

	echo "<script>alert('Data Tersimpan');</script>";
 	echo "<script>location='index.php?halaman=tambahadmin';</script>";
}
 ?>
