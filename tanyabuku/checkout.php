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
  <script src="js/jquery.js"></script>
  <script>
      $(document).ready(function(){
        $("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
              if ($("input[name='alamat']:checked").val() == "berbeda" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                  $("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
              } else {
                  $("#form-input").slideUp("fast");  //Efek Slide Up (Menghilangkan Form Input)
              }
          });
        });
    </script>
    <script>
      $(document).ready(function(){
        $("#form-input2").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
              if ($("input[name='alamat']:checked").val() == "sama" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                  $("#form-input2").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
              } else {
                  $("#form-input2").slideUp("fast");  //Efek Slide Up (Menghilangkan Form Input)
              }
          });
        });
    </script>
    <script>
      $(document).ready(function(){
        $("#form-input1").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".det").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
              if ($("input[name='kurir']:checked").val() == "JNE" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                  $("#form-input1").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
              } else {
                  $("#form-input1").slideUp("fast");  //Efek Slide Up (Menghilangkan Form Input)
              }
          });
        });
    </script>
    <script>
      $(document).ready(function(){
        $("#form-input3").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
            $(".det").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
              if ($("input[name='kurir']:checked").val() == "J&T" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                  $("#form-input3").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
              } else {
                  $("#form-input3").slideUp("fast");  //Efek Slide Up (Menghilangkan Form Input)
              }
          });
        });
    </script>
    <script>
    
    $(document).ready(function() {
      $('#provinsi').change(function(){
          var provinsi_id = $(this).val();

          $.ajax({
            type: 'POST',
            url: 'kabupaten.php',
            data: 'prov_id='+provinsi_id,
            success: function(response) {
              $('#kabupaten').html(response);
            }
          });
      })

    });

  </script>
  <script>
    
    $(document).ready(function() {
      $('#kabupaten').change(function(){
          var kabupaten_id = $(this).val();

          $.ajax({
            type: 'POST',
            url: 'kecamatan.php',
            data: 'kabupaten_id='+kabupaten_id,
            success: function(response) {
              $('#kecamatan').html(response);
            }
          });
      })

    });

  </script>
  <script>
    
    $(document).ready(function() {
      $('#kecamatan').change(function(){
          var kecamatan_id = $(this).val();

          $.ajax({
            type: 'POST',
            url: 'kelurahan.php',
            data: 'kecamatan_id='+kecamatan_id,
            success: function(response) {
              $('#kelurahan').html(response);
            }
          });
      })

    });

  </script>
</head>

<body>
  <!-- <br>
  <pre><?php echo print_r($_SESSION) ?></pre> -->

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
            <th>Berat</th>
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
            <td><?php echo $pecah['berat']*$jumlah; ?> gr</td>
            <td><?php echo $jumlah; ?></td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja+=$subharga; ?>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="5">Total Belanja</th>
            <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
          </tr>
        </tfoot>
      </table>

      <form method="post">  
        
        <!-- <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control"></div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>" class="form-control">
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
        </div> -->
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <h3>Alamat Tujuan Pengiriman</h3>
              <input type="radio" name="alamat" value="sama" class="detail" required> Sesuai Profil
              <div id="form-input2" class="form-group">
                <label>Nama Pengirim</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
                <label>Alamat Lengkap Pengiriman</label>
                <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan'] ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <input type="radio" name="alamat" value="berbeda" class="detail"> Dropship 
              <div id="form-input" class="form-group">
              <div class="row" >
                <div class="col-md-4">
                  <label>Nama Pengirim</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengirim">
                  <label>Pilih Provinsi</label>
                  <?php $sql_provinsi=$koneksi->query("SELECT * FROM provinsi"); ?>
                  <select name="provinsi" id="provinsi" class="form-control" required>
                    <option value="">Pilih Provinsi</option>
                    <?php while($row_provinsi = mysqli_fetch_array($sql_provinsi)) { ?>
                    <option value="<?php echo $row_provinsi['id_prov'] ?>"><?php echo $row_provinsi['nama'] ?></option>
                  <?php } ?>
                  </select>
                  <label>Pilih Kabupaten</label>
                  <?php $sql_kabupaten=$koneksi->query("SELECT * FROM kabupaten"); ?>
                  <select name="kabupaten" id="kabupaten" class="form-control" required>
                    <option value="">Pilih Kabupaten</option>
                    <?php while($row_kabupaten = mysqli_fetch_array($sql_kabupaten)) { ?>
                    <option value="<?php echo $row_kabupaten['id_kab'] ?>"><?php echo $row_kabupaten['nama'] ?></option>
                  <?php } ?>
                  </select>
                  <label>Pilih Kecamatan</label>
                  <?php $sql_kecamatan=$koneksi->query("SELECT * FROM kecamatan"); ?>
                  <select name="kecamatan" id="kecamatan" class="form-control" required>
                    <option value="">Pilih Kecamatan</option>
                    <?php while($row_kecamatan = mysqli_fetch_array($sql_kecamatan)) { ?>
                    <option value="<?php echo $row_kecamatan['id_kec'] ?>"><?php echo $row_kecamatan['nama'] ?></option>
                  <?php } ?>
                  </select>
                  <label>Pilih Kelurahan</label>
                  <select name="kelurahan" id="kelurahan" class="form-control" required>
                    <option value="">Pilih Kelurahan</option>
                    <option></option>
                  </select>
                  </div>
                  <div class="col-md-8">
                  <label>Alamat Lengkap Pengiriman</label>
                  <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan Alamat Pengiriman" style="height: 180px;"></textarea>
                  <label>Pilih Jasa Pengiriman</label><br>
                  <input type="radio" name="kurir" value="JNE" class="det" required> JNE
                  <input type="radio" name="kurir" value="J&T" class="det"> J&T Express
                  <div id="form-input1" class="form-group">
                      <label>Ongkos Kirim JNE</label>
                        <select class="form-control" name="ongkir">
                          <option value="Lunas">Lunas</option>
                          <option value="Proses Packing">Proses Packing</option>
                          <option value="Barang Telah Dikirim">Barang Telah Dikirim</option>
                          <option value="Barang Telah Dikirim">Barang Diterima</option>
                          <option value="Batal">Batal</option>
                        </select>
                    </div>
                    <div id="form-input3" class="form-group">
                      <label>Ongkos Kirim J&T Express</label>
                        <select class="form-control" name="ongkir">
                          <option value="Lunas">J&T Murah</option>
                          <option value="Proses Packing">Murah yukk</option>
                          <option value="Barang Telah Dikirim">Barang Telah Dikirim</option>
                          <option value="Barang Telah Dikirim">Barang Diterima</option>
                          <option value="Batal">Batal</option>
                        </select>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>
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

          // query update stok

          $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
            WHERE id_produk='$id_produk'");
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
