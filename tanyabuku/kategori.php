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
  <header id="header" class="header header-hide">
    <div class="container" style="">
      <div id="logo" class="pull-left">
        <!-- <h1><a href="index.php" class="scrollto"><span>T</span>anya<span>B</span>uku</a></h1> -->

        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.php"><img src="ico30.png" alt="" title="tanyabuku" /></a>
      </div>

      <?php include 'navbar.php'; ?>

<!-- #nav-menu-container -->
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="checkout.php">Checkout</a></li>
<!--jika sudah login (ada SESSION pelanggan)-->
          <?php if (isset($_SESSION['pelanggan'])): ?>
            <li><a href="history.php">History</a></li>
            <li><a href="logout.php">Logout</a></li>
<!--jika belum login ( belum ada SESSION pelanggan)-->
      <?php else :  ?>
      <li class="menu-has-children"><a href="">Daftar</a>
            <ul>
              <li><a href="daftar.php">Daftar</a></li>
              <li><a href="login.php">Masuk</a></li>
            </ul>
          </li> 
          <?php endif ?>          
        </ul>
      </nav>
    </div>
  </header>
  <br><br><br><br><br>
  <div class="container">
    <div class="row">
        <div class="col-3"></div>
<!-- daftar buku -->
        <div class="col-9">
        <br><br><br>
        <form action="">
        <section id="get-started" class=" text-center wow fadeInUp">
                <div class="row">
                    <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                    <?php while($perproduk=$ambil->fetch_assoc()){ ?>
                    <div class="col-md-3">
                      <div class="box">
                         <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                        <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" height="200" width="140"
                        style="color: black">
                        </a>                          
                        <div class="caption"> <br>
                        <h4><?php echo $perproduk['nama_produk']; ?></h4> <br>
                        <h5>Harga: <?php echo number_format($perproduk['harga_produk']); ?></h5>                     
                        </div>
                        <br>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="beli btn btn-outline-success" style=" font-size: 14px;">Beli</a>       
                      </div>
       
                    </div>
                    <?php } ?>
                </div>
        </section>
        </form>
            <h3 class="buku">Daftar Buku</h3>
        </div>
    </div>
  </div>
<!-- kategori -->
  <div class="daftar">
                <form class="" action="kategoritampung.php" method="get">
                      <div class="kategori">
                        <select class="" name="kategori" onchange="this.form.submit();">
                          <option value="" class="option1"><h3>Pilih Kategori</h3></option>
                          <?php 
                            $ambil=$koneksi->query("SELECT * FROM kategori");
                            while($perkategori=$ambil->fetch_assoc()){
                          ?>                        
                            <option  value="<?php echo $perkategori['nama_kategori'] ?>">
                            <?php echo $perkategori['nama_kategori'] ?></option>
                            
                          <?php } ?>
                        </select>
                      </div>        
                </form>
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