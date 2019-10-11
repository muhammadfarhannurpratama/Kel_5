<?php
//koneksi DB
$host = "localhost";
$user = "root";
$password = "";
$database = "tanya buku";

$koneksi = mysqli_connect($host, $user, $password, $database);

//check connection
if ($koneksi ->connect_error) {
    die("koneksi gagal: " . $koneksi ->connect_error);
}
echo "koneksi berhasil";
?>