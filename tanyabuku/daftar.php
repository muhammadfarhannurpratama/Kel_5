<?php include 'koneksi.php'; ?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Daftar</title>
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
  <script>
    
    $(document).ready(function() {
      $('#provinsi').change(function(){
          var provinsi_id = $(this).val();

          $.ajax({
            type: 'POST',
            url: 'kota.php',
            data: 'prov_id='+provinsi_id,
            success: function(response) {
              $('#kota').html(response);
            }
          });
      })

    });

  </script>
  <script>
    
    $(document).ready(function() {
      $('#kota').change(function(){
          var kota_id = $(this).val();

          $.ajax({
            type: 'POST',
            url: 'kecamatan.php',
            data: 'kabupaten_id='+kota_id,
            success: function(response) {
              $('#kecamatan').html(response);
            }
          });
      })

    });

  </script>
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

<body class="body2">

 <?php include 'navbar.php'; ?>
 <br>
 <br>
 <br>
 <div class="container">
  	<div class="row">
      <div class="col-lg-4"></div>
  		<div class="col-lg-4">
  			<div class="container box1">
  				<div class="panel-heading">
  				<center>	<h3 class="panel-title">Daftar Pelanggan</h3> </center>
  					<br>

  				</div>
  				<div class="panel-body">
  					<form method="post">
  						<div class="form-group">
  							<label>Nama</label>
  							<input type="text" min="4" maxlength="25" class="form-control" name="nama" required>
  						</div>
  						<div class="form-group">
  							<label>Email</label>
  							<input type="email" maxlength="25" class="form-control" name="email" required>
                <span class="warning"></span>
  						</div>
  						<div class="form-group">
  							<label>Password</label>
  							<input type="password" maxlength="15" minlength="8" class="form-control" name="password" required>
  						</div>
              <div class="form-group">
                <label>Provinsi</label>
                <?php $sql_provinsi=$koneksi->query("SELECT * FROM provinsi"); ?>
                <select name="provinsi" id="provinsi" class="form-control" required>
                  <option value="">Pilih Provinsi</option>
                  <?php while($row_provinsi = mysqli_fetch_array($sql_provinsi)) { ?>
                  <option value="<?php echo $row_provinsi['id_prov'] ?>"><?php echo $row_provinsi['nama_prov'] ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kota</label>
                <?php $sql_kota=$koneksi->query("SELECT * FROM kota"); ?>
                <select name="kota" id="kota" class="form-control" required>
                  <option value="">Pilih Kota</option>
                  <?php while($row_kota = mysqli_fetch_array($sql_kota)) { ?>
                  <option value="<?php echo $row_kota['id_kabkot'] ?>"><?php echo $row_kota['nama_kabkot'] ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control" required>
                  <option value="">Pilih Kecamatan</option>
                  <option></option>
                </select>
              </div>
  						<div class="form-group">
  							<label>Alamat</label>
  							<textarea class="form-control" maxlength="50" name="alamat"  required></textarea>
  						</div>
  						<div class="form-group">
  							<label>Telp / HP</label>
  							<input type="text" maxlength="13" minlength="11" onkeypress="return Angkasaja(event)"  class="form-control" name="telepon" required>
  						</div>
  						<div class="form-group">
  						<center><button class="btn btn-primary tomb" name="daftar">Daftar</button></center>
  						</div>
  					</form>
  					<?php 

  					//if tekan tombol daftar
  					if (isset($_POST['daftar'])) 
  					{
  						//ambil isian form
  						$nama=$_POST['nama'];
  						$email=$_POST['email'];
  						$password=$_POST['password'];
  						$alamat=$_POST['alamat'];
  						$telepon=$_POST['telepon'];
              $provinsi=$_POST['provinsi'];
              $kota=$_POST['kota'];
              $kecamatan=$_POST['kecamatan'];

  						//cek email sudah digunakan /belum
  						$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
  						$yangcocok=$ambil->num_rows;
  						if ($yangcocok==1) 
  						{
  							echo "<script>alert('Email Telah Terdaftar !');</script>";
  							echo "<script>location='daftar.php';</script>";
  						}
  						else
  						{
  							//query insert ke tabel pelanggan
  							$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan,provinsi,kota,kecamatan) VALUES ('$email','$password','$nama','$telepon','$alamat','$provinsi','$kota','$kecamatan')");

  							echo "<script>alert('Pendaftaran Berhasil, Silahkan Login !');</script>";
  							echo "<script>location='login.php';</script>";
  						}

  					}

  					 ?>
  				</div>
  			</div>
      </div>
      <div class="col-lg-4"></div>
  	</div>
  </div>
  

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
