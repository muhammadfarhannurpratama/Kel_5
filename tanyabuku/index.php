<?php 
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","db_tanyabuku");
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

<body class="body2">

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto"><span>T</span>anya<span>B</span>uku</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
<!-- #nav-menu-container -->
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="#about-us">About</a></li>
          <li><a href="#team">Best Seller</a></li>
          <li><a href="#screenshots">Testimoni</a></li>
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
      </nav>
    </div>
  </header>

  <!--==========================Tampilan Awal============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <br>
      <h1>Selamat Datang di Tanya Buku Store</h1>
      <h2>Merupakan Situs Belanja Buku Online terUpdate & terPercaya..</h2>
      <img src="admin/assetss/img/logotanyabukupercobaan.png" alt="Hero Imgs">
      <a href="#video" class="btn-get-started scrollto">video</a>
      <br><br><br>
    </div>
  </section>

  <!--==========================Video============================-->
  <section id="video" class="text-center wow fadeInUp">
    <div class="overlay">
      <div class="container-fluid container-full">

        <div class="row">
          <a href="#" class="js-modal-btn play-btn" data-video-id="LjuXwpXQsy8"></a>
        </div>

      </div>
    </div>
  </section>

  <!--==========================About Us Section============================-->
  <section id="about-us" class="about-us padd-section wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-7 col-lg-9 ">
        <div class="about-content">
            <h2 class="text-center"><span>Tanya Buku</span> <br> Selamat Datang di Toko Doni </h2>
            <div class="">
              <center><img src="admin/assetss/img/img.jpg" alt="" width="640" height="360"></center>
            </div>
            <p class="">
              <h5 class="box">
              Toko Doni yang terletak di  Jalan R.A. Kartini No. 18, Patemon, Blindungan,Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68212, Indonesia. Telp: +62 332 422077. 
              Merupakan salah satu toko yang menjual berbagai jenis alat musik, alat olahraga, alat tulis, aksesoris, buku, seragam dan lain-lain. Pemilik Toko Doni adalah Bapak Hj. Ahmad Soekarno berumur 73 Tahun. 
              Toko Doni ini juga mempunyai karyawan sejumlah 53 orang.
            </h5>
            </p>
        </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================Get Started Section============================-->
  <section id="get-started" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2><b>Beberapa Buku</b> </h2>
        <p class="separator">terbaru dan best seller hanya di tanya buku..</p>

      </div>
    </div>

    
    <div class="container">
      <div class="row">

        <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()){ ?>
        <div class="col-md-3">
          <div class="feature-block">
            <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" class="container-fluid">
            <div class="caption">
              <h4><?php echo $perproduk['nama_produk']; ?></h4>
              <h5><?php echo number_format($perproduk['harga_produk']); ?></h5>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Beli</a>              
            </div>
          </div>
        </div>
        <?php } ?>


      </div>
    </div>

  </section>

  <!--==========================Team Section============================-->
  <section id="team" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2><b>Buku Best Seller</b></h2>
        <p class="separator">Beberapa Buku Best Seller di Tanya Buku Store..</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="admin/assetss/img/team/tahaj.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="https://www.instazu.com/profile/haroenmohammed"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Manager</span>
              <h4>Tahajjudin Fajri</h4>
            </div>
          </div>
        </div>

       <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="admin/assetss/img/team/2.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Pendodol Pecel</span>
              <h4>Markona</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="admin/assetss/img/team/3.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Pendodol Cupang</span>
              <h4>Cak Sugeng</h4>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="admin/assetss/img/team/4.jpg" class="img-responsive" alt="img">
            <div class="team-content">
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
              <span>Pendodol Kripik</span>
              <h4>Yuk Na dulure Yuk Sri</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

    <!--==========================Screenshots Section============================-->
  <section id="screenshots" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2><b>Testimoni</b></h2>
        <p class="separator">Beberapa testimoni dari user Tanya Buku..</p>
      </div>
    </div>

    <div class="container">
      <div class="owl-carousel owl-theme">

        <div><img src="admin/assetss/img/screen/1.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/2.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/3.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/4.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/5.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/6.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/7.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/8.jpg" alt="img"></div>
        <div><img src="admin/assetss/img/screen/9.jpg" alt="img"></div>

      </div>
    </div>

  </section>

  <!--==========================Contact Section============================-->
  <section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2><b>Contact</b></h2>
        <p class="separator">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>POLIBON<br>Bondowoso, Jawa Timur</p>
            </div>

            <div class="email">
              <i class="fa fa-envelope"></i>
              <p>tahajjudin28@gmail.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>082330044949</p>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


<!--==========================Footer============================-->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">Tanya Buku</a>
            <p>
              Tanya buku adalah Webseite layanan jual beli buku. Di website ini, 
              memudahkan user untuk membeli dan mencari buku yang diinginkan.
            </p>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-6">
          <div class="list-menu">

            <h4>Kelompok 5</h4>

            <ul class="list-unstyled">
                <li>Nama: Tahajjudin Fajri <br>
                    NIM: E41182137 <br>
                    PRODI: Teknik Informatika Kampus Bondowoso
                </li>
                <br>
                <li>Nama: Tahajjudin Fajri <br>
                    NIM: E41182137 <br>
                    PRODI: Teknik Informatika Kampus Bondowoso
                </li>
                <br>
                <li>Nama: Tahajjudin Fajri <br>
                    NIM: E41182137 <br>
                    PRODI: Teknik Informatika Kampus Bondowoso
                </li>
                <br>
                <li>Nama: Tahajjudin Fajri <br>
                    NIM: E41182137 <br>
                    PRODI: Teknik Informatika Kampus Bondowoso
                </li>

              </ul>

          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2"></div>
      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights Tanya Buku. All rights reserved.</p>
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eStartup
          -->
          Designed by <a href="">Kelompok 5</a>
        </div>
      </div>
    </div>

  </footer>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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
