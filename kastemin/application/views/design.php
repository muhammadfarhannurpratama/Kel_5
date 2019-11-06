<?php
include "header.php";
?>
<script>
	$(document).ready(function(){
		$("#zoom_01").elevateZoom({
			easing : true,
			zoomWindowWidth : 200,
			zoomWindowHeight : 200,
			lensFadeIn : 500,
			lensFadeOut : 500,
		});
	});
</script>

<div class='container content'>

	<?php
		if(isset($_GET['msg']))
		{
    ?>
    <div class="row">
		<div class="col-md-5">
            <div class="alert alert-danger">

        <?php 
			if($_GET['msg']=='error')
			{
                echo "Pastikan Anda Telah Login Terlebih Dahulu";
			}
			else
            {
                if($_GET['msg']=='errorqty')
                {
					echo "Pastikan Kuantitas Jersey Sudah Benar";
                }
                else
                {
                    if($_GET['msg']=='errorukuran')
                    {
                        echo "Pastikan Ukuran Yang Dipilih Sudah Benar";
                    }
                    else
                    {
                        echo "Pastikan Anda Telah Memilih Ukuran Jersey";
                    }
	            }
            } 
    echo "</div>
    </div>
    </div>
	";}?>



    <div class='col-md-5 thumbnail text-center'>
		<img style='max-height:450px' src="<?php echo base_url(). 'foto/polos.png' ?>" id='zoom_01' data-zoom-image="" class='img-responsive'>
		<div class='title-produk' style='color:#1d1d1d'></div>

	</div>
		<div class='col-md-7'>
			<form action="<?php echo base_url().'Keranjang/Save_design'; ?>" method="POST" enctype="multipart/form-data">
				<b><i style='font-size:18;color:#337cbb'>Isi Pesanan Anda</i></b>
					<br>
					<font size='3px'>Isi Pesanan Anda sesuai Dengan Kebutuhan Anda</font>
						<br><br><br>
							<div class='table-responsive'>
								<table class='table table-hover'>
									
									<tr>
										<td>Jenis Kain</td>
										<td><select name="jenis_kain" name="jenis_kain" class="form-control" required>
												<option> </option>
												<option>Cotton Combad 30s</option>
												<option>Drifit Ori</option>
												<option>Drifit Benzama</option></td>
										<td></td>
									</tr>

									<tr>
										<td>Jumlah Baju</td>
										<td><input type="number" name="jumlah" class="form-control"></td>
										<td></td>
									</tr>

									<tr>
										<td>Ukuran Baju</td>
										<td><select name="ukuran" class="form-control">
												<option></option>
												<option>X</option>
												<option>XL</option>
												<option>XLL</option></td> 
									</tr>
									<tr id="qty">
									</tr>
									<tr>
										<td>Upload Baju</td>
										<td><input type="file" name="foto" class="form-control"></td>
										<td></td>
									</tr>
									<tr>
										<td>Catatan</td>
										<td><textarea class="form-control" name="catatan"></textarea></td>
										<td></td>
									</tr>
									<p><font color="red">pesanan akan dibuat sekiata 10 - 15 hari pengerjaaan</p>
										<p>terantung banyaknya pesanan dan orderang yang ada</p>
								</table>
								
										<input type="hidden" name="url">
										<button class='btnlogin' style="padding:11;text-transform:uppercase;word-spacing:3px;letter-spacing:1px;">Pesan  <span class='glyphicon glyphicon-shopping-cart'></button>

							</div>
								</form>
		</div>
</div>

    <div class="container" style="margin-top:5%">
			                <div class="row" style="margin-bottom:3%">
                    <div class="col-md-1">
                        <img class="img-responsive img-rounded" src=>
                    </div>

                    <div class="col-md-5">
                        <div style="border-bottom : 1px solid #dddddd;padding-bottom:5px;margin-bottom:2%">
                            <b></div>
                        </div>

                        
                    </div>
                </div>

            
            
                    </form>
										<p id="notif" style="color:red"></p>
                </div>
            </div>
    </div>
<?php
include "footer.php";
?>
