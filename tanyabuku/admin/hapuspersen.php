<?php 

$ambil=$koneksi->query("SELECT * FROM persen_laba WHERE no='$_GET[id]'");
$pecah=$ambil->fetch_assoc();	

$koneksi->query("DELETE FROM persen_laba WHERE no='$_GET[id]'");

echo "<script>alert('Persen Laba Terhapus');</script>";
echo "<script>location='index.php?halaman=listpersen';</script>";


?>	