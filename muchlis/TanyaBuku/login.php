<?php 
session_start();
$koneksi=new mysqli("localhost","root","","db_tanyabuku");

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

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto"><span>T</span>anya<span>B</span>uku</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="#about-us">About</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#screenshots">Testimoni</a></li>
          <li><a href="#team">Best Seller</a></li>
          <li><a href="checkout.php">Checkout</a></li>
          <!--jika sudah login (ada SESSION pelanggan)-->
          <?php if (isset($_SESSION['pelanggan'])): ?>
          	<li><a href="logout.php">Logout</a></li>
          <!--jika belum login ( belum ada SESSION pelanggan)-->
		  <?php else :  ?>
		  <li class="menu-has-children"><a href="">Daftar</a>
            <ul>
              <li><a href="registrasi_user.php">Daftar</a></li>
              <li><a href="login.php">Masuk</a></li>
            </ul>
          </li>	
      	  <?php endif ?>          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
  <br>
  <br>
  <br>

  <div class="container">
  	<div class="row">
  		<div class="col-md-4">
  			<div class="panel panel-default">
  				<div class="panel-heading">
  					<h3 class="panel-title">Login Pelanggan</h3>
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
  						<button class="btn btn-primary" name="login">Masuk</button>
  					</form>
  				</div>
  			</div>
  		</div>
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
  		echo "<script>location='checkout.php';</script>";

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
