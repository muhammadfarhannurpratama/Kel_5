<?php
// koneksiDB
$host = "localhost";
$user = "root";
$password = "";
$database = "belajar";
$koneksi = mysqli_connect($host, $user, $password, $database);
// $koneksi = mysqli_connect('localhost', 'root', '', 'belajar');

//ceck connection
if ($koneksi -> connect_error){
    die("koneksi gagal: " .$koneksi -> connect_error);
}
echo "Koneksi Berhasil";

?>