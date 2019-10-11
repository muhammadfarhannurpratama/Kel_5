<!DOCTYPE html>
<html>
<head>
	<title>Latihan</title>
	<style>
		body{
			background-color: pink;
		}	
	</style>
</head>
<body>
	<h1>Array</h1>
<?php
//deklarasi array
$NamaKota = ['Jember', 'Bondowoso', 'Banyuwangi']; ?>
<?= $NamaKota[0]; ?>
<br>
<?php var_dump($NamaKota); 
?>

<h1>Array Associative</h1>
<?php 
//Array Associative
$matakuliah = ['materi'=>'Pemodelan Sistem Informasi'];
echo $matakuliah['materi'];

?>

<h1>Menanmpilkan Array Dengan For</h1>
<?php
//menanmpilkan array dengan for 
for($x=0;$x<count($NamaKota);$x++){
	echo $NamaKota[$x].'<br>';
}
?>
 <h1>Menampilkan Array Dengan Foreach</h1>
<?php

foreach ($NamaKota as $situbondo) {
	echo $situbondo.'<br>';
}

?>

<h1>Perulangan While</h1>

<?php
	$y = 1;
	while ($y <= 5) {
		echo 'Hello world : '.$y.'<br>';
		$y++;
	}
?>
<h1>Aritmatika PHP</h1>

<?php

function perkalian($angka, $angka1){
	return $angka * $angka1;
}

echo 'hasil perkalian :'. perkalian(10,12).'<br>';

function pembagian($angka, $angka1){
	return $angka / $angka1;
}

echo 'hasil pembagian :'. pembagian(20,5);
?>
<h1>Penanganan Form</h1>
untuk penanganan form, klik
<a href="getPost.php"> disini </a>

</body>
</html>