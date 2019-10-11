<h1>Array</h1>

<?php
//membuat array yang berisi nama hewan
$hewan = array('kucing','ular','ayam','elang');
//menampilkan data array dengan nomor urut 2
echo $hewan[3];
?>

<?php 
//penamaan isi array
$hewan['kucing'] = "berkaki empat";
$hewan['ular'] = "tidak berkaki";
$hewan['ayam'] = "berkaki dua";
$hewan['elang'] = "memiliki sayap";
 
// menampilkan isi array yang bernama elang
echo $hewan['elang'];
?>

<br>
<br>

<?php
//membuat array yang berisi nama buah-buahan
$hewan = array('kucing','ular','ayam','elang');
//count() untuk menghitung isi array.
for($x=0;$x<count($hewan);$x++){
	echo $hewan[$x]."<br/>";
}
 
?>
<br>
<br>

<h1>Perulangan While</h1>

<?php 
$x = 1; 
 
while($x <= 10) {
    echo "Angka $x <br>";
    $x++;
} 
?>

<h1>Operator Aritmatika</h1>
<h2>Penjumlahan</h2>
<?php 
$a = 200;
$b = 20;
//menjumlahkan variabel a dengan variabel b
echo $a + $b;
?>
<h2>Pengurangan</h2>
<?php
$a = 200;
$b = 20;
//Operator pengurangan variabel a dengan variabel b
echo $a - $b;
?>
<h2>Perkalian</h2>
<?php
$a = 200;
$b = 20;
//Operator perkalian variabel a dengan variabel b
echo $a * $b;
?>
<h2>Pembagian</h2>
<?php
$a = 200;
$b = 20;
//Operator pembagian variabel a dengan variabel b
echo $a / $b;
?>
<h2>Modulus</h2>
<?php
$a = 18;
$b = 8;
//Operator modulus variabel a dengan variabel b
echo $a % $b;
?>
<br>
<h1>Penanganan Form</h1>
untuk penanganan form, klik
<a href="penanganan.php"> disini </a>




