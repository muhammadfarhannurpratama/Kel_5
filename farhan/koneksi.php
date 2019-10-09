<?php
// koneksi DB 
$host = "localhost";
$user = "root";
$password = "";
$database = "tanya_buku";

$koneksi = mysqli_connect($host, $user, $password, $database);

if($koneksi->connect_error){
    die("koneksi gagal: " .$koneksi->connect_error);
}
echo "Koneksi Berhasil";
?>