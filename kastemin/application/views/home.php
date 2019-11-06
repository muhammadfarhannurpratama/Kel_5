
<?php
include "header.php";
?>
<style>
.img-rounded{
    max-height : 67.5px;
}

.flaticon img{
    max-height: 100px;
}
</style>
<script>
$(document).ready(function(){
		$(".get").click(function(e){
            e.preventDefault();
			var y = $("#getstarted").offset();
			$("body").animate({scrollTop : y.top},1000);
		});


});
</script>

<div class='jumbotron backtotop' style='background-image : url(<?php echo base_url().'banner/'.$startup[0]->banner; ?>);background-size : 100% 100%'>
		<div class='container'>
				<center><div id='title' style='margin-top:18%;margin-bottom:20%'><h2><?php echo $startup[0]->title; ?></h2>
          <div class="startup">
            <?php echo $startup[0]->description; ?>
          </div>
					<button id='btn-custom' class='get'><div class='animasi-ketik'>get started <span class='glyphicon glyphicon-chevron-down animasi' ></span></div></button>
				</div></center>
		</div>
</div>
<div class='container' id='getstarted' style="position:relative">
		<center><h2 class='hometitle' style="border-bottom:none"> <span><i class="glyphicon glyphicon-menu-right"></i>Kenapa Harus My Jersey?<i class="glyphicon glyphicon-menu-left "></i></span>
            </h2>                <hr style="border:2px solid #2FA3DE;width:60px;">
            <p class="subtitle">Mungkin Pejelasan Dibawah Ini Cukup Membantu Anda</p>
