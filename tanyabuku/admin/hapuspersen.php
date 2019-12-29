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

<?php 

$ambil=$koneksi->query("SELECT * FROM persen_laba WHERE no='$_GET[id]'");
$pecah=$ambil->fetch_assoc();	

$koneksi->query("DELETE FROM persen_laba WHERE no='$_GET[id]'");

echo "<script>alert('Data Telah Terhapus');</script>";
echo "<script>location='listpersen.php';</script>";


?>	