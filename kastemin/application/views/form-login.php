<?php
include "header.php";
?>
<style>
	.daftar{
		background: #fbfbfb;
	}
	.btnlogin{
		padding: 11 30 11;
	}
</style>
<div class='container content'>
	<div class="row">

		<div class='col-md-6 col-md-offset-3'>

			<div class='panel panel-primary' style='border : 1px solid #f5f5f5;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius : 0px;-o-border-radius : 0px;'>

				<div class='panel-body'>
					<form action='<?php echo base_url();?>Login/login' method='post'>
					<label>Alamat E-mail</label>
						<input type='email' class='form-control daftar' value='<?php echo $this->input->post('email'); ?>' name='email' placeholder='Tulis Alamat E-mail Anda Disini...' required>
					<br>

					<label>Kata Sandi</label>
						<input type='password' class='form-control daftar' id='pass' value='<?php echo $this->input->post('pass'); ?>' name='pass' placeholder='Tulis Kata Sandi Anda Disini...' required>
						<p class='errorpasslength' style='color:red'></p>
					<?php
						if(empty($notif)){
							echo "";
						}
						else{
							echo "<font color='red'>$notif</font>";
						}
					?>
					<br>
					<br>
					<button type="submit" class='btnlogin'>Masuk Sekarang <span class='glyphicon glyphicon-chevron-down animasi'></span></button>
					</form>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>
