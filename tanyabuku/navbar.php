<header id="header" class="header header-hide">
    <div class="container" style="">
      <div id="logo" class="pull-left">
        <!-- <h1><a href="index.php" class="scrollto"><span>T</span>anya<span>B</span>uku</a></h1> -->

        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.php"><img src="ico/ico30.png" alt="" title="tanyabuku" /></a>
      </div>

     <!--  <form action="pencarian.php" method="get" class="pull-left navbar">
        <input name="keyword" class="form-control" type="text" placeholder="Cari Buku" aria-label="Search">
      </form> -->

<!-- #nav-menu-container -->
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="#get-started">Best Seller</a></li>
          <li><a href="#screenshots">Testimoni</a></li>
          <li><a href="#about-us">About</a></li>
          <li><a href="kategori.php">Buku</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>

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
      <form action="pencarian.php" method="get" class="pull-center navbar">
          <input type="text" class="form-control" name="keyword" placeholder="Cari Buku ">
      </form>
    </div>
  </header>
