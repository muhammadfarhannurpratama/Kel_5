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

<?php 

$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();	

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('Pelanggan Terhapus');</script>";
echo "<script>location='pelanggan.php';</script>";


?>