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
$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$pecah=$ambil->fetch_assoc();	

$koneksi->query("DELETE FROM admin WHERE id_admin='$_GET[id]'");
echo "<script>alert('Admin Terhapus');</script>";
echo "<script>location='tambahadmin.php';</script>";


?>
