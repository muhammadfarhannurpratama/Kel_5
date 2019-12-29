<?php 
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","db_tanyabuku");

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

  <title>Tanya Admin - Ubah Produk</title>

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
    <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1>
    <p class="mb-4">Tambah Barang pada Tanya Buku Store</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Admin</h6>
        <br>
        <!-- query ubah -->
       <?php 
$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
 ?>
 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Username</label>
 		<input type="text" name="user" class="form-control" value="<?php echo $pecah['username']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Password</label>
 		<input type="password" name="pass" class="form-control" value="<?php echo $pecah ['password']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Nama Lengkap</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah ['nama_lengkap']; ?>">	
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>
 <?php 
if (isset($_POST['ubah']))
{

		$koneksi->query("UPDATE admin SET username='$_POST[user]',
			password='$_POST[pass]',nama_lengkap='$_POST[nama]'
			WHERE id_admin='$_GET[id]'");

	echo "<script>alert('Data Admin Telah Diubah');</script>";
    echo "<script>location='tambahadmin.php';</script>";

}
	
  ?>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include 'footer.php'; ?>


<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
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