<?php

require_once './../vendor/autoload.php';

require './generate_table.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'ФИО');
$sheet->setCellValue('B1', 'Предмет');
$sheet->setCellValue('C1', 'Группа');
$sheet->setCellValue('D1', 'Часы');

$cellValue = 2;
foreach($total as $tchr)
{
    $nameIsOut = false;
    foreach($tchr['subjects'] as $subjs)
    {

            $item = $subjs[0];
            $group = $subjs[1];
            $hour = $subjs[2];
        

        if ($nameIsOut)
        {
            $sheet->setCellValue('A' . $cellValue, '');
            $sheet->setCellValue('B' . $cellValue, $item);
            $sheet->setCellValue('C' . $cellValue, $group);
            $sheet->setCellValue('D' . $cellValue, $hour);
        }
        else
        {
            $sheet->setCellValue('A' . $cellValue, $tchr['fio']);
            $sheet->setCellValue('B' . $cellValue, $item);
            $sheet->setCellValue('C' . $cellValue, $group);
            $sheet->setCellValue('D' . $cellValue, $hour);
            $nameIsOut = true;
        }

        $cellValue++;
    }
    $sheet->setCellValue('A' . $cellValue, '');
    $sheet->setCellValue('B' . $cellValue, '');
    $sheet->setCellValue('C' . $cellValue, 'Итого:');
    $sheet->setCellValue('D' . $cellValue, $tchr['hours']);

    $cellValue++;
}

$fileName = './../generated/Таблица_распределения_' . date("m.d.y") . '.xlsx';
$writer = new Xlsx($spreadsheet);
$writer->save($fileName);

if ($writer)
{
    ?>
    <a href="<?=$fileName?>" download > фыв </a>';
    <script> 
        document.querySelector('a').click();
        location.href = './../pages/admin/create_table.php';
    </script>
    <?php
}
