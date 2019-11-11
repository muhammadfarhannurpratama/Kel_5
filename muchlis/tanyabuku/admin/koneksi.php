
 <?php 

$koneksi = mysqli_connect("localhost","root","","db_tanyabuku");

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
//var_dump ($koneksi);
?>
