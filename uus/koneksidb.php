<?php
// koneksi DB 
$host = "localhost";
$user = "root";
$password = "";
$database = "malasngoding";

$koneksi = mysqli_connect($host, $user, $password, $database);

if($koneksi->connect_error){
    die("koneksi gagal: " .$koneksi->connect_error);
<?php 
 
$koneksi = mysqli_connect("localhost","root","","malasngoding");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
echo "Koneksi Berhasil";
 
?>