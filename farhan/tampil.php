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
<?php 
//menyisipkan file tes.php di sini
include('2.php');
 
//syntax di bawah adalah isi dari file index.php
echo "Belajar Include dan Require di www.malasngoding.com";
?>
<br>

<h1>Kembali Ke Form Awal</h1>
untuk penanganan form, klik
<a href="index.php"> disini </a>