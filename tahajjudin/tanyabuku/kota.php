<?php include 'koneksi.php';

$prov_id=$_POST['prov_id'];
$sql_kota=$koneksi->query("SELECT * FROM kota WHERE id_prov = $prov_id");

echo '<option>Pilih Kota</option>';
while($row_kota = mysqli_fetch_array($sql_kota)){
	echo '<option value="'.$row_kota['id_kabkot'].'">'.$row_kota['nama_kabkot'].'</option>';
}
 ?>
