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
            <label>Judul Buku</label>
            <input type="text" class="form-control" name="Nama" required="">
          </div>
          <div class="form-group">
            <label>Harga Beli</label>
            <input class="form-control" type='number' name='harga_beli'    onFocus="startCalc();" onBlur="stopCalc();" required="" /> 
          </div>
           <div class="form-group">
            <label>Laba</label>
            <input class="form-control" readonly type=text value='0' name="laba"  readonly> 
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input class="form-control" readonly type=text value='0' name="harga_jual"  readonly> 
          </div>
          <div class="form-group">
            <input type='hidden' name='persen'   readonly="" value="<?php echo $pecah['persen']; ?>"    size='23'   onFocus="startCalc();" onBlur="stopCalc();" />  
          </div>
          <div class="form-group">
            <input type='hidden' name="pembagian"   readonly="  " value="100"  onFocus="startCalc();" onBlur="stopCalc();"  />  
          </div>
        </div>
          <div class="col-sm-6">  
          <div class="form-group">
            <label>Berat (gr)</label>
            <input type="number" class="form-control" name="Berat" required="">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" name="Stok" min="1" required="">
          </div>
          <div class="form-group">
            <label>Kategori Produk</label>
            <select class="form-control" name="Kategori" required="">
              <option value="">Pilih Status</option>
              <?php 
                        $ambil=$koneksi->query("SELECT * FROM kategori");
                        while($perkategori=$ambil->fetch_assoc()){
                       ?>
                       <option value="<?php echo $perkategori['nama_kategori'] ?>">
                         <?php echo $perkategori['nama_kategori'] ?>
                       </option>
                      <?php } ?>
            </select>
          </div>
           <div class="form-group">
            <label>Pengadaan Barang</label>
            <select class="form-control" name="Barang" required="">
              <option value="">Pilih Status</option>
              <option value="Supplier">Supplier</option>
              <option value="Konsinyasi">Konsinyasi</option>
            </select>
          </div>
        </div>
      </div>   
          <div class="col-sm-12">
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="Deskripsi" rows="10" minlength="10" maxlength="90" style="height: 213px;" required=""></textarea>
          </div>
          <div class="form-group">
              <label class="fa fa-camera" for="buktitrans"> Upload Bukti Bayar (Gambar Maks 5Mb) </label>
              <div class="input-icon">
              <input type="hidden" name="bukti">
              <input id="foto_transaksi" name="foto" type="file" required>
              <p class="foto_transaksi" style="color: red;"></p>
            </div> 
          </div>
        </div>
            <button class="btn btn-primary btn-block" name="save"> SIMPAN </button>
        </form>
        <?php 
        if (isset($_POST['save']))
        {
          $nama = $_FILES['foto']['name'];
          $lokasi = $_FILES['foto']['tmp_name'];
          move_uploaded_file($lokasi, "../foto_produk/".$nama);
          $koneksi->query("INSERT INTO produk
            (nama_produk,harga_jual,berat,foto_produk,deskripsi_produk,stok_produk,nama_kategori,pengadaan_barang,harga_beli,laba,persen_produk)
            VALUES('$_POST[Nama]','$_POST[harga_jual]','$_POST[Berat]','$nama','$_POST[Deskripsi]','$_POST[Stok]','$_POST[Kategori]','$_POST[Barang]','$_POST[harga_beli]','$_POST[laba]','$_POST[persen]')");

          echo "<div class='alert alert-info'>Data Tersimpan !</div>";
          echo "<meta http-equiv='refresh' content='1;url=produk.php'>";
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