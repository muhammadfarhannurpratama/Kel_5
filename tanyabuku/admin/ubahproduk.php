<h2>Ubah Produk</h2>
<div class="kotak2">
<div class="row">
<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>
	<form method="post" enctype="multipart/form-data">	
	<div class="col-sm-3">
		<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
		</div>
		<div class="form-group">
			<label>Harga (Rp)</label>
			<input type="number" name="harga" class="form-control" value="<?php echo $pecah ['harga_produk']; ?>">
		</div>
		<div class="form-group">
			<label>Berat (gr)</label>
			<input type="number" name="berat" class="form-control" value="<?php echo $pecah ['berat']; ?>">	
		</div>
		<div class="form-group">
			<label>Stok</label>
			<input type="number" name="stok" class="form-control" min="1" max="999" value="<?php echo $pecah ['stok_produk']; ?>">	
		</div>
	</div>
	<div class="col-sm-3">
		<div class="form-group">
			<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100">
		</div>
		<div class="form-group">
		<label class="fa fa-camera" for="buktitrans"> Upload Bukti Bayar (Gambar Maks 5Mb) </label>
		<div class="input-icon">
		<input type="hidden" name="bukti">
		<input id="foto_transaksi" name="foto" type="file" required>
		<p class="foto_transaksi" style="color: red;"></p>
		</div> 
		<div class="form-group">
			<label>Kategori Produk</label>
			<select class="form-control" name="kategori">
				<option value="">Pilih Status</option>
				<?php 
					$ambil=$koneksi->query("SELECT * FROM kategori");
					while($perkategori=$ambil->fetch_assoc()){
				?>
				<option value="<?php echo $perkategori['nama_kategori'] ?>">
					<?php echo $perkategori['nama_kategori'] ?>
				</option>
				<?php } ?>
			</select>
		</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Deskripsi</label>
			<textarea name="deskripsi" class="form-control" rows="10">
				<?php echo $pecah['deskripsi_produk']; ?>
			</textarea>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
		<div class="btn-panjang">
		<button class="btn btn-primary" name="ubah">Ubah</button>
		</div>
		</div>
	</div>
	</form>
 <?php 
if (isset($_POST['ubah']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	// jika foto dirubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]',berat='$_POST[berat]',
			foto_produk='$namafoto',nama_kategori='$_POST[kategori]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]'
			WHERE id_produk='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_produk='$_POST[harga]',berat='$_POST[berat]',nama_kategori='$_POST[kategori]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Data Produk Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
  ?>
  </div>