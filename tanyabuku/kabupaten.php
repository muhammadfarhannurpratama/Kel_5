<?php include 'koneksi.php';

$prov_id=$_POST['prov_id'];
$sql_kabupaten=$koneksi->query("SELECT * FROM kabupaten WHERE id_prov = $prov_id");

echo '<option>Pilih Kabupaten</option>';
while($row_kabupaten = mysqli_fetch_array($sql_kabupaten)){
	echo '<option value="'.$row_kabupaten['id_kab'].'">'.$row_kabupaten['nama'].'</option>';
}
 ?>
