<?php 
session_start();
include 'koneksi.php';

//if belum login, maka masuk login.php 
// if (!isset($_SESSION['pelanggan']))
// {
//    echo "<script>alert('Silahkan Login !');</script>";
//    echo "<script>location='login.php';</script>";
// }
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

<body class="body2">
  <?php 
$ambil=$koneksi->query("SELECT * FROM pelanggan
  WHERE id_pelanggan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>

 <!-- jika pelanggan yang beli tidak sama dgn pelanggan yg login maka dilarikan ke history.php (tdk berhak melihat note org lain) -->
 <!-- pelanggan yg beli harus yg login -->
 <?php 
// mendapatkan id pelanggan yg beli
 $id_pelangganygubah = $pecah['id_pelanggan'];
 // medapatkan id pelanggan yg login
 $id_pelangganyglogin = $_SESSION['pelanggan']['id_pelanggan'];

 if ($id_pelangganygubah!==$id_pelangganyglogin) 
 {
   echo "<script>alert('gagal !');</script>";
   echo "<script>location='profiluser.php';</script>";
   exit();
 }
  ?>

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
               <input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" value="<?php echo $pecah['password_pelanggan']; ?>">
              </div>

               <div class="form-group">
                <label>Nama Pelanggan</label>
                 <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
              </div>

              <div class="form-group">
                <label>Telepon</label>
               <input type="number" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
              </div>

              <div class="form-group">
                <label>Alamat</label>
               <input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_pelanggan']; ?>">
              </div>
             <center><button class="btn btn-primary" name="ubah">Ubah Profil</button></center> 
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>

<?php 
if (isset($_POST['ubah']))
{

    $koneksi->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',password_pelanggan='$_POST[pass]',nama_pelanggan='$_POST[nama]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]'
      WHERE id_pelanggan='$_GET[id]'");

  echo "<script> alert('Data Pelanggan Telah Diubah, Silahkan Login Kembali !');</script>";
  session_destroy();
  echo "<script> location='login.php';</script>";

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
<script>
    $(document).ready(function(){      
        $('.nav-buku').hide();
        $('.nav-test').hide();
        $('.nav-about').hide();
    });
</script>