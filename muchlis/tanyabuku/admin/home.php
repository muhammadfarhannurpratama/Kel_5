<?php 
error_reporting(0);
session_start();
if(!$_SESSION['id']){
	?>
    <Script>
    alert("anda harus login terlebih dalulu");
	window.location.href="index.php";
    </script>
    
    <?php

}else{ ?>
<html>
<head>
<title>Home | admin</title>
<style>
*{margin:0;padding:0;font-family:arial}
nav{background:#4689db;position:fixed;width:100%;z-index:3}
.kiri{float:left;}.kiri a{font-weight:bold}
.kanan{float:right}
nav .kanan li{list-style:none;display:inline}
nav ul li a{font-size:17px;}
nav .kanan li a{display:inline-block;padding:18px;color:#fff;}
nav .kiri li a{display:inline-block;padding:18px;color:#fff;text-transform:uppercase}
a{text-decoration:none}
.sidebar{width:20%;background:#444;position:fixed;height:100%;padding-top:70px;overflow:hidden;float:left}
.sidebar ul li{list-style:none;}
.sidebar ul li a{padding:20px;width:100%;color:#ccc;display:block;transition:0.4s}
.sidebar ul li a:hover{background:#fff;color:#444}
.main{float:right;width:80%;}
.span{background:#3498db;color:#fff;padding:10px;display:inherit;margin-bottom:10px;}
.isimain{padding:70px 30px 30px 10px;}
</style>
</head>
<body>
<nav>
<ul class="kiri">
<li><a href="">ADMIN</a></li>
</ul>
<ul class="kanan">
<li><a href="handler.php?aksi=logout">Welcome, <?php echo $_SESSION['nama'] ?> [logout]</a></li>
</ul><div style="clear:both"></div>
</nav>
<div class="sidebar">
<ul>
<li><a href="">Dashboard</a></li>
<li><a href="home.php?aksi=tambah_kelompok">Kelompok Barang</a></li>
<li><a href="home.php?aksi=tambah_katalog">Katalog</a></li>
<li><a href="home.php?aksi=produk">Barang</a></li>
<li><a href="home.php?aksi=tampil_user">Pengguna</a></li>
<li><a href="home.php?aksi=pesan">Pesanan</a></li>
</ul>
</div>
<div class="main">
<?php 
error_reporting(0);
include "root.php";
$db=new admin();
$aksi=$_GET['aksi'];
if($aksi=='produk'){
	
?>	
<style>
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse; width: 50%;}
</style>
<div class="isimain">
<span class="span">Produk</span> 
<a style='padding:10px;color:#fff;background:#3498db;display:inline-block' href='home.php?aksi=tambah_produk'>Tambah</a>
<Table>
<tr><th>Gambar</th><th>Nama Produk</th><th>Harga</th><th>Qty</th><th>Kategori</th><th>Keterangan</th></tr>
<?php
$barang=$db->lihat_produk();
foreach($barang as $r){
	echo "<tr><td><img style='width:100px;height:100px' src='".$r[gambar]."'></td><td>".$r[nama_produk]."</td><td>".$r[harga]."</td><td>".$r[qty]."</td><td>".$r[kategori]."</td><td>".substr($r[ket],0,20)."...</td></tr>";
	}
?>
</Table>
</div>
<?php	
}
if($aksi=='tambah_produk'){
?>
<style>
input[type=text],select,textarea{width:400px;margin:10px 0 10px 0;padding:10px;resize:none}
textarea{height:200px;}
input[type=submit]{margin:10px 0 10px 0;outline:0;background:#2ecc71;color:#fff;border:0;padding:10px;cursor:pointer}
</style>
<div class="isimain">
<span class="span">Tambah produk</span> 
<form action="handler.php?aksi=tambah_produk" method="post" enctype="multipart/form-data">
<input type="text" name="nama_produk" placeholder="Nama Produk" required><br>
<input type="text" name="harga" placeholder="Harga" required><br>
<span>Pilih gambar </span><input type="file" name="gambar"  required><br>
		<p style="font-size: 13px; margin-top: 10px; color: #ccc">*Kelompok Produk</p>
		  <select name="kelompok">
			 <?php 
				$data=mysql_query("SELECT * from kelompok order by id desc");
			 ?>
			 <?php 
			 	while (list($n,$k)=mysql_fetch_array($data)) {
			 		?>
			 			<option value="<?php echo $k; ?>"><?php echo $k; ?></option>
			 		<?php
			 	}
			  ?>
			 	
			 </select><br>
<p style="font-size: 13px; margin-top: 10px; color: #ccc">*Katalog</p>
		  <select name="katalog">
			 <?php 
				$data=mysql_query("SELECT * from Katalog order by id_katalog desc");
			 ?>
			 <?php 
			 	while (list($n,$k)=mysql_fetch_array($data)) {
			 		?>
			 			<option value="<?php echo $k; ?>"><?php echo $k; ?></option>
			 		<?php
			 	}
			  ?>
			 	
			 </select><br>
<input type="text" name="qty" placeholder="Qty" required><br>
<input type="text" name="kategori" placeholder="Kategori"><br>
<textarea placeholder="Detail barang" name="ket" required></textarea><br>
<input type="submit" value="Tambahkan">
</form>
</div>
<?php }
if ($aksi=="tambah_kelompok") {
	?>
	<style>
input[type=text],select,textarea{width:400px;margin:10px 0 10px 0;padding:10px;resize:none}
textarea{height:200px;}
input[type=submit]{margin:10px 0 10px 0;outline:0;background:#2ecc71;color:#fff;border:0;padding:10px;cursor:pointer}
</style>
	<div class="isimain">
		<span class="span">Tambah Kelompok Barang</span> 
		<form action="handler.php?aksi=tambah_kelompok" method="post" enctype="multipart/form-data">
		<input type="text" name="nama" placeholder="Nama Kelompok Barang"><br>
		<input type="submit" value ="Simpan">
		</form>
		</div>
	<?php
}
if ($aksi=="tambah_katalog") {
	?>
		<style>
input[type=text],select,textarea{width:400px;margin:10px 0 10px 0;padding:10px;resize:none}
textarea{height:200px;}
input[type=submit]{margin:10px 0 10px 0;outline:0;background:#2ecc71;color:#fff;border:0;padding:10px;cursor:pointer}
</style>
	<div class="isimain">
		<span class="span">Tambah Katalog</span> 
		<form action="handler.php?aksi=tambah_katalog" method="post" enctype="multipart/form-data">
		<input type="text" name="nama_katalog" placeholder="Nama Katalog"><br>
		<input type="submit" value ="Simpan">
		</form>
		</div>
	<?php
}
if ($aksi=="tampil_user") {
	?>
	<style>
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse; width: 50%;}
</style>
<div class="isimain">
<span class="span">Semua Pengguna  Aktif</span> 
<Table>
<tr><th>Foto Profil</th><th>Nama Pengguna</th><th>Alamat</th><th>Qty</th><th>Kategori</th><th>Keterangan</th></tr>
<?php
$barang=$db->lihat_produk();
foreach($barang as $r){
	echo "<tr><td><img style='width:100px;height:100px' src='".$r[gambar]."'></td><td>".$r[nama_produk]."</td><td>".$r[harga]."</td><td>".$r[qty]."</td><td>".$r[kategori]."</td><td>".substr($r[ket],0,20)."...</td></tr>";
	}
?>
</Table>
</div>
<?php	
}
?>

</div>
</body>
</html>
<?php 
if($aksi=='pesan'){
	?>
      <div class="main">
    <div class="isimain">
<span class="span">Pesanan</span> 
<style>
td,th{border:1px solid #ccc;padding:10px;}
table{border-collapse:collapse;}
b{background: red; font-size: 14px; color: #fff; padding: 10px;}
p{background: #486; font-size: 14px; color: #fff; padding: 10px;}
k{background: #4689DB; font-size: 14px; color: #fff; padding: 10px;}
n{background: #467; font-size: 14px; color: #fff; padding: 10px;}
td a{background: #2ecc71; padding: 5px; color: #fff; border-radius: 3px;}

</style>
    <table>
    <tr>
    <th>Status</th><th>Nama</th><th>Jumlah barang</th><th>Jumlah bayar</th><th>tanggal beli</th><th>alamat</th><th>Konfirmasi</th><th>Dikirim</th><th>Sampai Kota</th><th>Diterima</th><th>Selesai</th><th>Hapus</th>
    </tr>
    <tr>
    <?php $transaksi=$db->selesai(); 
	foreach($transaksi as $r){
		if($r[konfir]=='N'){
			
			$konfir="<b>belum</b>";
			}
		elseif($r[konfir]=='Y'){
			$konfir="<p>dibayar</p>";
			}
			elseif($r[konfir]=='K'){
			$konfir="<p>dikirim</p>";
			}
			elseif($r[konfir]=='KK'){
			$konfir="<k>Sampai</k>";
			}
			elseif($r[konfir]=='T'){
			$konfir="<k>Diterima</k>";
			}
			elseif($r[konfir]=='S'){
			$konfir="<n>Selesai</n>";
			}
		echo "<tr><td>".$konfir."</td><td>".$r['nama']."</td><td>".$r['jumlah_barang']."</td><td>Rp.".$r['jumlah_bayar']."</td><td>".$r['tanggal_beli']."</td><td>".$r['alamat']."</td><td><a href='handler.php?aksi=konfir&id=".$r['id']."'>Konfirmasi</a></td><td><a href='handler.php?aksi=konfir_kirim&id=".$r['id']."'>Dikirim</a></td><td><a href='handler.php?aksi=konfir_kirim_kota&id=".$r['id']."'>Sampai</a></td><td><a href='handler.php?aksi=konfir_terima&id=".$r['id']."'>Diterima</a></td><td><a href='handler.php?aksi=konfir_selesai&id=".$r['id']."'>Selesai</a></td></tr>";
		?>
		</div></div>
		<?php
		}
	
	?>
    </table>
    <style type="text/css">
    	input[type=submit]{margin:10px 0 10px 0;outline:0;background:#2ecc71;color:#fff;border:0;padding:10px;cursor:pointer}
    </style>
    <input type="submit" value="Cetak">   <input type="submit" value="Kirim Notifikasi">
	<?php
	}
}
?>