</center>

			<div class='row' style="padding-top:30;margin-bottom:8%">
				<div class='col-md-3 thumbnail border-green flaticon' style='padding-top:20px;margin-left:4%;margin-right:4%'>
					<img src='<?php echo base_url(); ?>image/tool.png' class='img-responsive'>
						<div class='title' style="color:#05CC86">Aman</div>
							<p style='text-align:center'>Kami Sangat Mengutamakan Keamanan, Karna Dalam Bertransaksi Jual Beli, Kami Tidak Ingin Ada Pihak Yang Dirugikan</p>
			</div>

			<div class='col-md-3 thumbnail border-red flaticon' style='padding-top:20px;margin-left:4%;margin-right:4%'>
					<img src='<?php echo base_url(); ?>image/weapon.png' class='img-responsive'>
						<div class='title' style="color:#D90027">Terpercaya</div>
							<p class='paragraf text-center'>My Jersey Adalah Salah Satu Online Shop Yang Terpercaya, Sudah Banyak Customer Yang Puas Karena Pelayanan Dari Kami</p>
			</div>

			<div class='col-md-3 thumbnail border-blue flaticon' style='padding-top:20px;margin-left:4%;margin-right:4%'>
					<img src='<?php echo base_url(); ?>image/business.png' class='img-responsive'>
						<div class='title'>Terlengkap</div>
							<p style='text-align:center'>Pusat Jersey Grade Ori Terlengkap, kami menyediakan berbagai jenis jersey grade ori dengan pilihan yang beraneka ragam</p>
			</div>

		</div>

        <div class="row">
            <center><h2 class='hometitle' style="border-bottom:0"><span><i class="glyphicon glyphicon-menu-right pull-left"></i> Produk Kami
                <i class="glyphicon glyphicon-menu-left pull-right"></i></span>
                </h2>
                <hr style="border:2px solid #2FA3DE;width:60px;">
                <p class="subtitle">Mulai Dari Yang Terbaru Sampai Yang Terlaris</p>
            </center>
            <br>
            <?php foreach ($baru as $a){?>
            <div class='col-md-4'>
			<div class='test thumbnail wrap' style="position:relative">
        <img src="<?php echo base_url().'image/1.png'; ?>" class="img-deskripsi">
        <img data-toggle='tooltip' data-placement='top' title='<?php echo $a->nama; ?>' src='<?php echo base_url();?>foto/<?php echo $a->foto ;?>' class='img-responsive'>
            <div class="deskripsi" style="background:rgba(234, 67, 53, 0.8)"><?php echo substr($a->deskripsi, 0,80)."...";?>
            <a href="<?php echo base_url().'Detail/Jersey/'.$a->url; ?>">Cek Disini</a>
            </div>
            </div>
            <?php echo "<h4>".$a->nama."</h4>";?>
            <hr>
                <div class="row placeholders">
                    <div class="col-md-4" style="margin-bottom:6%">
                        <?php echo "Rp. ".number_format($a->harga,0,',','.'); ?>
			        </div>
                    <div class="col-md-8">
                        <?php
                            if($a->jumlah==0){
                        ?>
                        <img src="<?php echo base_url().'image/habis.PNG'; ?>" class="img-responsive">

                        <?php } else{?>

                        <img src="<?php echo base_url().'image/ada.PNG'; ?>" class="img-responsive">

                        <?php } ?>
                    </div>
                </div>			</div>
            <?php }?>
            <?php foreach ($view as $a){?>
            <div class='col-md-4' style="margin-bottom:6%">

			<div class='test thumbnail wrap' style="position:relative">
        <img src="<?php echo base_url().'image/2.png'; ?>" class="img-deskripsi">
        <img data-toggle='tooltip' data-placement='top' title='<?php echo $a->nama; ?>' src='<?php echo base_url();?>foto/<?php echo $a->foto ;?>' class='img-responsive'>
            <div class="deskripsi"><?php echo substr($a->deskripsi, 0,80)."...";?>
              <a href="<?php echo base_url().'Detail/Jersey/'.$a->url; ?>">Cek Disini</a>

            </div>
            </div>
            <?php echo "<h4>".$a->nama."</h4>";?>
            <hr>
                <div class="row placeholders">
                    <div class="col-md-4">
                        <?php echo "Rp. ".number_format($a->harga,0,',','.'); ?>
			        </div>
                    <div class="col-md-8">

                        <?php
                            if($a->jumlah==0){
                        ?>
                        <img src="<?php echo base_url().'image/habis.PNG'; ?>" class="img-responsive">

                        <?php } else{?>

                        <img src="<?php echo base_url().'image/ada.PNG'; ?>" class="img-responsive">

                        <?php } ?>                    </div>
                </div>
            </div>
            <?php }?>

			<?php foreach ($seller as $a){?>
            <div class='col-md-4' style="margin-bottom:6%">
			<div class='test thumbnail wrap' style="position:relative">
        <img src="<?php echo base_url().'image/3.png'; ?>"class="img-deskripsi">
        <img data-toggle='tooltip' data-placement='top' title='<?php echo $a->nama; ?>' src='<?php echo base_url();?>foto/<?php echo $a->foto ;?>' class='img-responsive'>
            <div class="deskripsi" style="background:rgba(52, 168, 83, 0.8)"><?php echo substr($a->deskripsi, 0,80)."...";?>
              <a href="<?php echo base_url().'Detail/Jersey/'.$a->url; ?>">Cek Disini</a>

            </div>
            </div>
            <?php echo "<h4>".$a->nama."</h4>";?>
                <hr>
            <div class="row placeholders">
                    <div class="col-md-4">
                        <?php echo "Rp. ".number_format($a->harga,0,',','.'); ?>
			        </div>
                    <div class="col-md-8">

                        <?php
                            if($a->jumlah==0){
                        ?>
                        <img src="<?php echo base_url().'image/habis.PNG'; ?>" class="img-responsive">

                        <?php } else{?>

                        <img src="<?php echo base_url().'image/ada.PNG'; ?>" class="img-responsive">

                        <?php } ?>                    </div>
                </div>
            </div>
            <?php }?>
                        </div>

            <center><a href="<?php echo base_url().'Pages/Semuatipe'; ?>"><button class="btnlogin" style="text-transform:uppercase;padding:14;letter-spacing:3px"> Selengkapnya <span class="glyphicon glyphicon-picture"></span></button></a></center>

        	<div class='row' style='margin-top:8%;margin-bottom:3%'>
			<center><h2 class='hometitle'><span><i class="glyphicon glyphicon-menu-right pull-left"></i> Apa Kata Mereka? <i class="glyphicon glyphicon-menu-left pull-right"></i></span>
            </h2>
              <hr style="border:2px solid #2FA3DE;width:60px;">
                  <p class="subtitle">Survey Para Customer Yang Telah Belanja Di My Jersey</p>
                </center>
			<br>
    </div>
</div>
      <div class="container-fluid" style="background:white;padding:3% 0% 3%">
        <div class="container">
          <div class="row">
            <?php foreach($kritik_saran as $a){?>
              <div class="col-md-4">
                <div class="test thumbnail" style="margin-top:43px;">
                  <img src="<?php echo base_url().'profil/'.$a->foto; ?>" class="img-circle">
                    <div class="survey">
                      <p style="color:#2FA3DE;"><?php echo ucwords($a->nama); ?></p>
                      <p>Customer</p>
                      <i>"<?php echo ucwords($a->content); ?>"</i>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function(){
            $("#backtotop").click(function(e){
                e.preventDefault();
                $("body").animate({scrollTop:0}, 1200);
            });
        });
    </script>
            <script>

            </script>


<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
<?php
	include "footer.php";
?>
