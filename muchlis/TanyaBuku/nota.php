<?php 
$koneksi=new mysqli("localhost","root","","db_tanyabuku");
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Nota Pembelian</title>
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
              <li><a href="#">Daftar</a></li>
              <li><a href="login.php">Masuk</a></li>
            </ul>
          </li> 
          <?php endif ?>          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>

  <!--mulai coding-->

  <section class="konten">
  	<div class="container">
  		

 	<!-- nota copas dari admin-->
 	
<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
 ?>
 <br>
 <br>
 <br>

 <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
 <p>
 	<?php echo $detail['telepon_pelanggan']; ?> <br>
 	<?php  echo $detail['email_pelanggan']; ?>
 </p>

 <p>
 	Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
 	Total	: <?php echo number_format($detail['total_pembelian']); ?>
 </p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk
		WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>


<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
				<strong>KE NOMOR REKENING DI BAWAH INI :</strong> <br>
				<strong>BANK BCA : 123-444-000-321 A/N. TANYA BUKU</strong>
			</p>
		</div>
	</div>
</div>  		

  	</div>
  </section>
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