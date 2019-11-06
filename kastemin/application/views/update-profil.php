<?php
include "header.php";
?>

<div class='container content' style="padding:0;margin-top:	10%;border-bottom:20px solid #54A2D7;border-radius:0">
<nav class="navbar navbar-default" style="border:0;background:#54A2D7;border-radius:0">
	<center><h1 class='title' style="color:white">Perbarui Data Dirimu
														<hr style="border : 2px solid white;width : 80px;">

						</h1></center>
</nav>
<div class="row">
			<div class='col-md-10 col-md-offset-1'>

			<div class='panel panel-primary' style='border:0;-radius:0px;-webkit-border-radius:0px;-moz-border-radius : 0px;-o-border-radius : 0px;'>


				<div class='panel-body'>
					<form action='<?php echo base_url();?>registrasi/cek' method='post'>
					<div class="row placeholders">
						<div class="col-md-6">

						<label>Nama Depan</label> <p style="display:inline;color:red" id="error_namadpn"></p>
							<input type='text' class='form-control daftar' value="<?php echo $user[0]->namadpn; ?>" id='namadpn'>

						</div>
						<div class="col-md-6">

							<label>Nama Belakang</label> <p style="display:inline;color:red" id="error_namablkng"></p>
							<input type='text' class='form-control daftar' value="<?php echo $user[0]->namablkng; ?>" id='namablkng'>

						</div>
				</div>
				<br>
				<div class="row placeholders">
					<div class="col-md-6">

						<label>Kata Sandi</label> <p style="display:inline;color:red" id="error_pass"></p>
						<input type='password' class='form-control daftar' id='pass' value="<?php echo $user[0]->pass; ?>">

					</div>
					<div class="col-md-6">

						<label>Ketik Ulang Kata Sandi</label> <p style="display:inline;color:red" id="error_passrepass"></p>
							<input type='password' class='form-control daftar' id='repass' value="<?php echo $user[0]->pass; ?>">

					</div>
					</div>
					<br>
					<div class="row placeholders">
						<div class="col-md-6">
						<label>No. Handhpone</label> <p style="display:inline;color:red" id="error_nohp"></p>
						<input type='text' class='form-control daftar' id='no_hp' value=<?php echo $user[0]->no_hp; ?>>
						</div>

						<div class="col-md-6">
							<label>Jenis Kelamin</label>
								<select class='form-control daftar'  id="jk" style="padding:0px 10px 0px">
									<option value='Laki Laki'>Laki-Laki</option>
									<option value='Perempuan'>Perempuan</option>
								</select>
						</div>
			</div>
				<br>
				<div class="row placeholders">

					<div class="col-md-6">

						<label>Kode Pos</label> <p style="display:inline;color:red" id="error_kode_pos"></p>
						<input type='text' id="kode_pos" class='form-control daftar' value="<?php echo $user[0]->kode_pos; ?>">

					</div>

					<div class="col-md-6">
						<label>Alamat Lengkap</label> <p style="display:inline;color:red" id="error_alamat"></p>
						<textarea class='form-control daftar' id="alamat"><?php echo $user[0]->kode_pos; ?></textarea>

					</div>
				</div>
				<br>
				<div class="row placeholders">
					<div class="col-md-6">
							<button id='update' type="submit" class='btnlogin' data-direct="<?php echo base_url().'Profile'; ?>" data-url="<?php echo base_url();?>Profile/Cek_Update" style="padding:13;word-spacing:3;letter-spacing:1;text-transform:uppercase"> Perbarui Akun <span class='glyphicon glyphicon-chevron-down animasi'></span></button>
							</form>
					</div>
				</div>

				</div>

			</div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>
