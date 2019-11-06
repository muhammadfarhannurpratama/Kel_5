<script>
    $(document).ready(function(){
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
<nav class='navbar navbar-default footer'>
        <div class='container' style='padding-bottom:3%'>
                        <h2 class='text-center'>Tentang Kami</h2>
                            <hr style='width : 60px;color:white;border:1px solid white'>
				<div class='row' style='padding-bottom : 3%'>
					<div class='col-md-3'>
                        <h4><b><span class='glyphicon glyphicon-map-marker'></span>	Kunjungi Kami</b></h4>
                            JALAN MANA AJA NOMOR 00 <br>
                                BONDOWOSO JAWA-TIMUR
                    </div>
                    <div class='col-md-3'>
                        <h4><b><span class='glyphicon glyphicon-phone'></span> Contact Person</b></h4>
                            080-000-000-000, ATAU <BR>
                            008-000-000-000
                    </div>

                    <div class='col-md-3 link-footer'>
                            <h4><b><span class='glyphicon glyphicon-envelope'></span> E-mail</b></h4>
                                <a href="">EMAILAJA@EMAIL.EM, ATAU</a><BR>
                                <a href="">EMAILGAUL@EMAIL.GAOL</a>
                    </div>

                    <div class='col-md-3 link-footer'>
                            <h4><b><span class='glyphicon glyphicon-globe'></span> Sosial Media</b></h4>
                                <a href="#">FACEBOOK</a>
                                <br><a href="#">TWITTER</a>
                                <br><a href="#">SKYPE</a>

                    </div>

                </div>
                    <div class='col-md-4 col-md-offset-4'>
                      <p id="msg"></p>
                      <form id="kritik-saran">
                                <div class="input-group">
                                    <input type="text" id="kritik-saran" class="form-control" placeholder="Apa Tanggapanmu?">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success" id="kritik-saran" data-url="<?php echo base_url().'Myjersey/Kritik_Saran' ?>"> <span class="glyphicon glyphicon-send"></span> Kirim</button>
                                        </span>
                                </div>
                      </form>
                    </div>
        </div>

            <div class="container-fluid" style='background : rgba(1,43,101,0.7);padding-top : 3%;padding-bottom:3%'>
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 col-md-offset-4">
                            <div class="sosmed-footer">
                            <a href=""><img class='img-responsive'  src="<?php echo base_url().'image/twit.png';?>" data-toggle="tooltip" title="Twitter"></a>
                            <a href=""><img data-toggle="tooltip" title="Facebook" class='img-responsive'  src="<?php echo base_url().'image/fb.png';?>"></a>
                            <a href=""><img data-toggle="tooltip" title="Skype" class='img-responsive'  src="<?php echo base_url().'image/sk.png';?>"></a>
                            <a href=""><img data-toggle="tooltip" title="Instagram" class='img-responsive'  src="<?php echo base_url().'image/ins.png';?>"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
</nav>
