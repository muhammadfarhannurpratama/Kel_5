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
		<img style='max-height:450px' src='<?php echo base_url(); ?>foto/<?php echo $detail[0]->foto;?>' id='zoom_01' data-zoom-image="<?php echo base_url().'foto/'.$detail[0]->foto; ?>" class='img-responsive'>
		<div class='title-produk' style='color:#1d1d1d'><?php echo $detail[0]->nama; ?></div>

	</div>
		<div class='col-md-7'>
			<form action="<?php echo base_url().'Keranjang/Save_Cart'; ?>" method="post">
				<b><i style='font-size:18;color:#337cbb'>Deskripsi</i></b>
					<br>
					<font size='3px'><?php echo $detail[0]->deskripsi;?></font>
						<br>
						<br>
						<img src='<?php echo base_url(); ?>image/<?php echo $ket; ?>' class='img-responsive'>
							<br>
							<div class='table-responsive'>
								<table class='table table-hover'>
									<tr>
										<td>Nama Jersey</td>
										<td>:</td>
										<td><?php echo ucwords($detail[0]->nama); ?></td>
									</tr>

									<tr>
										<td>Harga Jersey</td>
										<td>:</td>
										<td><?php echo "Rp. ".number_format($detail[0]->harga, 0,',','.'); ?></td>
									</tr>

									<tr>
										<td>Ketegori</td>
										<td>:</td>
										<td><?php echo ucwords($detail[0]->kat); ?></td>
									</tr>

									<tr>
										<td>Sub Kategori</td>
										<td>:</td>
										<td><?php echo ucwords($detail[0]->subkat); ?></td>
									</tr>

									<tr>
										<td>Tipe Jersey</td>
										<td>:</td>
										<td><?php echo ucwords($detail[0]->tipe); ?></td>
									</tr>

									<tr>
										<td>Ukuran Tersedia</td>
										<td>:</td>
										<td>
										<?php
										if($detail[0]->jumlah==0){
										?>
										Stok Telah Habis Terjual
											<?php }
											else{
											?>
											<select class="form-control daftar" name="ukuran" id="ukuran" data-controller="<?php echo base_url().'Detail/Cekqty'; ?>" data-urlbarang="<?php echo $this->uri->segment(3); ?>" style="padding : 0px 10px 0px;">
												<option value="">Cek Disini..</option>
													<?php
														if($detail[0]->m>0)
															echo "<option value='m'>M</option>";
														else{}

																if($detail[0]->l>0)
																	echo "<option value='l'>L</option>";
																else{}

																		if($detail[0]->xl>0)
																			echo "<option value='xl'>XL</option>";
																		else{}
																					if($detail[0]->xxl>0)

																						echo "<option value='xxl'>XXL</option>";
																					else{}

													?>
												</select>
											<?php } ?>
										</td>
									</tr>
									<tr id="qty">
									</tr>
								</table>
								<?php
									if($detail[0]->jumlah==0){}
										else{
								?>
										<input type="hidden" name="url" value="<?php echo $detail[0]->url; ?>">
										<button class='btnlogin' style="padding:11;text-transform:uppercase;word-spacing:3px;letter-spacing:1px;">Tambah Ke Keranjang <span class='glyphicon glyphicon-shopping-cart'></button>

								<?php } ?>
							</div>
								</form>
		</div>
</div>

    <div class="container" style="margin-top:5%">
			<?php
				echo "<h3>".$komenrow." Komentar</h3><br>";
			 ?>
            <?php
                foreach($komen as $a){
            ?>
                <div class="row" style="margin-bottom:3%">
                    <div class="col-md-1">
                        <img class="img-responsive img-rounded" src='<?php echo base_url()."profil/$a->foto"; ?>'>
                    </div>

                    <div class="col-md-5">
                        <div style="border-bottom : 1px solid #dddddd;padding-bottom:5px;margin-bottom:2%">
                            <b><?php echo ucwords($a->nama); ?></b>  <div class="pull-right"><?php echo $a->waktu; ?></div>
                        </div>

                        <?php echo "<span class='glyphicon glyphicon-comment'></span> ".ucwords($a->komen); ?>
                    </div>
                </div>

            <?php } ?>
            <?php if(empty($sessionemail)){echo "Login Untuk Memberikan Komentar";}else{?>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post" id="komentarform">
                        <div class="input-group">
                            <input type="text" name="komen" id="komentar" class="komentar form-control" style="-moz-border-radius:0px;-webkit-border-radius:0px;-o-border-radius:0px;border-radius:0px;" placeholder="Berikan Komentar Untuk Produk Ini...">

                            <span class="input-group-btn">
                                <button data-url="<?php echo base_url().'Pages/Komentar';?>" data-urlbarang="<?php echo $this->uri->segment(3); ?>" class="submit btn btn-primary komentar"><span class="glyphicon glyphicon-comment"></span> Komentari</button>
                            </span>
                    </div>
                    </form>
										<p id="notif" style="color:red"></p>
                </div>
            </div>
            <?php } ?>
    </div>
<?php
include "footer.php";
?>
