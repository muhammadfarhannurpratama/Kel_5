<?php 
session_start();
include '../koneksi.php';
//mendapatkan id produk dari url
$id_produk=$_GET['id'];

//if sudah ada produk tsb di keranjang maka +1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
//else kehitung 1
else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}

//pindah ke halaman keranjang
echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja')</script>";
echo "<script>location='keranjang.php'</script>";
 ?>