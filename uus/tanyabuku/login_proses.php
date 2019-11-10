<?php 
$koneksi = mysqli_connect("localhost", "root", "", "login");

if(isset($_POST[ 'submit']))
{
    // $errors = array();
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);

    if (empty($username) && empty($password))
    {
        echo "<script languange='javascript'>alert('isikan username dan password'); location.replace('index.php')</script>";
    }
    elseif(empty($username))
    {
        echo "<script languange='javascript'>alert('isikan username'); location.replace('index.php')</script>"; 
    }
    elseif(empty($password))
    {
        echo "<script languange='javascript'>alert('isikan password'); location.replace('index.php')</script>"; 
    }
    $sql = "SELECT * FROM tb_login WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0)
    {
        if (password_verify($password, $data['password']))
        { 
            echo "<script>alert('login berhasil');location.replace('home.php')</script>";
        }else{
            echo "<script>alert('maaf password anda salah'); location.replace('login.php')</script>";
        }
    }else{
        echo "<script>alert('maaf username anda tidak terdaftar'); location.replace('login.php')</script>";
}

}
?>