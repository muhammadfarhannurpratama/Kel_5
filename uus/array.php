<?php 
//membuat array yang berisi nama buku
$jenisbuku= array('sejarah','comik','novel','komedi');
//count() untuk menghitung isi array.
for($x=0;$x<count($jenisbuku);$x++){
	echo $jenisbuku[$x]."<br/>";
}
 
?>