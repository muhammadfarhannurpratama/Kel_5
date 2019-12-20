<?php 
session_start();
include 'koneksi.php';

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
	WHERE pembelian.id_pembelian ='$id_pembelian'");
$detailbayar = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detailbayar);
// echo "</pre>";

// jika tidak ada data pembayaran
if (empty($detailbayar)) 
{
	echo "<script>alert('gagal !');</script>";
   	echo "<script>location='history.php';</script>";
   	exit();
}

// jika data pelanggan yg bayar tidak sesuai dengan yg login
if ($_SESSION['pelanggan']['id_pelanggan']!==$detailbayar['id_pelanggan']) 
{
	echo "<script>alert('gagal !');</script>";
   	echo "<script>location='history.php';</script>";
   	exit();
}
//if belum login, maka masuk login.php 
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan']))
{
   echo "<script>alert('Silahkan Login !');</script>";
   echo "<script>location='login.php';</script>";
   exit();
}
?>

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>History Pembayaran</title>
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
  <script src="js/jquery-3.4.1.min.js"></script>

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <?php include 'navbar.php'; ?>

  <br>
  <br>
  <br>
  <br>

  <div class="container">
  	<h3>History Pembayaran</h3><br>
  	<div class="row">
  		<div class="col-md-6">
  			<table class="table">
  				<tr>
  					<th>Nama</th>
  					<td><?php echo $detailbayar['nama']; ?></td>
  				</tr>
  				<tr>
  					<th>Bank</th>
  					<td><?php echo $detailbayar['bank']; ?></td>
  				</tr>
  				<tr>
  					<th>Tanggal</th>
  					<td><?php echo $detailbayar['tanggal']; ?></td>
  				</tr>
  				<tr>
  					<th>Jumlah</th>
  					<td>Rp. <?php echo number_format($detailbayar['jumlah']); ?></td>
  				</tr>
  			</table>
  		</div>
  		<div class="col-md-6">
  			<img src="bukti_pembayaran/<?php echo $detailbayar['bukti']; ?>" alt="" class="img-responsive">
  			
  		</div>
  	</div>
  </div>

  

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
<script>
    $(document).ready(function(){      
        $('.nav-buku').hide();
        $('.nav-test').hide();
        $('.nav-about').hide();
    });
</script>