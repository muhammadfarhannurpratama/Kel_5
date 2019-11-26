<?php 
session_start();
include 'koneksi.php';
 
//if belum login, maka masuk login.php 
if (!isset($_SESSION['pelanggan']))
{
   echo "<script>alert('Silahkan Login !');</script>";
   echo "<script>location='login.php';</script>";
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Nota Pembelian</title>
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

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <?php include 'navbar.php'; ?>
  <!--mulai coding-->

  <section class="konten">
  	<div class="container">
  		

 	<!-- nota copas dari admin-->
 	
<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
 ?>

 <!-- jika pelanggan yang beli tidak sama dgn pelanggan yg login maka dilarikan ke history.php (tdk berhak melihat note org lain) -->
 <!-- pelanggan yg beli harus yg login -->
 <?php 
// mendapatkan id pelanggan yg beli
 $id_pelangganygbeli = $detail['id_pelanggan'];
 // medapatkan id pelanggan yg login
 $id_pelangganyglogin = $_SESSION['pelanggan']['id_pelanggan'];

 if ($id_pelangganygbeli!==$id_pelangganyglogin) 
 {
   echo "<script>alert('gagal !');</script>";
   echo "<script>location='history.php';</script>";
   exit();
 }
  ?>
 <br>
 <br>
 <br>
 
 <div class="row">
   <div class="col-md-4">
     <h3>Pembelian</h3>
     <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong> <br>
     Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
     Total : Rp. <?php echo number_format($detail ['total_pembelian']); ?>
   </div>
   <div class="col-md-4">
     <h3>Pelanggan</h3>
     <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br> 
     <p>
      <?php echo $detail['telepon_pelanggan']; ?> <br>
      <?php  echo $detail['email_pelanggan']; ?>
     </p>
   </div>
   <div class="col-md-4">
     <h3>Pengiriman</h3>
     <strong><?php echo $detail['nama_kota']; ?></strong> <br>
     Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
     Alamat : <?php echo $detail['alamat_pengiriman']; ?>
   </div>
 </div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
      <th>Berat</th>
			<th>Jumlah</th>
      <th>Subberat</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
      <td><?php echo $pecah['berat']; ?> gr</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['subberat']; ?> gr</td>
      <td>Rp. <?php echo number_format($pecah['subharga']);?></td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>


<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
				<strong>KE NOMOR REKENING DI BAWAH INI :</strong> <br>
				<strong>BANK BCA : 123-444-000-321 A/N. TANYA BUKU</strong>
			</p>
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