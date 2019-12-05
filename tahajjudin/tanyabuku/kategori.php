<?php 
session_start();
include 'koneksi.php'
 ?>
<!doctype html>
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
        <div class="col-2">
            <ul class="kategori">
                <li>aksi</li>
                <li>acak</li>
                <li>komik</li>
                <li>blabla</li>
            </ul>
        </div>

        <!-- daftar buku -->
        <div class="col-10">
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
                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Beli</a>
                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>              
                        </div>
                    </div>
                    </div>
                    <?php } ?>


                </div>

        </section>
        </div>
    </div>
  </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>