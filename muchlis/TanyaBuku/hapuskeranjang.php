<?php 
session_start();
$id_produk=$_GET['id'];
unset($_SESSION['keranjang'][$id_produk]);

echo "<script>alert=('Produk Telah Terhapus !');</script>";
echo "<script>location='keranjang.php';</script>";
 ?>