<?php include 'koneksi.php';

$kabupaten_id=$_POST['kabupaten_id'];
$sql_kecamatan=$koneksi->query("SELECT * FROM kecamatan WHERE id_kabkot = $kabupaten_id");

echo '<option>Pilih Kecamatan</option>';
while($row_kecamatan = mysqli_fetch_array($sql_kecamatan)){
	echo '<option value="'.$row_kecamatan['id_kec'].'">'.$row_kecamatan['nama_kec'].'</option>';
}
 ?>
