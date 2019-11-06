<?php
include "header.php";
?>
<div class='container content' style="padding:0;margin-top:	10%;border-bottom:20px solid #54A2D7;border-radius:0">
<nav class="navbar navbar-default" style="border:0;background:#54A2D7;border-radius:0">
	<center><h1 class='title' style="color:white">Daftarkan Diri Anda
														<hr style="border : 2px solid white;width : 80px;">

						</h1></center>
</nav>
<?php if(isset($_GET['msg']) && $_GET['msg']=="success"){?>
	<div class="row">
		<div class="col-md-5 col-md-offset-1">
			<div class="alert alert-success">
			Selamat, Akun Anda Berhasil Dibuat!
		</div>
		</div>
	</div>
	<?php } ?>
	<div class="row">
			<div class='col-md-10 col-md-offset-1'>

			<div class='panel panel-primary' style='border:0;-radius:0px;-webkit-border-radius:0px;-moz-border-radius : 0px;-o-border-radius : 0px;'>


				<div class='panel-body'>
					<form action='<?php echo base_url();?>registrasi/cek' method='post'>
					<div class="row placeholders">
						<div class="col-md-6">

						<label>Nama Depan</label> <p style="display:inline;color:red" id="error_namadpn"></p>
							<input type='text' class='form-control daftar' name='namadpn' id='namadpn'>

						</div>
						<div class="col-md-6">

							<label>Nama Belakang</label> <p style="display:inline;color:red" id="error_namablkng"></p>
							<input type='text' class='form-control daftar' name='namablkng' id='namablkng'>

						</div>
				</div>
				<br>
				<div class="row placeholders">
					<div class="col-md-6">

						<label>Kata Sandi</label> <p style="display:inline;color:red" id="error_pass"></p>
						<input type='password' class='form-control daftar' id='pass' name='pass'>

					</div>
					<div class="col-md-6">

						<label>Ketik Ulang Kata Sandi</label> <p style="display:inline;color:red" id="error_passrepass"></p>
							<input type='password' class='form-control daftar' id='repass' name='repass'>

					</div>
					</div>
					<br>
					<div class="row placeholders">
						<div class="col-md-6">

					<label>Alamat E-mail</label> <p style="display:inline;color:red" id="error_email"></p>
						<input type='email' class='form-control daftar' id="email" name='email'>

					</div>
						<div class="col-md-6">

					<label>No. Handhpone</label> <p style="display:inline;color:red" id="error_nohp"></p>
						<input type='text' class='form-control daftar' id='no_hp' name='no_hp'>

				</div>
			</div>
				<br>
				<div class="row placeholders">
					<div class="col-md-6">

					<label>Jenis Kelamin</label>
						<select class='form-control daftar' name='jk' id="jk" style="padding : 0px 10px 0px;">
							<option value='Laki Laki'>Laki-Laki</option>
							<option value='Perempuan'>Perempuan</option>
						</select>

					</div>
					<div class="col-md-3">
						<label>Provinsi</label>
						<select class="form-control daftar" name="province" id="select-province"
						onchange='$.get("Registrasi/kota/"+$(this).val(),
							function(data){
								$("select#city-select").html(data);
							}
						)'
						 data-url="<?php echo base_url().'Registrasi/show_city'; ?>">
							<option value="">Pilih Provinsi Anda</option>
							<?php foreach($province as $a){?>
								<option value="<?php echo $a->province;?>"><?php echo $a->province;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-3">
						<label>Kota / Kabupaten</label>
						<select class="form-control daftar" name="city" id="city-select">
							<option value="">Pilih Kota Anda</option>
						</select>
					</div>

				</div>
				<br>
				<div class="row placeholders">
					<div class="col-md-6">
						<label>Kode Pos</label> <p style="display:inline;color:red" id="error_kode_pos"></p>
						<input type='text' id="kode_pos" class='form-control daftar' name='kode_pos'>
					</div>
					<div class="col-md-6">
											<label>Alamat Lengkap</label> <p style="display:inline;color:red" id="error_alamat"></p>
											<textarea class='form-control daftar' id="alamat" name='alamat'></textarea>
					</div>

				</div>
				<div class="row-placeholders">
					<div class="col-md-6" style="padding:0">
						<br>

					<button id='register' type="submit" class='btnlogin' data-url="<?php echo base_url();?>registrasi/cek" style="padding:13;word-spacing:3;letter-spacing:1;text-transform:uppercase">Daftar Sekarang <span class='glyphicon glyphicon-chevron-down animasi'></span></button>

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
