<?php 
session_start();
include 'koneksi.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login Pelanggan</title>
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
</head>

<body class="body3">

  <?php include 'navbar.php'; ?>
  <br>
  <br>
  <br>

  <div class="container">
  	<div class="row">
      <div class="col-lg-4"></div>
  		<div class="col-lg-4">
        <br><br><br>
  			<div class="container box3">
  				<div class="panel-heading">
  					<h3 class="panel-title"><center>Login Pelanggan</center></h3>
  					<br>

  				</div>
  				<div class="panel-body">
  					<form method="post">
  						<div class="form-group">
  							<label>Email</label>
  							<input type="email" class="form-control" name="email">
  						</div>
  						<div class="form-group">
  							<label>Password</label>
  							<input type="password" class="form-control" name="password">
  						</div>
                <div>
                  <center>
                  <button class="btn btn-primary tomb" name="login" style="margin-right: 120px">Masuk</button> 
                  <a class="btn btn-primary tomb" href="daftar.php" role="button">Daftar</a>
                  
                  </center>
                </div>
  					</form>
  				</div>
  			</div>
      </div>
      <div class="col-lg-4"></div>
  	</div>
  </div>
<!--sinkron database email pengguna -->
  <?php  
  if (isset($_POST['login']))
  {
  	$email=$_POST['email'];
  	$password=$_POST['password'];
  	//query cek sesuai di database
  	$ambil=$koneksi->query("SELECT * FROM pelanggan 
  		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

  	//mencari akun di db
  	$akunyangcocok=$ambil->num_rows;

  	if ($akunyangcocok==1)
  	{
  		//sukses login
  		//mendapatkan akun dalam bentuk array
  		$akun=$ambil->fetch_assoc();
  		//login di session pelanggan
  		$_SESSION['pelanggan'] = $akun;
  		echo "<script>alert('Login Sukses !');</script>";

      //jika sudah ATC
      if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) 
      {
        echo "<script>location='checkout.php';</script>";
      }
      else
      {
        echo "<script>location='history.php';</script>"; 
      }
  		

  	}
  	else 
  	{
  		//gagal login
  		echo "<script>alert('Login Gagal, Periksa Kembali Akun Anda !');</script>";
  		echo "<script>location='login.php';</script>";
  	}
  }

  ?>


  <!-- JavaScript Libraries -->
  <script src="admin/assetss/lib/jquery/jquery.min.js"></script>
  <script src="admin/assetss/lib/jquery/jquery-migrate.min.js"></script>
  <script src="admin/assetss/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin/assetss/lib/superfish/hoverIntent.js"></script>
  <script src="admin/assetss/lib/superfish/superfish.min.js"></script>
  <script src="admin/assetss/lib/easing/easing.min.js"></script>
  <script src="admin/assetss/lib/modal-video/js/modal-video.js"></script>
  <script src="admin/assetss/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="admin/assetss/lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="admin/assetss/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="admin/assetss/js/main.js"></script>

</body>
</html>
