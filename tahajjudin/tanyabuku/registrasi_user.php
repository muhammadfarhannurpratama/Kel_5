<?php 
session_start();
include 'koneksi.php';

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Regsitrasi Pelanggan</title>
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
      <div class="col-lg-4"></div>
  		<div class="col-lg-4">
  			<div class="panel panel-default container box">
  				<div class="panel-heading">
  				<center>	<h3 class="panel-title">Registrasi Pelanggan</h3> </center>
  					<br>

  				</div>
  				<div class="panel-body">
  					<form method="post">
  						<div class="form-group">
  							<label>Email</label>
  							<input type="email" class="form-control" name="email_pelanggan">
  						</div>
  						<div class="form-group">
  							<label>Password</label>
  							<input type="password" class="form-control" name="password_pelanggan">
  						</div>
  						<div class="form-group">
  							<label>Nama</label>
  							<input type="nama_pelanggan" class="form-control" name="nama_pelanggan">
  						</div>
  						<div class="form-group">
  							<label>Telepon</label>
  							<input type="number" class="form-control" name="telepon_pelanggan">
  						</div>
              <div class="form-group">
                <label>Provinsi</label>
                <input type="provinsi" class="form-control" name="provinsi">
              </div>
  						<div class="form-group">
  							<label>Kota</label>
  							<input type="kota" class="form-control" name="kota">
  						</div>
  						<div class="form-group">
  							<label>Alamat</label>
  							<input type="alamat" class="form-control" name="alamat">
  						</div>
  						<div class="form-group">
  							<label>Kode Pos</label>
  							<input type="number" class="form-control" name="kode_pos">
  						</div>
  						<center><button class="btn btn-primary" name="save">Registrasi</button></center>
  					</form>
  				</div>
  			</div>
      </div>
      <div class="col-lg-4"></div>
  	</div>
  </div>
<!--sinkron database email pengguna -->
  <?php  
  if (isset($_POST['save']))
  {

  	//query cek sesuai di database
  	$koneksi->query("INSERT INTO pelanggan
    (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,provinsi,kota,alamat,kode_pos)
    VALUES('$_POST[email_pelanggan]','$_POST[password_pelanggan]','$_POST[nama_pelanggan]','$_POST[telepon_pelanggan]','$_POST[provinsi]','$_POST[kota]','$_POST[alamat]','$_POST[kode_pos]')");


  echo "<div class='alert alert-info'>Data Tersimpan !</div>";
  echo "<script>location='login.php';</script>";
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
