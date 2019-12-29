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
    <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1>
    <p class="mb-4">Tambah Barang pada Tanya Buku Store</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
        <!-- query persen -->
        <?php $ambil=$koneksi->query("SELECT * FROM persen_laba"); ?>
        <?php $pecah=$ambil->fetch_assoc();?>
      </div>
      <div class="card-body">
        <form method="post" name="autoCalForm" enctype="multipart/form-data">
      <div class="row">    
        <div class="col-sm-6">
	  <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="nama" required="">
          </div>
            <button class="btn btn-primary btn-block" name="save"> SIMPAN </button>
        </form>
<?php 
if (isset($_POST['save']))
{
		$koneksi->query("INSERT INTO kategori
		(nama_kategori)
		VALUES('$_POST[nama]')");

echo "<script>alert('Kategori Telah Ditambah');</script>";
echo "<script>location='kategori.php';</script>";

}
 ?>