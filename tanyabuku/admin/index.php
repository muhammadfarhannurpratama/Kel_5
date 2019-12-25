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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logotanyabuku.ico" type="image/ico" />

    <title>Tanya Buku ! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-book"></i> <span>Tanya Buku !</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Selamat Datang</span>
                <h2><?php echo $_SESSION['admin']['nama_lengkap'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                    <ul class="nav child_menu">
                      
                    </ul>
                  </li>
                  <li><a href="index.php?halaman=produk"><i class="fa fa-cube"></i> Produk</a>
                    <ul class="nav child_menu">
                      
                    </ul>

                    </li>
                  <li><a href="index.php?halaman=kategori"><i class="fa fa-cube"></i> Kategori</a>
                    <ul class="nav child_menu">
                      
                    </ul>

                  </li>
                  <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a>
                    <ul class="nav child_menu">
                     
                    </ul>
                  </li>

                  <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file"></i> Laporan</a>
                    <ul class="nav child_menu">
                     
                    </ul>
                  </li>

                  <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> Pelanggan </a>
                    <ul class="nav child_menu">

                    </ul>

                    </li>
                  <li><a href="index.php?halaman=tambahadmin"><i class="fa fa-user"></i> Tambah Admin</a>
                    <ul class="nav child_menu">

                    </ul>

                  </li>
                  <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a>
                    <ul class="nav child_menu">

                    </ul>
                  </li>
                </ul>    
              </div>
            </div>

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Haroen 
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Haroen</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Haroen</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Haroen</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Haroen</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class=" col-sm-12"> 
            <?php 
                if (isset($_GET['halaman'])) 
                {
                        if ($_GET['halaman']=="produk") 
                        {
                            include 'produk.php';
                        }   
                        elseif ($_GET['halaman']=="pembelian") 
                        {
                            include 'pembelian.php';
                        }
                        elseif ($_GET['halaman']=="pelanggan")
                         {
                            include 'pelanggan.php';
                        }
                        elseif ($_GET['halaman']=="detail")
                         {
                          include 'detail.php';
                        }
                        elseif ($_GET['halaman']=="tambahproduk") 
                        {
                          include 'tambahproduk.php';
                        }
                        elseif ($_GET['halaman']=="hapusproduk") 
                        {
                          include 'hapusproduk.php';
                        }
                        elseif ($_GET['halaman']=="ubahproduk")
                        {
                          include 'ubahproduk.php';
                        }
                        elseif ($_GET['halaman']=="logout")
                        {
                          include 'logout.php';
                        }
                        elseif ($_GET['halaman']=="tambahadmin") 
                        {
                          include 'tambahadmin.php'; 
                        }
                        elseif ($_GET['halaman']=="tambahdataadmin") 
                        {
                          include 'tambahdataadmin.php'; 
                        }
                        elseif ($_GET['halaman']=="hapusadmin") 
                        {
                          include 'hapusadmin.php'; 
                        }
                        elseif ($_GET['halaman']=="ubahadmin") 
                        {
                          include 'ubahadmin.php'; 
                        }
                        elseif ($_GET['halaman']=="hapuspelanggan") 
                        {
                          include 'hapuspelanggan.php'; 
                        }
                        elseif ($_GET['halaman']=="pembayaran") 
                        {
                          include 'pembayaran.php';
                        }
                        elseif ($_GET['halaman']=="laporan_pembelian") 
                        {
                          include 'laporan_pembelian.php';
                        }
                         elseif ($_GET['halaman']=="kategori") 
                        {
                          include 'kategori.php';
                        }
                         elseif ($_GET['halaman']=="tambahkategori") 
                        {
                          include 'tambahkategori.php';
                        }
                         elseif ($_GET['halaman']=="ubahkategori") 
                        {
                          include 'ubahkategori.php';
                        }
                         elseif ($_GET['halaman']=="hapuskategori") 
                        {
                          include 'hapuskategori.php';
                        }
                }
                else
                {
                    include 'home.php';
                }    
                ?>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
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
