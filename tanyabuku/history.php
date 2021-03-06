<?php 
session_start();
include 'koneksi.php';

//if belum login, maka masuk login.php 
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan']))
{
   echo "<script>alert('Silahkan Login !');</script>";
   echo "<script>location='login.php';</script>";
   exit();
}
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

<body class="body4">

  <?php include 'navbar.php'; ?>

  <br>
  <br>
  <br>
  <br>

  <!-- <pre><?php print_r($_SESSION); ?></pre> -->
  <section class="history">
    <div class="container">
      <h3><span>HISTORY BELANJA</span> <br><br>
       Nama Pelanggan : <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>
      <br>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $nomor=1;
          //mendapatkan id pelanggan yg login
          $id_pelanggan = $_SESSION['pelanggan'] ['id_pelanggan'];

          $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
          while($pecah = $ambil->fetch_Assoc()){  
           ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['tanggal_pembelian'] ?></td>
            <td>
              <?php echo $pecah['status_pembelian'] ?>
              <br>
              <?php if (!empty($pecah['resi_pengiriman'])):?>
              Resi : <?php echo $pecah['resi_pengiriman']; ?>
              <?php endif ?>  
            </td>
            <td>Rp. <?php echo number_format($pecah['total_pembelian']);  ?></td>
            <td>
                <a href="nota.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Nota</a>

                <?php if ($pecah['status_pembelian']=='Menunggu Pembayaran'): ?>
                <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">
                Lakukan Pembayaran
              </a>
                <?php else: ?>
                  <a href="history_pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">
                    History Pembayaran
                  </a>
                <?php endif ?>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php } ?>
        </tbody>
      </table>
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
<script>
    $(document).ready(function(){      
        $('.nav-buku').hide();
        $('.nav-test').hide();
        $('.nav-about').hide();
    });
</script>