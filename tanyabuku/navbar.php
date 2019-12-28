<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- jqu -->
  <script src="admin/assetss/lib/jquery/jquery.min.js"></script>
</head>
<body>
<header id="header" class="header header-hide">
    <div class="container" style="">
      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto"><span>T</span>anya<span>B</span>uku</a></h1>
      </div>

     <!--  <form action="pencarian.php" method="get" class="pull-left navbar">
        <input name="keyword" class="form-control" type="text" placeholder="Cari Buku" aria-label="Search">
      </form> -->

<!-- #nav-menu-container -->
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class=""><a href="index.php">Home</a></li>
          <li><a class="nav-buku" href="#get-started">Best Seller</a></li>
          <li><a class="nav-test" href="#screenshots">Testimoni</a></li>
          <li><a class="nav-about" href="#about-us">About</a></li>
          <li><a  href="kategori.php"class="menu-has-children nav-kategori">Semua Buku</a>
             <ul>
             <h5>Kategori</h5>
               <?php 
                  $ambil=$koneksi->query("SELECT * FROM kategori");
                  while($perkategori=$ambil->fetch_assoc()){
                ?>                        
                  <li  value="<?php echo $perkategori['nama_kategori'] ?>" onchange="this.form.submit();">
                      <a href="kategoritampung.php?nama_kategori=<?=$perkategori['nama_kategori']  ?>">
                        <?php echo $perkategori['nama_kategori'] ?>
                      </a>
                  </li>                                       
                <?php } ?>
            </ul>
          </li>
          <li><a class="nav-keranjang" href="keranjang.php">Keranjang</a></li>

          <!--jika sudah login (ada SESSION profil)-->
          <?php if (isset($_SESSION['pelanggan'])): ?>
            <li><a href="profiluser.php">Profil</a></li>
            <!--jika belum login ( belum ada SESSION profil)-->
              <?php endif ?> 

          <!--jika sudah login (ada SESSION pelanggan)-->
          <?php if (isset($_SESSION['pelanggan'])): ?>
            <li><a href="history.php">History</a></li>
            <li><a href="logout.php">Logout</a></li>
          <!--jika belum login ( belum ada SESSION pelanggan)-->
          <?php else :  ?>
          <li class="menu-has-children"><a href="#">Daftar</a>
            <ul>
              <li><a href="daftar.php">Daftar</a></li>
              <li><a href="login.php">Masuk</a></li>
            </ul>
          </li> 
          <?php endif ?>          
        </ul>
      </nav>
      <form action="pencarian.php" method="get" class="pull-center navbar nav-cari">
          <input type="text" class="form-control" name="keyword" placeholder="Cari Buku ">
      </form>
    </div>
  </header>
</body>
</html>