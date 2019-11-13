<?php 
if (isset($_POST["masuk"])) {
    if ($_POST["username"] == "user" && $_POST["password"] == "123") {
        header("Location: tampilanuser.php");
        exit;
    }else{
    $error = true;
  }
}

if (isset($_POST["daftar"])) {
      header("Location: daftar.php");
      exit;
  }else{
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Tanya Buku</title>
    <style>
      .box{
        width: 80%;
        margin-top: 5%;
        box-shadow: 0 3px 20px rgba(0,0,0,0.3);
        padding: 25px;
        background: white;
      }
        body {
          background-color: #D6E8ED;
          height:12 ;
          width:720 ;
        }   
    .buttona {
      width: 49%;
    }
      </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body background="bgs.png">
 <!-- navbar logo tanya buku, button login, home -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top  shadow p-3 mb-5 bg-white rounded" id="mainNav">
        <div class="container">
          <img src="logo.png" alt="" width="80" height="50">
          <button class="navbar-toggler navbar-togler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="  navbar-nav ml-auto ">
              <li class="nav-item">
                  <form action="halamanutama.html">
                    <a class="nav-link" href="halamanutama.php"><b>Home</b></a>
                  </form>
              </li>
            </ul>
          </div>
        </div>
  </nav>
  <br><br><br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
<!-- input username dan pasword -->
    <div class="container box">
            <form class="" action="" method="post">
              <h1 class="text-center">LOGIN</h1>

              <div class="form-group">
                <label for="username">Username</label>
                <input name="username" id="username" type="text" class="form-control" placeholder="masukan username anda">
              </div>
              
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" id="password" type="password" class="form-control" placeholder="masukan password anda">
              </div>

              <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dropdownCheck">
                  <label class="form-check-label" for="dropdownCheck">
                    Remember me
                  </label>
                </div>
              </div>
              <center>
                <button name="masuk" type="submit" class="btn-primary buttona">MASUK</button>
                <button name="daftar" type="submit" class="btn-primary buttona" >DAFTAR</button>
              </center> 
              </form>
<!-- button login dan daftar -->         
                          <?php if(isset($error)){ ?>
                            <center><h9 style="color:red; font-style: italic" >username / password salah</h3></center>
                          <?php } ?>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>  
</div>

<!-- keterangan -->
<br><br><br><br><br>
  <div class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
        <div class="pt-4 pb-4 ">
    
        </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>