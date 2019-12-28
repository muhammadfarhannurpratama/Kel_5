<h2>Persen Laba</h2>

<h3>Pilih Persen Laba yang akan digunakan toko</h3>
<form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Pilih Persen Laba Yang Akan Digunakan Toko</label><br>
 			<input type="radio" name="persen" value="10">10% <br>
			<input type="radio" name="persen" value="20">20% <br>
			<input type="radio" name="persen" value="30">30% <br>
			<input type="radio" name="persen" value="40">40% <br>
			<input type="radio" name="persen" value="50">50% <br>
			<input type="radio" name="persen" value="60">60% <br>
			<input type="radio" name="persen" value="70">70% <br>	
 	</div>
 	<button class="btn btn-primary" name="simpan">Simpan</button>

 	<button class="btn btn-info"  name="list">Lihat List Persen</button>
 </form>
 <?php 
if (isset($_POST['simpan']))
{
	$persennya=$_POST['persen'];

		$koneksi->query("INSERT INTO persen_laba (persen) VALUES ('$persennya')");

	echo "<div class='alert alert-info'>Data Tersimpan !</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=listpersen'>";

}
elseif (isset($_POST['list'])) 
{
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=listpersen'>";
}
	
  ?>