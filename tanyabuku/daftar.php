<?php include 'koneksi.php'; ?>
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
  			<div class="panel panel-default container box">
  				<div class="panel-heading">
  				<center>	<h3 class="panel-title">Daftar Pelanggan</h3> </center>
  					<br>

  				</div>
  				<div class="panel-body">
  					<form method="post">
  						<div class="form-group">
  							<label>Nama</label>
  							<input type="text" class="form-control" name="nama" required>
  						</div>
  						<div class="form-group">
  							<label>Email</label>
  							<input type="email" class="form-control" name="email" required>
  						</div>
  						<div class="form-group">
  							<label>Password</label>
  							<input type="password" class="form-control" name="password" required>
  						</div>
              <div class="form-group">
                <label>Provinsi</label>
                <?php $sql_provinsi=$koneksi->query("SELECT * FROM provinsi"); ?>
                <select name="provinsi" id="provinsi" class="form-control">
                  <option value="">Pilih Provinsi</option>
                  <?php while($row_provinsi = mysqli_fetch_array($sql_provinsi)) { ?>
                  <option value="<?php echo $row_provinsi['id_prov'] ?>"><?php echo $row_provinsi['nama_prov'] ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kota</label>
                <select name="kota" id="kota" class="form-control">
                  <option value="">Pilih Kota</option>
                  <option></option>
                </select>
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control">
                  <option value="">Pilih Kecamatan</option>
                  <option></option>
                </select>
              </div>
  						<div class="form-group">
  							<label>Alamat</label>
  							<textarea class="form-control" name="alamat" required></textarea>
  						</div>
  						<div class="form-group">
  							<label>Telp / HP</label>
  							<input type="number" class="form-control" name="telepon" required>
  						</div>
  						<div class="form-group">
  						<center><button class="btn btn-primary" name="daftar">Daftar</button></center>
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
  							$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES ('$email','$password','$nama','$telepon','$alamat')");

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
