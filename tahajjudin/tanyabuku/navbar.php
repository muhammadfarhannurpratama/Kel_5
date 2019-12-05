<header id="header" class="header header-hide">
    <div class="container" style="">
      <div id="logo" class="pull-left">
        <!-- <h1><a href="index.php" class="scrollto"><span>T</span>anya<span>B</span>uku</a></h1> -->

        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.php"><img src="ico2.png" alt="" title="tanyabuku" /></a>
      </div>

      <div class="pull-left navbar">
                <input class="form-control" type="search" placeholder="Cari Buku" aria-label="Search">
      </div>

<!-- #nav-menu-container -->
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="#team">Best Seller</a></li>
          <li><a href="#screenshots">Testimoni</a></li>
          <li><a href="#about-us">About</a></li>
          <li><a href="kategori.php">Kategori</a></li>
          <li><a href="checkout.php">Checkout</a></li>
          <!--jika sudah login (ada SESSION pelanggan)-->
          <?php if (isset($_SESSION['pelanggan'])): ?>
            <li><a href="history.php">History</a></li>
            <li><a href="logout.php">Logout</a></li>
          <!--jika belum login ( belum ada SESSION pelanggan)-->
      <?php else :  ?>
      <li class="menu-has-children"><a href="">Daftar</a>
            <ul>
              <li><a href="daftar.php">Daftar</a></li>
              <li><a href="login.php">Masuk</a></li>
            </ul>
          </li> 
          <?php endif ?>          
        </ul>
      </nav>
    </div>
  </header>
