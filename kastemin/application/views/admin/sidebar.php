<?php
  if (empty($this->sess['user']))
  {
      redirect(base_url().'Admin');
  }
 ?>
<title>Admin Panel</title>

<link href="<?php echo base_url(); ?>font" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>montserrat-font" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>bootstrap/custom.css" rel="stylesheet">
<script src='<?php echo base_url(); ?>bootstrap/jquery-1.11.3.min.js'></script>
<script src="<?php echo base_url().'ajax.js'; ?>"></script>
<script src='<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js'></script>
<style>
.error{
  background: #ea4335;
  color : white;
  padding : 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -o-border-radius: 5px;

}

    .panel{
        border : 0;
    }
    @font-face {
    font-family: 'montserratregular';
    src: url('<?php echo base_url(); ?>montserrat-font/montserrat-regular-webfont.eot');
    src: url('<?php echo base_url(); ?>montserrat-font/montserrat-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo base_url(); ?>montserrat-font/montserrat-regular-webfont.woff2') format('woff2'),
         url('<?php echo base_url(); ?>montserrat-font/montserrat-regular-webfont.woff') format('woff'),
         url('<?php echo base_url(); ?>montserrat-font/montserrat-regular-webfont.ttf') format('truetype'),
         url('<?php echo base_url(); ?>montserrat-font/montserrat-regular-webfont.svg#montserratregular') format('svg');
    font-weight: normal;
    font-style: normal;

}
@font-face {
    font-family: 'ubunturegular';
    src: url('<?php echo base_url(); ?>font/ubuntu-r-webfont.eot');
    src: url('<?php echo base_url(); ?>font/ubuntu-r-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo base_url(); ?>font/ubuntu-r-webfont.woff2') format('woff2'),
         url('<?php echo base_url(); ?>font/ubuntu-r-webfont.woff') format('woff'),
         url('<?php echo base_url(); ?>font/ubuntu-r-webfont.ttf') format('truetype'),
         url('<?php echo base_url(); ?>font/ubuntu-r-webfont.svg#ubunturegular') format('svg');
    font-weight: normal;
    font-style: normal;

}
    body{

         background: #ecedf0;
    }
    .welcome{
      margin-top: 3%;
      padding: 20px;
      font-size: 20px;
      background: white;
      border-radius: 10px;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      -o-border-radius: 10px;

    }
    .menu-atas{
        position: fixed;
        margin-bottom : 0;
        margin-top: 5%;
        background: #1d2127;
        border : 0;
        padding-top : 10px;
        padding-bottom : 10px;
        border-radius : 0px;
        -webkit-border-radius : 0px;
        -moz-border-radius : 0px;
        -o-border-radius : 0px;
        z-index : 1;
        width : 100%;
    }
    .menu-atas li a{
            font-family: 'montserratregular';
    }
    .col-md-2.sidebar{
        top:0;
        padding-left : 0px;
        padding-right :0;
        padding-top:5%;
        padding-bottom : 16%;
        background: #1d2127;
        position: fixed;
        z-index: 1;
        overflow: auto;
        transform: translateY(10%);
        -moz-transform: translateY(10%);
        -webkit-transform: translateY(10%);
        -o-transform: translateY(10%);

    }
    .sidebar li a{
      font-family: 'montserratregular';
      margin: 5px 0px 5px;
      color : #D3D6DB;
      transition : all .1s ease;
      -o-transition : all .1s ease;
      -moz-transition : all .1s ease;
      -webkit-transition : all .1s ease;
    }
    .sidebar li a:hover{
    background: none;
    border-left : 3px solid #337cbb;
    transition : all .1s ease;
    -o-transition : all .1s ease;
    -moz-transition : all .1s ease;
    -webkit-transition : all .1s ease;

    }
    .sidebar li a:focus{
      outline: none;
      background: none;
    }
    #container{
        max-width : 990px;
        min-width : 1px;
        margin : auto;
        height : auto;
        padding-top : 20px;
        padding-left : 30px;
        padding-right : 30px;
        margin-top: 12%;
    }
    .sidebar li ul{
      list-style-type: none;
    }
    .sidebar li ul li{
      margin: 20px 0px 20px;
    }
    .sidebar li ul li a{
      padding : 10px 0px 10px 10px;
    }
    .sidebar li ul li a:hover{
      text-decoration: none;
    }
    .alert-success{
        border-radius : 0px;
        -webkit-border-radius : 0px;
        -moz-border-radius : 0px;
        -o-border-radius : 0px;
        border-left : 3px solid #34A853;
    }
    .sidebar li i{
      font-size: 18px;
    }
</style>

