<!-- penanganan form dengan method GET -->
<form method="get" action="tampil.php">
	<label>Masukkan Nama</label><br/>
	<input type="text" name="nama"><br/>
	<label>Masukkan Usia</label><br/>
	<input type="text" name="usia"><br/>	
	<input type="submit" value="oke">
</form>
<?php 
// menangkap data nama dengan method nama
$nama = $_GET['nama'];
// menangkap data usia dengan method nama
$usia = $_GET['usia'];
 
// menampilkan data nama
echo "Nama anda adalah " . $nama;
echo "<br/>";
// menampilkan data usia
echo "Usia anda adalah " . $usia;
?>

<?php 
// menangkap data nama dengan method nama
$nama = $_GET['nama'];
// menangkap data usia dengan method nama
$usia = $_GET['usia'];
 
// menampilkan data nama
echo "Nama anda adalah " . $nama;
echo "<br/>";
// menampilkan data usia
echo "Usia anda adalah " . $usia;
?>