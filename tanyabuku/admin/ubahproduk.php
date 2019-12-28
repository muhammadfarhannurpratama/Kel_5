<h2>Ubah Produk</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>
 <form method="post" name="autoCalForm" enctype="multipart/form-data">
	<div class="col-sm-3">
	<div class="form-group">
		<label>Judul Buku</label>
		<input type="text" class="form-control" name="nama_produk">
	</div>
	<div class="form-group">
		<label>Harga Beli</label>
		<input class="form-control" type='number' name='harga_beli'    onFocus="startCalc();" onBlur="stopCalc();" />	
	</div>
	 <div class="form-group">
		<label>Laba</label>
		<input class="form-control" readonly type=text value='0' name="laba"  readonly>	
	</div>
	<div class="form-group">
		<label>Harga Jual</label>
		<input class="form-control" readonly type=text value='0' name="harga_jual"  readonly>	
	</div>
	<div class="form-group">
		<input type='hidden' name='persen'   readonly="" value="<?php echo $pecah['persen']; ?>"	  size='23'   onFocus="startCalc();" onBlur="stopCalc();" />	
	</div>
	<div class="form-group">
		<input type='hidden' name="pembagian"   readonly="	" value="100"  onFocus="startCalc();" onBlur="stopCalc();"  />	
	</div>
	<div class="form-group">
		<label>Berat (gr)</label>
		<input type="number" class="form-control" name="Berat">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="Stok" min="1">
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
 		<label>Pengadaan Barang</label>
 		<select class="form-control" name="Barang">
 			<option><?php echo $pecah['pengadaan_barang']; ?></option>
 			<option value="Suppliyer">Suppliyer</option>
 			<option value="Konsinyasi">Konsinyasi</option>
 		</select>
 	</div>
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

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_jual='$_POST[harga_jual]',berat='$_POST[berat]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]',nama_kategori='$_POST[kategori]',pengadaan_barang='$_POST[Barang]',harga_beli='$_POST[harga_beli]',laba='$_POST[laba]',persen='$_POST[persen]'
			WHERE id_produk='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
			harga_jual='$_POST[harga_jual]',berat='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]',nama_kategori='$_POST[kategori]',pengadaan_barang='$_POST[Barang]',harga_beli='$_POST[harga_beli]',laba='$_POST[laba]',persen='$_POST[persen]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Data Produk Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";

}
  ?>

  <script><!-- 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoCalForm.harga_beli.value;
two = document.autoCalForm.persen.value; 
three = document.autoCalForm.pembagian.value; 
four = document.autoCalForm.laba.value = (one * 1) * (two * 1) / (three * 1);

document.autoCalForm.harga_jual.value = (one * 1) + (four * 1);}

function stopCalc(){
clearInterval(interval);}
</script>
<!-- <form method="post" name="autoCalForm" enctype="multipart/form-data">
	<div class="form-group">
		<label>Harga Beli</label>
		<input class="form-control" type='number' name='harga_beli'  value="<?php echo $pecah['harga_beli']; ?>"  onFocus="startCalc();" onBlur="stopCalc();" />	
	</div>
	 <div class="form-group">
		<label>Laba</label>
		<input class="form-control" readonly type=text value='0' name="laba"  readonly>	
	</div>
	<div class="form-group">
		<label>Harga Jual</label>
		<input class="form-control" readonly type=text value='0' name="harga_jual"  readonly>	
	</div>
	<div class="form-group">
		<input type='hidden' name='persen'   readonly="" value="<?php echo $pecah['persen']; ?>"	  size='23'   onFocus="startCalc();" onBlur="stopCalc();" />	
	</div>
	<div class="form-group">
		<input type='hidden' name="pembagian"   readonly="	" value="100"  onFocus="startCalc();" onBlur="stopCalc();"  />	
	</div> -->