<script>

    $(document).ready(function(){
        $("button.konfirmasiJS").click(function(e){
            e.preventDefault();
            if(confirm('Apakah Anda Yakin?'))
            {
                window.location=$(this).data("url")
            }
            else
            {
            }
          });

            $("button.link-button").click(function(e){
                e.preventDefault();
                window.location=$(this).data("url")

        });
    });
</script>
<nav class="navbar navbar-default navbar-fixed-top container-fluid" style="background:white;padding:5">
  <a href="<?php echo base_url().'Admin/Dashboard'; ?>"><img src="<?php echo base_url().'image/My Jersey.png'; ?>" style="min-width:100px;min-height:60px;padding-top:5;" class="navbar-brand"></a>
  <div class="col-md-6 col-md-offset-2">
      <div class="input-group" style="margin-top : 1.5%">
          <input type="text" class="form-control" placeholder="Cari Jersey Disini...">
          <span class="input-group-btn">
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
          </span>
      </div>
  </div>

  <ul class="nav navbar-nav navbar-right" style="margin-right:10px">
      <li class="dropdown"><a data-toggle="dropdown" href=""> <img src="<?php echo base_url().'image/cirlce.png'; ?>" width="40"> Admin <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo base_url().'Admin/Logout'; ?>"><span class="glyphicon glyphicon-off"></span> Keluar</a></li>

          </ul>
      </li>
  </ul>

</nav>

<nav class="navbar navbar-inverse menu-atas">
        <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="sidebar" class="collapse navbar-collapse">
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <ul class="nav navbar-nav sidebar">
              <li><a href="<?php echo base_url().'Admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href="<?php echo base_url().'Admin/Startup/Management-Startup'; ?>"><i class="fa fa-shirtsinbulk"></i> Management Startup </a></li>
                <li><a href="<?php echo base_url().'Admin/Transaksi'; ?>"><i class="fa fa-balance-scale"></i> Transaksi
                  <?php if($transaksi_rows==0) {}else{?><span class="badge" style="background:#34A853"><?php echo $transaksi_rows; ?></span><?php }?></a></li>
                <li><a href="#" data-toggle="collapse" data-target="#jersey"><i class="fa fa-shirtsinbulk"></i> Management Produk <i class="fa fa-caret-down" style="font-size:12"></i></a>
                  <ul class="collapse" id="jersey">
                    <li><a href="<?php echo base_url().'Admin/Addjersey'; ?>">Add</a></li>
                    <li><a href="<?php echo base_url().'Admin/Editjersey'; ?>">Edit</a></li>
                    <li><a href="<?php echo base_url().'Admin/Removejersey'; ?>">Delete</a></li>
                  </ul>
                </li>
                <li><a href="#" data-toggle="collapse" data-target="#master-data"><i class="fa fa-file"></i> Master Data <i class="fa fa-caret-down" style="font-size:12"></i></a>
                  <ul class="collapse" id="master-data">
                    <li><a href="<?php echo base_url().'Admin/Liga'; ?>">Kategori (Liga)</a></li>
                    <li><a href="<?php echo base_url().'Admin/Klub'; ?>">Sub-Kategori (Klub)</a></li>
                    <li><a href="<?php echo base_url().'Admin/Masterdata/Province'; ?>">Province</a></li>
                    <li><a href="<?php echo base_url().'Admin/Masterdata/City'; ?>">City</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url().'Admin/Komentar'; ?>"><i class="fa fa-comments"></i> Komentar
                  <?php if($komen_rows==0) {}else{?><span class="badge" style="background:#337cbb"><?php echo $komen_rows; ?></span><?php } ?></a></li>

                <li><a href="<?php echo base_url().'Admin/Kritik_Saran'; ?>"><i class="fa fa-quote-right"></i> Kritik Dan Saran
                  <?php if($kritik_saran_rows==0) {}else{?><span class="badge" style="background:#EB4D40"><?php echo $kritik_saran_rows; ?></span> <?php } ?></a></li>
                    <?php if($this->sess['status']==1){?>
                    <li><a href="#" data-toggle="collapse" data-target="#config-user"><i class="fa fa-group"></i> Konfigurasi User <i class="fa fa-caret-down" style="font-size:12"></i></a>
                      <ul class="collapse" id="config-user">
                        <li><a href="<?php echo base_url().'Admin/Adminconfig'; ?>">Admin</a></li>
                        <li><a href="<?php echo base_url().'Admin/Userconfig'; ?>">User</a></li>
                      </ul>
                    </li>
                    <?php } else{}?>
            </ul>
        </div>
        <div class="col-md-10 col-md-offset-2">
            <div class="row placeholders">
