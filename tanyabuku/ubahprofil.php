<?php 
session_start();
include 'koneksi.php'
 ?>

 <?php 
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>
 <!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tanya Buku Online Store</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="admin/assetss/img/favicon.png" rel="icon">
  <link href="admin/assetss/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="admin/assetss/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="admin/assetss/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/animate/animate.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="admin/assetss/css/style.css" rel="stylesheet">

   <!-- font -->
   <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
</head>

<body class=""><!-- 
	<pre><?php echo print_r($_SESSION) ?></pre> -->

  <?php include 'navbar.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="container">
          <div class="profil">
          <center>  <h3 class="">Profil Pelanggan</h3> </center>
          </div>
          <div class="box-profil">
            <form method="post">

              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>">
              </div>

              <div class="form-group">
                <label>Password</label>
                 <input type="password" name="pass" class="form-control" value="<?php echo $_SESSION['pelanggan']['password_pelanggan'] ?>">
              </div>

               <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
              </div>

              <div class="form-group">
                <label>Telepon</label>
                 <input type="number" name="telepon" class="form-control" value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
              </div>

           <div class="form-group">
                <label>Alamat</label>
                 <input type="text" name="alamat" class="form-control" value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>">
              </div>

            <center><button class="btn btn-primary" name="ubah">Ubah</button></center>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>

  <?php 
if (isset($_POST['ubah']))
{

		$koneksi->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',password_pelanggan='$_POST[pass]',nama_pelanggan='$_POST[nama]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]'
			WHERE id_pelanggan='$_GET[id]'");

	echo "<script> alert('Data Pelanggan Telah Diubah');</script>";

}
	
  ?>