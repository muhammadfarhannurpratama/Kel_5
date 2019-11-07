<?php 
$koneksi = mysqli_connect("localhost", "root", "", "login");

if(isset($_POST[ 'submit']))
{
    $errors = array();
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);

    if (empty($username) && empty($password))
    {
        echo "<script languange='javascript'>alert('isikan username dan password'); location.replace('index.php)</script>";
    }
    elseif(empty($username))
    {
        echo "<script languange='javascript'>alert('isikan username'); location.replace('index.php)</script>"; 
    }
    elseif(empty($password))
    {
        echo "<script languange='javascript'>alert('isikan password'); location.replace('index.php)</script>"; 
    }
}
?>