<!doctype html>
<html lang="en">
  <head>
    <title>tanyabuku</title>
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
                  <a class="nav-link" href="halamanutama.html"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chart2.html"><b>Belanjaan</b></a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Profil.html"><b>Profil</b></a> 
                </li>
                <li class="nav-item">
                    <form action="logout.html">
                      <button type="submit" class=" btn btn-dark">Logout</button>
                    </form>
                </li>
              </ul>
            </div>
          </div>
    </nav>
    <br><br><br><br>

    <!-- membuat kategori,membuat search input dan button -->
    <form action="" class="form-group">
      <nav class="">
          <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <table border="0" cellpadding="5" cellspacing="0">

                  <tr>
                    <td><center><iframe src="" frameborder="1" height="500" width="250"></iframe></center></td>
                    <h1><leght>Transaksi</leght></h1>







                    <!-- Tabel Kanan -->
                    <td><iframe src="" frameborder="1" height="500" width="750"></iframe></td>
                   <h1> <right>Tujuan</right> </h1>  
                  </tr>
                  <form action=" Tujuan.html" method="get">
 
                    <tr>
                        <td> Nama  </td>
                        <td><input type="text" /></td>
                    </tr>
                    <tr>
                        <td> Provinsi  </td>
                        <td><input type="text" /></td>
                    </tr>
                    <tr>
                        <td> Kota  </td>
                        <td><input type="text" /></td>
                    </tr>
                  
                    <tr>
                        <td> Kode Pos  </td>
                        <td><input type="number" /></td>
                    </tr>
                    <tr>
                        <td> No Telepon  </td>
                        <td><input type="number" /></td>
                    </tr>
                    <tr>
                        <td> Kurir  </td>
                        <td><input type="text" /></td>
                    </tr>
                    <tr>
                        <td> Pembayaran  </td>
                        <td><input type="text" /></td>
                    </tr>
                    
                    </form>
                </table>
                <input class="btn btn-primary" type="reset" value="Reset">
                <a class="btn btn-primary" href="chart3.html" role="button">Lanjut</a>
                
                
              </div>
              <div class="col-lg-2"></div>
          </div>
      </nav>
    </form>
    
  <!-- keterangan -->
  <div class="navbar navbar-expand-lg navbar-light bg-light">
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