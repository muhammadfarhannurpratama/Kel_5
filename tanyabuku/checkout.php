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
  <title>Checkout</title>
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

      <section class="konten">
    <div class="container">
      <br>
      <br>
      <br>
      <h3>Keranjang Belanja</h3>
      <hr>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>SubHarga</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php $totalbelanja=0; ?>
          <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
          <!-- menampilkan produk yg sedak diperulangkan berdasarkan id_roduk -->
          <?php
           $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
           $pecah=$ambil->fetch_assoc();
           $subharga=$pecah['harga_produk']*$jumlah;
           ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja+=$subharga; ?>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="4">Total Belanja</th>
            <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
          </tr>
        </tfoot>
      </table>

      <form method="post">  
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control"></div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <select class="form-control" name="id_ongkir">
              <option value="">Pilih Ongkos Kirim</option>
              <?php 
                $ambil=$koneksi->query("SELECT * FROM ongkir");
                while($perongkir=$ambil->fetch_assoc()){
               ?>
               <option value="<?php echo $perongkir['id_ongkir'] ?>">
                 <?php echo $perongkir['nama_kota'] ?> -
                 Rp. <?php echo number_format($perongkir['tarif']) ?>
               </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Alamat Lengkap Pengiriman</label>
          <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan Alamat Pengiriman"></textarea>
        </div>
        <button class="btn btn-primary " name="checkout">Checkout</button>
      </form>

      <?php 
      if (isset($_POST['checkout'])) 
      {
        $id_pelanggan=$_SESSION['pelanggan']['id_pelanggan'];
        $id_ongkir=$_POST['id_ongkir'];
        $tanggal_pembelian=date("Y-m-d");
        $alamat_pengiriman=$_POST['alamat_pengiriman'];

        $ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $arrayongkir=$ambil->fetch_assoc();
        $nama_kota=$arrayongkir['nama_kota'];
        $tarif=$arrayongkir['tarif'];

        $total_pembelian=$totalbelanja + $tarif;
        
        # 1. simpan data ke tabel pembelian
        $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian,nama_kota,tarif,alamat_pengiriman )
          VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

        # 2. mendapatkan id_pembelian yg baru saja terjadi
        $id_pembelian_baru_terjadi=$koneksi->insert_id;

        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
        {
          #mendapatkan data produk berdasarkan id_produk
          $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $perproduk=$ambil->fetch_assoc();


          $nama=$perproduk['nama_produk'];
          $harga=$perproduk['harga_produk'];
          $berat=$perproduk['berat'];

          $subberat=$perproduk['berat']*$jumlah;
          $subharga=$perproduk['harga_produk']*$jumlah;
          $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
            VALUES ('$id_pembelian_baru_terjadi','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
        }

        #kosongkan keranjang belanja
        unset($_SESSION['keranjang']);

        #tampilan dialihkan ke nota, nota pembelian baru terjadi
        echo"<script>alert('Pembelian Berhasil !');</script>";
        echo"<script>location='nota.php?id=$id_pembelian_baru_terjadi';</script>";
      }

      ?>
    </div>
  </section>


    </div>
  </header>

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
