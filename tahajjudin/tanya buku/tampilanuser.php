<!doctype html>
<html lang="en">
  <head>
    <title>Tanya Buku</title>
    <style>
        body {
          background-color: #D6E8ED;
          height:12 ;
          width:720 ;
        }   
        .floating-box {
          display: inline-block;
          width: 150px;
          height: 75px;
          margin: 10px;
          border: 3px solid #73AD21;  
      }
      </style>



    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body background="bgs.png">
  <br><br><br><br><br>   
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
                  <form action="" method="post" name="home">
                  <a class="nav-link" href=""><b>Home</b></a>
                  </form>
                </li>
                <li class="nav-item">
                  <form name="belanjaan" action="" method="post">
                  <a class="nav-link" href=""><b>Belanjaan</b></a>
                  </form>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=""><b>Profil</b></a>
                </li>
                <li class="nav-item">
                  <form action="halamanutama.php">
                  <button  type="submit" class=" btn btn-dark">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
    </nav>


<!-- ISI WEB -->
<iframe src="1userhome.php"
 style="border: 0; position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100%;"></iframe>

 
<!-- keterangan -->
<div class="fixed-bottom bg-light">
    <div class="container pt-4 pb-4 ">
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>