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

  <title>Tanya Admin - Pelanggank</title>

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
    <!-- <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4"></p>
 -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA PELANGGAN</h6>
      </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
  <thead>
    <tr>
      <th>No</th>
      <th><center>Nama</center></th>
      <th><center>Email</center></th>
      <th><center>Telepon</center></th>
      <th><center>Opsi</center></th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_pelanggan']; ?></td>
      <td><?php echo $pecah['email_pelanggan']; ?></td>
      <td><?php echo $pecah['telepon_pelanggan']; ?></td>
      <td>
      <center><a href="hapuspelanggan.php?id=<?php echo $pecah['id_pelanggan']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapusnya')" class="btn-danger btn">Hapus</a></center>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
</table>
            </div>
          </div>
        </div>

    
      <!-- /.container-fluid -->

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
