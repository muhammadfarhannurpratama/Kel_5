<h3>Penggunaan PHP Spread Sheet</h3>
<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet ->getActiveSheet();
$sheet ->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer ->save('hello world.xlsx');
?>