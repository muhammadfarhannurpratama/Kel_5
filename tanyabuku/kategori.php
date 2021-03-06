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
  <!-- jqu -->
  <script src="admin/assetss/lib/jquery/jquery.min.js"></script>
</head>

<body class="body2">
   <?php include 'navbar.php'; ?>
<div class="container">
  <div class="row">
        <div class="col-sm-1"></div>
<!-- daftar buku -->
        <div class="col-sm-12">
        <br><br><br>
        <h3 class="judulbuku">Daftar Buku</h3>
        <br><br>
        <form action="">
        <section id="get-started" class=" text-center wow fadeInUp">
                <div class="row">
                     <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
          <div class="col-md-3">
                      <div class="box2">
                         <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                        <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" 
                        style="color: black">
                        </a>                          
                        <div class="caption"> <br>
                        <h4><?php echo $perproduk['nama_produk']; ?></h4> <br>
                        <h5>Harga: <?php echo number_format($perproduk['harga_jual']); ?></h5>                     
                        </div>
                        <br>
                        <strong><label style="font-size: 14px;" > Stok : <?php echo $perproduk['stok_produk'] ?> Buku</label></strong>    
                      </div>      
            </div>
        <?php } ?>


      </div>
    </div>
        </section>
        </form>
        </div>
    </div>
</div>
<br><br><br><br>







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
