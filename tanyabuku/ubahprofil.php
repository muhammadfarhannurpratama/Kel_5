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

   <!-- font -->
   <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet"> 
  <!-- jqu -->
  <script src="admin/assetss/lib/jquery/jquery.min.js"></script>
</head>

<body>

  <?php include 'navbar.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="container">
        <br>
          <div class="box-profil">
          <center><h3>Profil Pelanggan</h3> </center><br>
            <form method="post">
              <div class="form-group">
                <label>Email</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>" class="form-control">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" readonly value="<?php echo $_SESSION['pelanggan']['password_pelanggan'] ?>" class="form-control">
              </div>

               <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
              </div>

              <div class="form-group">
                <label>Telepon</label>
                <input type="number" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>" class="form-control">
              </div>
              <center><a class="btn btn-primary" href="ubahprofil.php" role="button">Ubah</a></center>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
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