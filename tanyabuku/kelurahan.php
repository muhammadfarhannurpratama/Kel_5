<?php 
include 'koneksi.php';

$kecamatan_id=$_POST['kecamatan_id'];
$sql_kelurahan=$koneksi->query("SELECT * FROM kelurahan WHERE id_kec = $kecamatan_id");

echo '<option>Pilih Kelurahan</option>';
while($row_kelurahan = mysqli_fetch_array($sql_kelurahan)){
	echo '<option value="'.$row_kelurahan['id_kel'].'">'.$row_kelurahan['nama'].'</option>';
}
 ?>
