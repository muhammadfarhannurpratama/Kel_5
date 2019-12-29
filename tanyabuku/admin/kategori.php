<?php 
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","db_tanyabuku");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kategori</title>

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
     <!-- Begin Page Content -->
  <div class="container-fluid">



 <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kategori Produk</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thread>
             <tr> 
             <th>No</th>
             <th><center>Nama Kategori</center></th>  
            <th><center>Opsi</center></th>
             </tr>
             </thread>
                <tbody>
                  <?php $nomor=1; ?>
                  <?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
                  <?php while($pecah=$ambil->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                       <td><?php echo $pecah['nama_kategori']; ?></td>
                     <td>

                      <center><a href="ubahkategori.php?id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-warning">Ubah</a>
                      <a href="hapuskategori.php?id=<?php echo $pecah['id_kategori']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapusnya')" class="btn-danger btn">Hapus</a></center>  
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>  
</table>
<center><a href="tambahkategori.php" class="btn btn-primary btn-block">Tambah Kategori</a></center>

            </div>
          </div>
        </div>

    
      <!-- /.container-fluid -->

    <!-- End of Main Content -->

<?php include 'footer.php'; ?>


 <!--
<table class="table table-bordered">
  <thread>
    <tr> 
      <th>No</th>
      <th><center>Nama Kategori</center></th>  
      <th>Button</th>
    </tr>
  </thread>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_kategori']; ?></td>
      <td>
        <a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapusnya')" class="btn-danger btn">Hapus</a>
        <a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-warning">Ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>  
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Kategori</a>
-->

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
