<h2>Tambah Produk</h2>
<div class="kotak2">
<div class="container">
<div class="row">
<form method="post" enctype="multipart/form-data">
<div class="col-sm-6">
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
</div>
<div class="col-sm-6">
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
		(nama_produk,harga_produk,berat,foto_produk,deskripsi_produk,stok_produk,nama_kategori)
		VALUES('$_POST[Nama]','$_POST[Harga]','$_POST[Berat]','$nama','$_POST[Deskripsi]','$_POST[Stok]','$_POST[Kategori]')");

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
</div>
</div>
</div>