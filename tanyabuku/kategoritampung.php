<?php 
session_start();
include 'koneksi.php';

// if (isset($_POST['submit'])){
    $kategori=$_GET['nama_kategori'];
    // var_dump($kategori);
    $ambile=$koneksi->query("SELECT * FROM produk WHERE nama_kategori='$kategori'");
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
 <?php include 'navbar.php'; ?>

  <br><br><br>
  <div class="container">
    <div class="row">
  <div class="col-lg-2"></div>
 <div class="col-lg-10">
<!-- daftar buku -->
        <br><br><br>
        <h3 class="judulbuku">Daftar Buku</h3>
        <br><br>
        <form action="">
        <section id="get-started" class=" text-center wow fadeInUp">
                <div class="row">
                    <?php while($perproduk=$ambile->fetch_assoc()){ ?>
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
    </div>
    <div class="col-lg-2"></div>
  </div>
  </div>
<br><br><br><br>

  </body>
  </html>