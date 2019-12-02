<header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
         <a href="index.php"><img src="ico2.png" alt="" title="tanyabuku" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu"> 
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="#team">Best Seller</a></li>
          <li><a href="#screenshots">Testimoni</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#about-us">About</a></li>
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
      <form action="pencarian.php" method="get" class="pull-left navbar">
            <input type="text" class="form-control" name="keyword" placeholder="cari nama buku...">
      </form> 
    </div>
  </header>

