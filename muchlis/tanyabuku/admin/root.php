<?php 
class admin{
	
	function __construct(){
			mysqli_connect("localhost","root","");
			mysqli_select_db("db_tanyabuku");
		}
	function login($username,$password){
				if (trim($_POST['username'])=='') {
					$eror[]='username';
				}
				if (trim($_POST['password'])=='') {
					$eror[]='password';
				}
				if (isset($eror)) {
					echo "<div id='gagal'><img style='width:16px;height:15px' src='asset/loading/load.gif' alt='loading...' /> Opps, sepertinya ".implode(" dan ", $eror)." anda kosong</div>";
				}
				else{
				$query=mysqli_query("select * from admin where username='$username' and password='$password'");
				$row=mysqli_fetch_array($query);
				$report=mysqli_num_rows($query);
				if ($report>0) {
				session_start();
				$_SESSION['id']=$row['id'];

                                                            echo "<div id='sukses'><img style='width:16px;height:15px' src='asset/loading/load.gif' alt='loading...' /> Login sukses, anda akan segera diarahkan ke halaman utama</div>";
                                            				?>
                                            				<script type="text/javascript">
                                                            window.setTimeout(function(){window.location.href="home.php"},1500);
                                                            
                                            				</script>

                                            				<?php
                                            				}
                                            				else{
                                            				echo "<div id='gagal'><img style='width:16px;height:15px' src='asset/loading/load.gif' alt='loading...' /> Opps, Sepertinya Username atau Password anda salah</div>";
                                            		}}  
            }
            //selesai root login 

         //mulai root kelompok
	
	function lihat_produk(){
		$query=mysqli_query("select * from produk order by id desc");
		while($r=mysqli_fetch_array($query)){
			$hasil[]=$r;
			}return $hasil;
		}
	function tambah_katalog($nama_katalog){
		$s=mysqli_query("INSERT INTO katalog SET nama_katalog='$nama_katalog'") or die(mysqli_error());
		?>
				<script>
			        alert("barang berhasil di tambahkan");
					window.location.href="home.php?aksi=tambah_katalog";
        		</script>
		<?php
	}
	function tambah_kelompok($nama){
		$s=mysqli_query("INSERT INTO kelompok SET nama ='$nama'") or die(mysqli_error());
		?>
				<script>
			        alert("barang berhasil di tambahkan");
					window.location.href="home.php?aksi=tambah_kelompok";
        		</script>
		<?php
	}
	function tambah_produk($nama_produk,$harga,$qty,$gambar,$kelompok,$katalog,$kategori,$ket){
		$tambah=mysqli_query("insert into produk set nama_produk='$nama_produk',harga='$harga',gambar='$gambar',kelompok='$kelompok',katalog='$katalog',ket='$ket',qty='$qty',kategori='$kategori'");
		?>
		<script>
        alert("barang berhasil di tambahkan");
		window.location.href="home.php?aksi=tambah_produk";
        </script>
        <?php
		}
			function member(){
		$query=mysqli_query("select * from pembeli order by id_pembeli desc");
		while($r=mysqli_fetch_array($query)){
			$hasil[]=$r;
			}return $hasil;
		}
		function logout(){
			session_start();
			unset($_SESSION['username']);
			session_destroy();
			header("location:index.php");
			
			}
		function selesai(){
			$query=mysqli_query("select * from selesai");
			while($r=mysqli_fetch_array($query)){
				$hasil[]=$r;
				}return $hasil;
			}
			function konfir($id){
				$y="Y";
				mysqli_query("update selesai set konfir='$y' where id='$id'");
				header("location:home.php?aksi=pesan");
				}
				function konfir_kirim($id){
				$k="K";
				mysqli_query("update selesai set konfir='$k' where id='$id'");
				header("location:home.php?aksi=pesan");
				}
				function konfir_kirim_kota($id){
				$kk="KK";
				mysqli_query("update selesai set konfir='$kk' where id='$id'");
				header("location:home.php?aksi=pesan");
				}
				function konfir_terima($id){
				$t="T";
				mysqli_query("update selesai set konfir='$t' where id='$id'");
				header("location:home.php?aksi=pesan");
				}
				function konfir_selesai($id){
				$s="S";
				mysqli_query("update selesai set konfir='$s' where id='$id'");
				header("location:home.php?aksi=pesan");
				}
}
?>