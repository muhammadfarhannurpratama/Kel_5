<?php 
session_start();
//koneksi database
include '../koneksi.php';

if(!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda Harus Login !');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>
<!-- query hapus -->
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotoproduk=$pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk"))
{
	unlink("../foto_produk/$fotoproduk");

}	

$koneksi->query("DELETE FROM produk WHERE id_Produk='$_GET[id]'");

echo "<script>alert('Produk Terhapus');</script>";
echo "<script>location='produk.php';</script>";


?>