<?php 

require "koneksi.php";
    
    if(isset($_POST['kirim'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
        $bulan = mysqli_real_escape_string($koneksi, $_POST['bulan']);
        $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
        $jenkel = mysqli_real_escape_string($koneksi, $_POST['jenkel']);
        password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tb_login VALUES ('', '$nama', '$password', '$email', '$tahun-$bulan-$tanggal', '$jenkel')";
        mysqli_query($koneksi, $sql);
        if(mysqli_num_rows($koneksi)>0){
            header('Location:login.php');
            exit;
        }else{
            echo "Gagal";
            header('Location:pendaftarancoba.php');
        }
    }

?>