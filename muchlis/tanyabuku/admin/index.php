
<!DOCTYPE html>
<html>
<head>
	<title>TANYABUKU | Login </title>
	<link rel="stylesheet" type="text/css" href="asset/style.css">
	<link rel="stylesheet" type="text/css" href="asset/wow/animate.css">
	<script type="text/javascript" src="asset/wow/wow.min.js"></script>
</head>
<body class="bodyindex">
<div id="status">
	<p id="loading">mohon tunggu sebentar...</p>
</div>
<div class="indexmeong wow flip animated animated">
	<h3>Login</h3>
	<div>
		<form id="formmeong" action="handler.php?aksi=login" method="post">
			<table>
				<tr>
					<td><input type="text" placeholder="Username" name="username"></td>
				</tr>
				<tr>
					<td><input type="password" placeholder="password" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Login" class="hvr-rectangle-out "></td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="asset/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#status").hide();
		$("#formmeong").submit(function(){
		$("#status").fadeIn(100);
			$.ajax({
				type:'POST',
				url:$(this).attr('action'),
				data:$(this).serialize(),
				success:function(data){
					$("#loading").hide();
					$("#status").html(data);
					window.setTimeout(function(){$('#status').fadeOut(100)},3000);
				}
			})
			return false;
		});
	});
</script>
