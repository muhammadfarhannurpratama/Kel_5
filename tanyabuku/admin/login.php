<?php
session_start(); 
//koneksi
$koneksi=new mysqli("localhost","root","","db_tanyabuku");
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tanya Buku! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- New Style -->
    <link rel="stylesheet" href="../build/css/newstyle.css">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Login Administrator</h1>
              <div>
                <input type="text" class="form-control" name="user" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass" required="" />
              </div>
              <div>
                <button class="btn btn-primay" name="login">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>  
                </p>
                <?php 
                if (isset($_POST['login']))
                {
                  $ambil=$koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]'
                    AND password='$_POST[pass]'");
                  $yangcocok=$ambil->num_rows;
                  if($yangcocok==1)
                  {
                    $_SESSION['admin']=$ambil->fetch_assoc();
                    echo "<div class='alert alert-info'>Login Berhasil !</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                  }
                  else 
                  {
                    echo "<div class='alert alert-danger'>Login Gagal !</div>";
                    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                  }
                }

                 ?>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-book"></i> Tanya Buku!</h1>
                  <p>©2019 All Rights Reserved. Tanya Buku! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-book"></i> Tanya Buku!</h1>
                  <p>©2019 All Rights Reserved. Tanya Buku! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
