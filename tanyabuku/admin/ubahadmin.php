<h2>Ubah Admin</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>
 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Username</label>
 		<input type="text" name="user" class="form-control" value="<?php echo $pecah['username']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Password</label>
 		<input type="number" name="pass" class="form-control" value="<?php echo $pecah ['password']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Nama Lengkap</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah ['nama_lengkap']; ?>">	
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>
 <?php 
if (isset($_POST['ubah']))
{

		$koneksi->query("UPDATE admin SET username='$_POST[user]',
			password='$_POST[pass]',nama_lengkap='$_POST[nama]'
			WHERE id_admin='$_GET[id]'");

	echo "<script>alert('Data Admin Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=tambahadmin';</script>";


}
	
  ?>
