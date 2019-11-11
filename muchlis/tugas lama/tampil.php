<?php
// menangkap data nama dengan method nama
$nama = $_GET['nama'];
// menangkap data usia dengan method nama
$usia = $_GET['usia'];
 
// menampilkan data nama
echo "Nama anda adalah " . $nama;
echo "<br/>";
// menampilkan data usia
echo "Usia anda adalah " . $usia;
?>
<br>
<br>
untuk kembali ke menu utama, klik
<a href="index.php"> disini </a>
<br>
<h1>ISI FILE php1.php</h1>
<?php 
//menyisipkan file tes.php di sini
include('php1.php');
 
//syntax di bawah adalah isi dari file index.php
echo "Belajar Include() dan Require() di www.malasngoding.com";
?>
