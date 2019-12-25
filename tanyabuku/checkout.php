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
  <!-- icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <!-- Libraries CSS Files -->
  <link href="admin/assetss/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/animate/animate.min.css" rel="stylesheet">
  <link href="admin/assetss/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="admin/assetss/css/style.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <script type="text/javascript">

          $(document).ready(function(){
            $('#provinsi').change(function(){

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
            var prov = $('#provinsi').val();

            $.ajax({
              type : 'GET',
              url : 'http://localhost/Kel_5/tanyabuku/cek_kabupaten.php',
              data :  'prov_id=' + prov,
              success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                $("#kabupaten").html(data);
              }
            });
          });

            $("#cek").click(function(){
            //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
            var asal = $('#asal').val();
            var kab = $('#kabupaten').val();
            var kurir = $('#kurir').val();
            var berat = $('#berat').val();

            $.ajax({
              type : 'POST',
              url : 'http://localhost/Kel_5/tanyabuku/cek_ongkir.php',
              data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
              success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                $("#ongkir").html(data);
              }
            });
          });
          });
        </script>
        <!-- jqu -->
        <script src="admin/assetss/lib/jquery/jquery.min.js"></script>
      </head>

<body class="body4">
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
            <?php $totalberat=0; ?>
            <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
              <!-- menampilkan produk yg sedak diperulangkan berdasarkan id_roduk -->
              <?php
              $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
              $pecah=$ambil->fetch_assoc();
              $subharga=$pecah['harga_produk']*$jumlah;
              $subberat=$pecah['berat']*$jumlah;
              ?>
              <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                <td><?php echo $subberat; ?> gr</td>
                <td><?php echo $jumlah; ?></td>
                <td>Rp. <?php echo number_format($subharga); ?></td>
              </tr>
              <?php $nomor++; ?>
              <?php $totalbelanja+=$subharga; ?>
              <?php $totalberat+=$subberat; ?>

            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3">Total Belanja</th>
              <th><?php echo $totalberat; ?> gr</th>
              <th></th>
              <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
            </tr>
          </tfoot>
        </table>

        <form method="post">  
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <h3>Alamat Tujuan Pengiriman</h3>
                <input type="radio" name="alamat" value="sama" class="detail" required> Sesuai Profil
                <div id="form-input2" class="form-group">
                  <div class="row" >
                    <div class="col-md-4">
                      <div>
                        <?php
                  //Get Data Kabupaten
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key:e23602a5ea1c864e7c56a93dbdecaac4"
                          ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);
                        echo "
                        <div class= \"form-group\"><br>
                        <label for=\"asal\">Kota/Kabupaten Asal </label>
                        <select disabled class=\"form-control\" name='asal' id='asal'>";
                  // echo "<option>Pilih Kota Asal</option>";
                        $data = json_decode($response, true);
                        for ($i=85; $i < count($data['rajaongkir']['results']); $i++) {
                          echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                        }
                        echo "</select>
                        </div>";
                  //Get Data Kabupaten
                  //-----------------------------------------------------------------------------

                  //Get Data Provinsi
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key:e23602a5ea1c864e7c56a93dbdecaac4"
                          ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        echo "
                        <div class= \"form-group\">
                        <label for=\"provinsi\">Provinsi Tujuan </label>
                        <select class=\"form-control\" name='provinsi' id='provinsi' required>";
                        echo "<option>Pilih Provinsi Tujuan</option>";
                        $data = json_decode($response, true);
                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                          echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                        }
                        echo "</select>
                        </div>";
                      //Get Data Provinsi
                        ?>

                        <div class="form-group">
                          <label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
                          <select class="form-control" id="kabupaten" name="kabupaten" required=""></select>
                        </div>
                        <div class="form-group">
                          <label for="kurir">Kurir</label><br>
                          <select class="form-control" id="kurir" name="kurir">
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="berat">Berat (gram)</label><br>
                          <input class="form-control" id="berat" type="text" name="berat" readonly value="<?php echo $totalberat; ?>" />
                        </div>
                        <button class="btn btn-block btn-danger" id="cek" type="button" name="button"><i class="material-icons">cached</i></button>
                      </div>
                    </div>
                    <div class="col-md-8"><br>
                      <label>Pilih Ongkos & Estimasi Pengiriman</label><br>
                      <select id="ongkir" class="form-control" required=""></select><br>
                      <label>Nama Pengirim</label>
                      <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
                      <label>Alamat Lengkap Pengiriman</label>
                      <textarea readonly="readonly" class="form-control" name="alamat_pengiriman" style="height: 217px;"><?php echo $_SESSION['pelanggan']['alamat_pelanggan']; ?></textarea>                   
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="radio" name="alamat" value="berbeda" class="detail"> Dropship 
                <div id="form-input" class="form-group">
                  <div class="row" >
                    <div class="col-md-4">
                      <div>
                        <?php
                  //Get Data Kabupaten
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key:e23602a5ea1c864e7c56a93dbdecaac4"
                          ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);
                        echo "
                        <div class= \"form-group\"><br>
                        <label for=\"asal\">Kota/Kabupaten Asal </label>
                        <select disabled class=\"form-control\" name='asal' id='asal'>";
                  // echo "<option>Pilih Kota Asal</option>";
                        $data = json_decode($response, true);
                        for ($i=85; $i < count($data['rajaongkir']['results']); $i++) {
                          echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                        }
                        echo "</select>
                        </div>";
                  //Get Data Kabupaten
                  //-----------------------------------------------------------------------------

                  //Get Data Provinsi
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "key:e23602a5ea1c864e7c56a93dbdecaac4"
                          ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        echo "
                        <div class= \"form-group\">
                        <label for=\"provinsi\">Provinsi Tujuan </label>
                        <select class=\"form-control\" name='provinsi' id='provinsi' required>";
                        echo "<option>Pilih Provinsi Tujuan</option>";
                        $data = json_decode($response, true);
                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                          echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                        }
                        echo "</select>
                        </div>";
                      //Get Data Provinsi
                        ?>

                        <div class="form-group">
                          <label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
                          <select class="form-control" id="kabupaten" name="kabupaten" required=""></select>
                        </div>
                        <div class="form-group">
                          <label for="kurir">Kurir</label><br>
                          <select class="form-control" id="kurir" name="kurir">
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="berat">Berat (gram)</label><br>
                          <input class="form-control" id="berat" type="text" name="berat" readonly value="<?php echo $totalberat; ?>" />
                        </div>
                        <button class="btn btn-block btn-danger" id="cek" type="button" name="button"><i class="material-icons">cached</i></button>
                      </div>
                    </div>
                    <div class="col-md-8"><br>
                      <label>Pilih Ongkos & Estimasi Pengiriman</label><br>
                      <select id="ongkir" class="form-control" required=""></select><br>
                      <label>Nama Pengirim</label>
                      <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengirim" required="">
                      <label>Alamat Lengkap Pengiriman</label>
                      <textarea class="form-control" name="alamat_pengiriman" maxlength="70" placeholder="Masukkan Alamat Pengiriman" style="height: 217px;" required=""></textarea>                   
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>       
          <button class="btn btn-block btn-info" name="checkout">Checkout</button>
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
          $nama_kota=$arrayaongkir['nama_kota'];
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
<script>
  $(document).ready(function(){      
    $('.nav-buku').hide();
    $('.nav-test').hide();
    $('.nav-about').hide();
  });
</script>