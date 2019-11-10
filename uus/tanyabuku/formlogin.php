<?php
//include "header.php";
?>
<style>
	.daftar{
		background: #fbfbfb;
	}
	.btnlogin{
		padding: 11 30 11;
	}
	
</style>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body background="bgs.png">
	  <!-- navbar logo tanya buku, button login, home -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top  shadow p-3 mb-5 bg-white rounded" id="mainNav">
        <div class="container">
          <img src="logo.png" alt="" width="80" height="50">
          <button class="navbar-toggler navbar-togler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
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
