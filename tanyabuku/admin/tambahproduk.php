<h2>Tambah Produk</h2>
<?php $ambil=$koneksi->query("SELECT * FROM persen_laba"); ?>
<?php $pecah=$ambil->fetch_assoc();?>
<!-- <pre><?php echo print_r($pecah) ?></pre> -->
<div class="kotak2">
<div class="container">
<div class="row">
<form method="post" name="autoCalForm" enctype="multipart/form-data">
<div class="col-sm-6">
	<div class="form-group">
		<label>Judul Buku</label>
		<input type="text" class="form-control" name="Nama">
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
	<div class="form-group">
 		<label>Kategori Produk</label>
 		<select class="form-control" name="Kategori">
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
<div class="col-sm-6">
	<div class="form-group">
 		<label>Pengadaan Barang</label>
 		<select class="form-control" name="Barang">
 			<option value="">Pilih Status</option>
 			<option value="Suppliyer">Suppliyer</option>
 			<option value="Kos">Konsinyasi</option>
 		</select>
 	</div>
	
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="Deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
      <label class="fa fa-camera" for="buktitrans"> Upload Bukti Bayar (Gambar Maks 5Mb) </label>
      <div class="input-icon">
      <input type="hidden" name="bukti">
      <input id="foto_transaksi" name="foto" type="file" required>
      <p class="foto_transaksi" style="color: red;"></p>
	  </div> 
	</div>
</div>
	<div class="row">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
		<div class="btn-panjang">
		<button class="btn btn-primary" name="save"> SIMPAN </button>
		</div>
		</div>
	</div>
</form>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_jual,berat,foto_produk,deskripsi_produk,stok_produk,nama_kategori,pengadaan_barang,harga_beli,laba,persen_produk)
		VALUES('$_POST[Nama]','$_POST[harga_jual]','$_POST[Berat]','$nama','$_POST[Deskripsi]','$_POST[Stok]','$_POST[Kategori]','$_POST[Barang]','$_POST[harga_beli]','$_POST[laba]','$_POST[persen]')");

	echo "<div class='alert alert-info'>Data Tersimpan !</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>
  <script>
  $('#foto_transaksi').on('change',function(){
                    var filename = this.files[0].name.split('.').pop();
                    if ((this).files[0].size > 5000000) {
                      $('.foto_transaksi').text('Ukuran Gambar Yang Anda Upload Tidak Boleh Melebihi 5MB!');
                      var kel = $(this).val(null);
                    }else if(filename != 'jpeg' && filename != 'jpg' && filename != 'png'){
                      $('.foto_transaksi').text('Format Gambar Yang Anda Upload Tidak Benar!');
                      var kel = $(this).val(null);
                    }else{
                      $('.foto_transaksi').text('');
                    }

                    });
  </script>

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
</div>
</div>
</div>