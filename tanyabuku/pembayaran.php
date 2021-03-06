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

// mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yg beli
$id_Pelanggan_beli = $detpem['id_pelanggan'];
// mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelanggan_login !==$id_Pelanggan_beli) 
{
   echo "<script>alert('Gagal!');</script>";
   echo "<script>location='history.php';</script>";
   exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pembayaran</title>
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
  <script src="js/jquery-3.4.1.min.js"></script>
  
 
</head>

<body>

  <?php include 'navbar.php'; ?>

  <br>
  <br>
  <br>
  <br>

  <div class="container">
    <h2>Konfirmasi Pembayaran</h2>
    <p>Kirim Bukti Pembayaran Anda Disini !</p>

    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Penyetor</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Harus Sesuai Dengan Nama Penyetor Di Bukti Struk Pembayaran">
      </div>
      <div class="form-group">
    <label>Bank</label>
    <select class="form-control" name="bank">
      <option value="">Pilih Bank</option>
      <option value="BNI">BNI</option>
      <option value="BCA">BCA</option>
      <option value="BRI">BRI</option>
      <option value="MANDIRI">MANDIRI</option>
    </select>
  </div>
      <div class="form-group">
        <label>Jumlah</label>
        <input type="number" class="form-control" name="jumlah" min="1" placeholder="Jumlah Harus Sesuai Dengan Total Tagihan Anda"> 
      </div>
      <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem['total_pembelian']) ?></strong></div>

      <div class="form-group">
      <label class="fa fa-camera" for="buktitrans"> Upload Bukti Bayar (Gambar Maks 5Mb) </label>
      <div class="input-icon">
      <input type="hidden" name="bukti">
      <input id="foto_transaksi" name="bukti" type="file" required>
      <p class="foto_transaksi" style="color: red;"></p>
      </div> 
       <div class="modal-footer">
      <button class="btn btn-primary" name="kirim">Kirim</button>
      </div>
    </form>
  </div>
<?php 

// if ada tombol kirim
if (isset($_POST["kirim"])) 
{
  // upload foto bukti transfer
  $namabukti = $_FILES["bukti"]["name"];
  $lokasibukti = $_FILES["bukti"]["tmp_name"];
  $namafix = date("YmdHis").$namabukti;
  move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

  $nama = $_POST["nama"];
  $bank = $_POST["bank"];
  $jumlah = $_POST["jumlah"];
  $tanggal = date("Y-m-d");

  // simpan pembayaran
  $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
    VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix')");

  // update data pembelian dari pending menjadi sudah melakukan pembayaran 
  $koneksi->query("UPDATE pembelian SET status_pembelian = 'Telah Melakukan Pembayaran' 
    WHERE id_pembelian = '$idpem'");

  echo "<script>alert('Terimakasih Telah Mengirimkan Bukti Pembayaran ');</script>";
  echo "<script>location='history.php';</script>";
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
  $('#foto_transaksi').on('change',function(){
                    var filename = this.files[0].name.split('.').pop();
                    if ((this).files[0].size > 5000000) {
                      $('.foto_transaksi').text('Ukuran Gambar Yang Anda Upload Tidak Boleh Melebihi 5MB!');
                      var kel = $(this).val(null);
                    }else if(filename != 'jpeg' && filename != 'jpg' && filename != 'png'){
                      $('.foto_transaksi').text('Format Gambar Yang Anda Upload Tidak Benar!');
                      var kel = $(this).val(null);
                    }else{
                      $('.foto_transaksi').text('');
                    }

                    });
  </script>