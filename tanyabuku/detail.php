<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php 
//mendapatkan id_produk dari url
$id_produk=$_GET['id'];

//query ambil data
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail=$ambil->fetch_assoc(); 
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Detail Produk</title>
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

  <!-- angka saja -->
  <script type="text/javascript">
  function Angkasaja(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;
  }
  </script>
</head>

<body class="body4">

  <?php include 'navbar.php'; ?>
  <br><br><br>
  <section class="konten">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="foto">
            <img src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="" class="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="book">
          <h2><?php echo $detail['nama_produk']; ?></h2> <br>
         <!-- <h4>Rp. <?php echo number_format($detail['harga_jual']); ?></h4> -->

         <!-- <p>Stok : <?php echo $detail['stok_produk'] ?></p> -->

          <form method="post">
            <div class="form-group">
              <div class="input-group">
              <!--  <input onkeypress="return Angkasaja(event)" type="number" min="1" class="form-control" placeholder="Masukan Banyak Barang Yang Ingin Dibeli" name="jumlah" max="<?php echo $detail['stok_produk'] ?>" required> -->
                <div class="btn-beli">
                  <button class="btn btn-primary" name="beli">Beli</button>
                </div>
              </div>
            </div>
          </form>

          <?php 
          // if tombol beli
          if (isset($_POST['beli']))
          {
            //medapatkkan jumlah yg di inputkan
            $jumlah=$_POST['jumlah'];
            //masukkan dikeranjang belanja
            $_SESSION['keranjang'][$id_produk] = $jumlah;

            echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja !');</script>";
            echo "<script>location='keranjang.php';</script>";
          }
           ?>

          <p><?php echo $detail['deskripsi_produk']; ?></p>
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
