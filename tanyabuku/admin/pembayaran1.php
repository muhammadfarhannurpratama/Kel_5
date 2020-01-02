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
        <h6 class="m-0 font-weight-bold text-primary">PEMBAYARAN</h6>
        <!-- query ubah -->
       <?php 
        // mendapatkan id_pembelian dari url
        $id_pembelian = $_GET['id'];


        // mengambil data pembayaran berdasarkan id_pembelian
        $ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
        $detail = $ambil->fetch_assoc();

        // echo "<pre>";
        // print_r($detail);
        // echo "</pre>";
         ?>

      </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="col-md-12">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
              <th>Tanggal</th>
              <td><?php echo $detail['tanggal'] ?></td>
            </tr>
            <tr>
              <th>Nama</th>
              <td><?php echo $detail['nama'] ?></td>
            </tr>
            <tr>
              <th>Bank</th>
              <td><?php echo $detail['bank'] ?></td>
            </tr>
            <tr>
              <th>Jumlah</th>
              <td>Rp. <?php echo number_format($detail['jumlah']); ?></td>
            </tr>
            <tr>
              <th>Bukti Transfer</th>
              <td>
              <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" width="100">
              </td>
            </tr>
            </tr>
          </table>
        </div>
        <div class="col-md-12">
        </div>
       </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
      <div class="row">    
        <div class="col-md-12">
          <div class="form-group">
           <label>No Resi Pengiriman</label>
    <input type="text" class="form-control" name="resi">
  </div>
  <div class="form-group">
    <label>Status</label>
    <select class="form-control" name="status">
      <option value="">Pilih Status</option>
      <option value="Lunas">Lunas</option>
      <option value="Proses Packing">Proses Packing</option>
      <option value="Barang Telah Dikirim">Barang Telah Dikirim</option>
      <option value="Barang Telah Dikirim">Barang Diterima</option>
      <option value="Batal">Batal</option>
    </select>
   </div><br><br>
  <button class="btn btn-primary btn-block" name="proses">Proses</button>
 </form>
 </div>
 </div>

<?php 
if (isset($_POST['proses'])) 
{
  $resi = $_POST['resi'];
  $status = $_POST['status'];
  $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status'
    WHERE id_pembelian='$id_pembelian'");
  
  echo "<script>alert ('Data Pembelian Telah TerUpdate !');</script>";
  echo "<script>location='pembelian.php';</script>";
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

        <script>

        function startCalc(){
        interval = setInterval("calc()",1);}
        function calc(){
        one = document.autoCalForm.harga_beli.value;
        two = document.autoCalForm.persen.value; 
        three = document.autoCalForm.pembagian.value; 
        four = document.autoCalForm.laba.value = (one * 1) * (two * 1) / (three * 1);

        document.autoCalForm.harga_jual.value = (one * 1) + (four * 1);}

        function stopCalc(){
        clearInterval(interval);}
        </script>
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