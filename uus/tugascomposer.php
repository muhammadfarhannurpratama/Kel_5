<html>
    <head>
        <title>
            composer
        </title>

    </head>
    <body>
        <h3>contoh penggunaaan spreadshet</h3>
        <?php
            require 'library/vendor/autoload.php';
            use PhpOffice\PhpSpreadsheet\Spreadsheet;
            use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Hello World !');

            $writer = new Xlsx($spreadsheet);
            $writer->save('hello world.xlsx');
        ?>
    </body>
</html>