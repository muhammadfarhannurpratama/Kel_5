<?php 
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","db_tanyabuku");
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
$ambil=$koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script>alert('kategori Terhapus');</script>";
echo "<script>location='kategori.php';</script>";


?>
