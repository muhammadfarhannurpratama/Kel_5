<?php 
session_start();
// keluar SESSION ['pelanggan']
session_destroy();

echo "<script>alert('Logout Berhasil !');</script>";
echo "<script>location='index.php';</script>";

 ?>