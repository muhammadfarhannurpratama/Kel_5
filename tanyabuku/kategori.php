<?php 
session_start();
include 'koneksi.php'
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
</head>

  <body>
  <?php include 'navbar.php'; ?>\
  <div class="container">
    <div class="row">
        <!-- katergori -->
        <div class="col-3">
          <h3>Kategori</h3>
            <ul id="ul-hitam">
                <li>aksi</li>
                <li>acak</li>
                <li>komik</li>
                <li>blabla</li>
            </ul>
        </div>

        <!-- daftar buku -->
        <div class="col-9">
        <h3>Daftar Buku</h3>
        <section id="get-started" class="padd-section text-center wow fadeInUp">
                <div class="row">
                    <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                    <?php while($perproduk=$ambil->fetch_assoc()){ ?>
                    <div class="col-md-3">
                    <div class="">
                        <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" class="container-fluid">
                        <div class="caption">
                        <h4><?php echo $perproduk['nama_produk']; ?></h4>
                        <h5><?php echo number_format($perproduk['harga_produk']); ?></h5>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default" style="color: black">Beli</a>
                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default" style="color: black">Detail</a>              
                        </div>
                    </div>
                    </div>
                    <?php } ?>


                </div>

        </section>
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