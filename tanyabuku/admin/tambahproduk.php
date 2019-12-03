<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Judul Buku</label>
		<input type="text" class="form-control" name="Nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="Harga">
	</div>
	<div class="form-group">
		<label>Berat (gr)</label>
		<input type="number" class="form-control" name="Berat">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="Stok" min="1">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="Deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save"> SIMPAN </button>
</form>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_produk,berat,foto_produk,deskripsi_produk,stok_produk)
		VALUES('$_POST[Nama]','$_POST[Harga]','$_POST[Berat]','$nama','$_POST[Deskripsi]'.'$_POST[Stok]')");

	echo "<div class='alert alert-info'>Data Tersimpan !</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>
