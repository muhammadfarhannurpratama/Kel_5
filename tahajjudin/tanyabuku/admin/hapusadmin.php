<?php 

$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$pecah=$ambil->fetch_assoc();	

$koneksi->query("DELETE FROM admin WHERE id_admin='$_GET[id]'");

echo "<script>alert('admin Terhapus');</script>";
echo "<script>location='index.php?halaman=tambahadmin';</script>";


?>