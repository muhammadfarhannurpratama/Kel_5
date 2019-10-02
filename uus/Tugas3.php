<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1 style="color:red">Selamat Belajar HTML</h1>
<h2 style="color:blue">Nama Saya: Fauziyatur Rohmah</h2>
<h3>Politeknik Negeri Jember</h3>

<?php
    echo "Hallowwwww Kelas </br></br>";
    $tempat = "di Polije Jember";
	$Tempat = "di Polije Kampus Bondowoso";
	$TempaT = "di Polije Kampus Situbondo";

	echo "<h1 style='color:red'>Selamat Belajar HTML ".$tempat."</h1>";
	ECHO "<h2 style='color:blue'>Selamat Belajar HTML</h2>";
	EcHo "<h3>Selamat Belajar HTML ".$Tempat."</h3>";
	echo $TempaT."</br></br>";
	echo date("Y/m/d")."</br></br>";

	//Penjumlahan
	$a = 10; $b = $c = 20; $d = 2;
	$jumlah = ($a + $b)/$d;

	echo $jumlah."</br></br>";

	for ($x = 0; $x <= 10; $x++) {
    	echo "Tempat Ke - ".$x."<br>";
		}

	$t = date("H");

	if ($t < "20") {
    	echo "Selamat Pagi!";
	}

	//Konstanta
	define("fauziyah", "Selamat datang di Polije!");
	echo "</br></br>".fauziyah;

	//Fungsi
	function fauziyah(){
		echo "</br></br>".fauziyah." Dua";
	}

	fauziyah();

?>

</body>
</html>