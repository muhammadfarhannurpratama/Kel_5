<?php 
session_start();
//koneksi database
include '../koneksi.php';

if(!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda Harus Login !');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tanya Admin - Produk</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include 'sidebar.php'; ?>  
  <?php include 'topbar.php'; ?> 

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4"></a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">SILAHKAN PILIH PERSEN LABA TOKO</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 			<input type="radio" name="persen" value="10" class="form-group">10% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="persen" value="20" class="form-group">20% <br>
      <input type="radio" name="persen" value="30" class="form-group">30% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="persen" value="40" class="form-group">40% <br>
      <input type="radio" name="persen" value="50" class="form-group">50% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="persen" value="60" class="form-group">60% <br>
      <input type="radio" name="persen" value="70" class="form-group">70% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="persen" value="80" class="form-group">80% <br>
 	</div>
 	<button class="btn btn-primary" name="simpan">Simpan</button>

 	<button class="btn btn-info"  name="list">Lihat List Persen</button>
 </form>
 <?php 
if (isset($_POST['simpan']))
{
	$persennya=$_POST['persen'];

		$koneksi->query("INSERT INTO persen_laba (persen) VALUES ('$persennya')");

	
      echo "<div class='alert alert-info'>Data Tersimpan !</div>";
        echo "<meta http-equiv='refresh' content='1;url=listpersen.php'>";
 
}
elseif (isset($_POST['list'])) 
{

 echo "<meta http-equiv='refresh' content='1;url=listpersen.php'>";
}
	
  ?>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include 'footer.php'; ?>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>



























