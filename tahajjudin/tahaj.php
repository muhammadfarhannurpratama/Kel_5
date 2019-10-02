<?php 
function days(){
    echo"Selamat      ";
date_default_timezone_set("Asia/Jakarta");
$waktu = date("h");
if(($waktu >= 4) && ($waktu <= 11)){ echo"Pagi";}
elseif(($waktu >11) && ($waktu<=15)){echo"siang";}
elseif(($waktu >15) && ($waktu<=18)){echo"sore";}
else{echo"malam";}
}
$nama =["Tahajjudin Fajri", "Diego kosta"];
$prodi =["TIF", "Soccer"];
$nim =["E41182137","E41182617"];
?>

<html>
<head>
    <title> kelompok 5 </title>
</head>
<body bgcolor="#809FDA">
    <br><br><br><br>
    <center>
        <h1>
            <font color="black" size=""><?= days(). $nama[0]; ?></font>
        </h1>
        <table border="0" cellpadding="5" cellspacing="0">
 
            <tr>
                <td>
                    <h1>
                        <font color="white" size="5">Nama :</font>
                        <font color="black" size="4"><?= $nama[0]; ?> </font>
                    </h1>
                </td>
            </tr>

            <tr>
                <td>
                    <h1>
                        <font color="white" size="5">NIM :</font>
                        <font color="black" size="4"><?= $nim[0]; ?></font>
                    </h1>
                </td>
            </tr>

            <tr>
                <td>
                    <h1>
                        <font color="white" size="5">PRODI :</font>
                        <font color="black" size="4"><?= $prodi[0]; ?></font>
                    </h1>
                </td>
            </tr>

        </table>

        <a href="tahaj2.html">ke tahaj2</a>
</body>

</html>