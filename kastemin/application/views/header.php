<?php
  if(empty($this->sess['email']))
  {
    
  }
  else
  {
    $data['status'] = $this->model->_datauser($this->sess['email']);
    if($data['status'][0]->status=='banned')
    {
      session_destroy();
      redirect(base_url());

    }
  }
 ?>
<title>MY JERSEY</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="<?php echo base_url(); ?>font" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>montserrat-font" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>bootstrap/custom.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src='<?php echo base_url(); ?>bootstrap/jquery-1.11.3.min.js'></script>
<script src="<?php echo base_url().'ajax.js'; ?>"></script>
<script src='<?php echo base_url(); ?>bootstrap/jquery.elevatezoom.js'></script>
<script src='<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js'></script>
<style>
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

</style>
<nav class='navbar navbar-default navbar-fixed-top nav-white' id='navigation'>
	<div class='container'>
		<div class='navbar-header'>
			<button class="navbar-toggle" data-toggle="collapse" data-target="#navnav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				<a href='<?php echo base_url(); ?>'><img class='navbar-brand' style="min-width:100px;min-height:60px;padding-top:0;" src='<?php echo base_url();?>image/My Jersey.png'></a>
		</div>
		 <div class="collapse navbar-collapse" id="navnav">
			<ul class='nav navbar-nav custom-ul' id='a'>
					<li><a href='<?php echo base_url(); ?>'>Beranda</a></li>
					<li class='dropdown'><a data-toggle='dropdown' href=''>Tentang <span class='caret'></span></a>
						<ul class='dropdown-menu'>
							<li><a href='<?php echo base_url();?>Pages/Carapemesanan'><span class='glyphicon glyphicon-chevron-right'></span> Cara Pemesanan</a></li>

							<li><a href='<?php echo base_url();?>Pages/Aturanpemesanan'><span class='glyphicon glyphicon-chevron-right'></span> Aturan Pemesanan</a></li>
							<li><a href='<?php echo base_url();?>Pages/Metodepembayaran'><span class='glyphicon glyphicon-chevron-right'></span> Metode Pembayaran</a></li>
						</ul>
					</li>
					<li class="dropdown"><a data-toggle='dropdown' href=''>List Jersey <span class='caret'></span></a>
						<ul class='dropdown-menu'>
							<li><a href="<?php echo base_url()?>Pages/Kaos"><span class='glyphicon glyphicon-chevron-right'></span> Produk Kaos</a></li>
							<li><a href="<?php echo base_url()?>Pages/Jerseypendek"><span class='glyphicon glyphicon-chevron-right'></span> Produk Jersey </a></li>
							<li><a href="<?php echo base_url()?>Pages/Semuatipe"><span class='glyphicon glyphicon-chevron-right'></span> Semua Tipe Produk</a></li>
              <li><a href="<?php echo base_url()?>Pages/Designsendiri"><span class='glyphicon glyphicon-chevron-right'></span> Design Sendiri</a></li>

						</ul>
					</li>
			</ul>
		<form class='navbar-form navbar-left' action='<?php echo base_url();?>Search/Jersey' method='post'>
            <div class="input-group">
                <input type='text' class='form-control' id='cari' value='<?php echo $this->input->post('cari'); ?>' name='cari' placeholder='Cari Disini...' required>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span> Cari
                        </button>
                    </span>
            </div>
        </form>
			<ul class='nav navbar-nav navbar-right custom-ul' id='a'>
				<li><a href='<?php echo base_url()."Keranjang" ?>'><span class='glyphicon glyphicon-shopping-cart'></span> Keranjang</a></li>
			<?php
			if(empty($sessionstatus)){
			 ?>
				<li><a id='custom' href='' data-target='#modal' data-toggle='modal'><span class='glyphicon glyphicon-log-in'></span> Masuk</a>/<a id='custom' href='<?php echo base_url(); ?>registrasi'><span class='glyphicon glyphicon-plus-sign'></span> Daftar</a></li>
			<?php } else{?>
			<li class='dropdown'><a data-toggle='dropdown' href=''><?php echo ucwords("halo, ". $sessionnama); ?> <span class='caret'></span></a>
				<ul class='dropdown-menu'>
                    <li><a href='<?php echo base_url();?>Profile'><span class='glyphicon glyphicon-user'></span> Akun Saya</a></li>
					<li><a href='<?php echo base_url();?>Login/logout'><span class='glyphicon glyphicon-off'></span> Keluar</a>
				</ul>
			</li>
			<?php } ?>
			</ul>
			</div>
	</div>
</nav>
		<div class='modal fade' id='modal' role='dialog'>
			<div class='modal-dialog' style="width:60%">
				<div class='modal-content'>
					<div class='modal-header' style='background: #1B1E24'>
						<button class='close' data-dismiss='modal' style='color:white'>&times;</button>
            <center><img src="<?php echo base_url().'image/My Jersey1.png' ?>" style="width:150px;"></center>

					</div>

					<div class='modal-body' style="background:#FFFFFF;position:relative">
            <div class="container" style="padding-left:13%;padding-right:15%">
              <div class="row">
                <div class="col-md-7">
                  <div class="deskripsi-login">
                    My Jersey Hadir Untuk Anda. Belanja Jersey Di My Jersey, Harga Terjangkau Kualitas Terjamin
                  </div>
                    	<form action='<?php echo base_url();?>login/login' method='post'>
												<br>
													<label>E
													-mail</label>
														<input type='email' name='email' class="daftar form-control" required>
												<br>
													<label>Password</label>
														<input type='password' name='pass' class="daftar form-control" required>
												<br>

													<button class='btnlogin' style="padding:10px 40px 10px;"> MASUK <span class='glyphicon glyphicon-chevron-down animasi'></span></button>
											</form>
                    </div>
                </div>
            </div>
                                                <br>
                                                <h4 class='text-center'>Tentang Kami</h4>
                                                       <center>
                                                            <a href='#'><img src='<?php echo base_url()."image/Facebook-48.png" ?>'></a>
                                                           <a href='#'><img src='<?php echo base_url()."image/Google Plus-48.png" ?>'></a>
                                                           <a href='#'><img src='<?php echo base_url()."image/Twitter-48.png" ?>'></a>
                                                           <a href='#'><img src='<?php echo base_url()."image/Instagram-48.png" ?>'></a>

                                                        </center>

                    </div>

					<div class='modal-footer' style='background:#f5f5f5'>
						 Belum Punya Akun? Daftar <a href='<?php echo base_url(); ?>registrasi'>Disini</a>
					</div>
				</div>
			</div>
		</div>
<a href="" id="backtotop"><img src="<?php echo base_url().'image/top.jpg' ?>" class="back-to-top"></a>
<script>
$(document).ready(function () {
  $(".back-to-top").css({
    "transform" : "translateX(100%)",
    "-moz-transform" : "translateX(100%)",
    "-webkit-transform" : "translateX(100%)",
    "-o-transform" : "translateX(100%)",

  })
    var navi = $("#navigation");
    //deklarasi variable scrolltop = 0
    var scrollTop = 0;
    $(window).scroll(function () {
        var y = $(this).scrollTop();

        if (y > scrollTop) {
          //-100 untuk mentranslateY -100, artinya menu navigasi akan hilang karna di translateY -100
         var pos = -100;

        }
        else {
        var pos = 0;

    	}
        scrollTop = y;
        navi.css({
        	"-moz-transition" : "all .3s ease",
        	"-o-transition" : "all .3s ease",
        	"-webkit-transition" : "al .3s ease",
        	"transition" : "all .3s ease",
            "-webkit-transform": "translateY(" + pos + "%)",
            "-moz-transform": "translateY(" + pos + "%)",
            "-o-transform": "translateY(" + pos + "%)",
            "transform": "translateY(" + pos + "%)"
        });
        if(y < 300){
          $(".back-to-top").css({
            "transform" : "translateX(100%)",
            "-moz-transform" : "translateX(100%)",
            "-webkit-transform" : "translateX(100%)",
            "-o-transform" : "translateX(100%)",
            "transition" : "all.4s ease",
            "-moz-transition" : "all.4s ease",
            "-webkit-transition" : "all.4s ease",
            "-o-transition" : "all.4s ease"

          })
        }
        else{
            $(".back-to-top").css({
              "transform" : "translateX(-50%)",
              "-moz-transform" : "translateX(-50%)",
              "-webkit-transform" : "translateX(-50%)",
              "-o-transform" : "translateX(-50%)",
              "transition" : "all.4s ease",
              "-moz-transition" : "all.4s ease",
              "-webkit-transition" : "all.4s ease",
              "-o-transition" : "all.4s ease"

            });
        }

    });

    $("#backtotop").click(function(e){
        e.preventDefault();
        $("body").animate({scrollTop: 0}, 1000);
    });

});
</script>
